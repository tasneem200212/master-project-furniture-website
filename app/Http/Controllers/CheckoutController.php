<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Events\OrderCreated;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        $cart = Cart::where('user_id', Auth::id())->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please add products to your cart.');
        }

        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();

        if (!$order) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->payment_method_id = 1;
            $order->shipping_address_id = 1;
            $order->status = 'pending';
            $order->total_price = 0;
            $order->save();
        }

        $totalAmount = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $coupon = session('coupon');
        $discountAmount = 0;

        if ($coupon && $coupon->expiry_date >= now()) {
            $discountAmount = ($totalAmount * $coupon->discount_percentage) / 100;
        }

        $totalAmountAfterDiscount = $totalAmount - $discountAmount;
        $order->total_price = $totalAmountAfterDiscount;
        $order->save();

        $orderDetails = Cart::where('user_id', auth()->id())->with('product')->get();
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product.productImages')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $total = $subtotal - $discountAmount;

        $nameParts = explode(' ', $user->name, 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        return view('checkout', compact('cart', 'order', 'orderDetails', 'totalAmount', 'totalAmountAfterDiscount', 'discountAmount', 'coupon', 'user', 'paymentMethods', 'total', 'firstName', 'lastName'));
    }

    public function store(Request $request)
    {
        Log::info('Order store method entered for user: ' . Auth::id());

        $existingOrder = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->whereHas('products')
            ->first();

        if ($existingOrder) {
            return redirect()->route('Pro.index')->with('error', 'You already have a pending order.');
        }

        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'payment_method_id' => 'required|integer|exists:payment_methods,id',
                'shipping_address_id' => 'required|integer|exists:shipping_addresses,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postcode' => ['required', 'string', 'max:20', 'regex:/^[0-9]{5}(-[0-9]{4})?$/'],
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'total_amount' => 'required|numeric|min:0'
            ]);

            $cartItems = Cart::with('product')
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                throw new \Exception('The shopping cart is empty');
            }

            $subtotal = round($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2);
            $coupon = session('coupon');
            $discountAmount = 0;

            if ($coupon && $coupon->expiry_date >= now()) {
                $discountAmount = round(($subtotal * (float)$coupon->discount_percentage) / 100, 2);
            }

            if ($subtotal <= 0) {
                throw new \Exception('Cannot create order with empty cart total.');
            }

            $finalAmount = round($subtotal - $discountAmount, 2);

            $shippingCost = 7;

            $finalAmountWithShipping = round($finalAmount + $shippingCost, 2);


            Log::info('Order Calculation Debug', [
                'subtotal' => $subtotal,
                'discount' => $discountAmount,
                'finalAmount' => $finalAmount,
                'totalAmountFromRequest' => $validated['total_amount']
            ]);

            $order = Order::create([
                'user_id' => Auth::id(),
                'payment_method_id' => $validated['payment_method_id'],
                'shipping_address_id' => $validated['shipping_address_id'],
                'status' => 'pending',
                'total_price' => $finalAmountWithShipping,
                'billing_info' => json_encode([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'address' => $validated['address'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'postcode' => $validated['postcode'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone']
                ])
            ]);

            foreach ($cartItems as $item) {
                $order->products()->attach($item->product_id, [
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $product = $item->product;
                $product->sales_count += $item->quantity;
                $product->save();
            }

            if ($validated['payment_method_id'] == 1) {
                $this->validateCreditCard($request);
            }

            Order::where('user_id', Auth::id())
                ->where('status', 'pending')
                ->whereDoesntHave('products')
                ->delete();

            Cart::where('user_id', Auth::id())->delete();
            session()->forget('coupon');

            DB::commit();
            event(new OrderCreated($order));

            return redirect()->route('Pro.index')
                ->with('order_success', 'Your order has been successfully created! Thank you for choosing our store. We will prepare your order with special touches to give you the best experience.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order Creation Failed', [
                'error' => $e->getMessage(),
                'user' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->forget('coupon');

            return back()
                ->with('error', 'Order creation failed: ' . $e->getMessage())
                ->withInput();
        }
    }

    private function validateCreditCard(Request $request)
    {
        $request->validate([
            'card_number' => 'required|regex:/^\d{16}$/',
            'expiry_date' => 'required|date_format:Y-m',
            'cvv' => 'required|regex:/^\d{3}$/'
        ]);
    }


    protected function processPayment($amount, $paymentMethodId)
    {
        return [
            'success' => true,
            'transaction_id' => 'PAY-' . Str::random(16),
            'message' => 'Payment completed successfully'
        ];
    }
}
