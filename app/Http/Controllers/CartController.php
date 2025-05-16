<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view your cart.');
        }
    
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product.productImages')
            ->get();
    
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        $discountAmount = 0;
        $coupon = session('coupon');
    
        if ($coupon && !$cartItems->isEmpty() && $coupon->expiry_date >= now()) {
            $discountAmount = ($subtotal * $coupon->discount_percentage) / 100;
        }
    
        $total = $subtotal - $discountAmount;
    
        return view('cart', compact(
            'cartItems',
            'subtotal',
            'discountAmount',
            'total',
            'coupon'
        ));
    }
    

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
    
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();
    
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        $discountAmount = 0;
        $coupon = session('coupon');

    
        if ($coupon && !$cartItems->isEmpty() && $coupon->expiry_date >= now()) {
            $discountAmount = ($subtotal * $coupon->discount_percentage) / 100;
        }
        
    
        $total = $subtotal - $discountAmount;
    
        return response()->json([
            'success' => true,
            'subtotal' => number_format($subtotal, 2),
            'discountAmount' => number_format($discountAmount, 2),
            'total' => number_format($total, 2),
            'quantity' => $cartItem->quantity,
        ]);
    }
    
    

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add products to your cart.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id'   => $user->id,
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
            ]);
        }

        return back()->with('success', 'Product added to cart.');
    }

    public function destroy($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();
    
        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }
    
        return redirect()->route('cart.index')->with('success', 'Item quantity reduced or item removed from cart.');
    }
    

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        $cart = Cart::where('user_id', auth()->id())->get();
        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add products to your cart before applying a coupon.');
        }

        $coupon = \App\Models\Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon || $coupon->expiry_date < now()) {
            return redirect()->back()->with('error', 'Invalid or expired coupon code.');
        }

        if (is_null($coupon->times_used)) {
            $coupon->times_used = 0;
        }
        if (is_null($coupon->max_usage)) {
            $coupon->max_usage = 1;
        }

        $user = auth()->user();

        $usedBy = json_decode($coupon->used_by ?? '[]');

        if (in_array($user->id, $usedBy)) {
            return redirect()->back()->with('error', 'You have already used this coupon.');
        }

        if ($coupon->max_usage <= $coupon->times_used) {
            return redirect()->back()->with('error', 'This coupon has reached its maximum usage limit.');
        }

        $usedBy[] = $user->id;
        $coupon->used_by = json_encode($usedBy);
        $coupon->save();

        $coupon->increment('times_used');

        session(['coupon' => $coupon]);

        return redirect()->back()->with('success', 'Coupon applied successfully!');
    }
}
