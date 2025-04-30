<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // الحصول على بيانات السلة من قاعدة البيانات
        $cart = Cart::where('user_id', Auth::id())->get();
    
        // التأكد من أن السلة غير فارغة
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please add products to your cart.');
        }
    
        // الحصول على المستخدم المسجل
        $user = Auth::user();
    
        // التحقق من وجود طلب قيد المعالجة للمستخدم
        $order = Order::where('user_id', $user->id)->where('status', 'pending')->first();
    
        // إذا لم يتم العثور على الطلب، نقوم بإنشاء طلب جديد
        if (!$order) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->payment_method_id = 1; // طريقة الدفع الافتراضية
            $order->shipping_address_id = 1; // العنوان الافتراضي
            $order->status = 'pending';
            $order->total_price = 0; // سيتم تحديث هذا السعر بعد حساب إجمالي السلة
            $order->save();
        }
    
        // حساب المبلغ الإجمالي للسلة
        $totalAmount = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity; // حساب سعر المنتج × الكمية
        });
    
        // الحصول على الكوبون من الجلسة
        $coupon = session('coupon');
    
        $discountAmount = 0;
        if ($coupon) {
            $discountAmount = ($coupon->discount_percentage / 100) * $totalAmount; // حساب الخصم
        }
    
        // حساب المبلغ النهائي بعد الخصم
        $totalAmountAfterDiscount = $totalAmount - $discountAmount;
    
        // التأكد من تحديث السعر الإجمالي في الطلب
        $order->total_price = $totalAmountAfterDiscount; // تحديث السعر الإجمالي للطلب بعد الخصم
        $order->save(); // حفظ الطلب مع السعر المحدث
    
        // الحصول على تفاصيل الطلب (إذا كانت موجودة)
        $orderDetails = OrderDetail::where('order_id', $order->id)
                                    ->with('product') // تضمين بيانات المنتج لكل تفصيل
                                    ->get();
    
        // عرض صفحة الدفع مع كافة البيانات الضرورية
        return view('checkout', compact('cart', 'order', 'orderDetails', 'totalAmount', 'totalAmountAfterDiscount', 'discountAmount', 'coupon', 'user'));
    }
    
    
    
    
 

public function store(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'postcode' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'payment_method_id' => 'required|exists:payment_methods,id',
        'products' => 'required|array',
    ]);

    // الحصول على بيانات السلة من الجلسة
    $cart = session('cart', []);

    // حساب إجمالي السلة
    $totalAmount = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity']; // حساب سعر كل منتج * الكمية
    });

    // إنشاء طلب جديد
    $order = new Order();
    $order->user_id = Auth::id();
    $order->payment_method_id = $request->input('payment_method_id');
    $order->shipping_address_id = $request->input('shipping_address_id'); // التأكد من إرسال معرف العنوان الصحيح
    $order->status = 'pending';
    $order->total_price = $totalAmount; // استخدام الإجمالي المحسوب
    $order->save();

    // إضافة المنتجات إلى تفاصيل الطلب
    foreach ($request->input('products') as $productData) {
        $product = Product::find($productData['product_id']);
        if ($product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $productData['quantity'],
                'price' => $product->price,
                'total_price' => $product->price * $productData['quantity'],
            ]);
        }
    }

    // مسح السلة من الجلسة بعد تقديم الطلب
    session()->forget('cart');

    return redirect()->route('order.success')->with('success', 'Your order has been placed successfully!');
}

    
    
    
    
}    