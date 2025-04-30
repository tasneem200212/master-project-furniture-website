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
        $products = Product::with(['productImages'])->get();
    
        $cartItems = \App\Models\Cart::where('user_id', auth()->id())
        ->with('product.productImages')
        ->get();
        
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
    
        $couponCode = Session::get('coupon_code');
        $discountAmount = 0;
        $coupon = null;
    
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->first();
    
            if ($coupon && $coupon->expiry_date >= now()) {
                $discountAmount = ($subtotal * $coupon->discount_percentage) / 100;
            }
        }
    
        $total = $subtotal - $discountAmount;
    
        return view('cart', compact(
            'cartItems',
            'subtotal',
            'discountAmount',
            'total',
            'coupon',
            'products'
        ));
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1'
        ]);
    
        $product = Product::findOrFail($request->product_id);
        $user = auth()->user(); // الحصول على المستخدم الحالي
    
        // البحث عن السلة الموجودة للمستخدم في قاعدة البيانات
        $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->first();
    
        if ($cart) {
            // تحديث الكمية في السلة
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            // إضافة منتج جديد إلى السلة في قاعدة البيانات
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
            $cartItem->delete();
        }
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);
    
        // استرجاع الكوبون من قاعدة البيانات
        $coupon = \App\Models\Coupon::where('code', $request->coupon_code)->first();
    
        // التحقق من وجود الكوبون وصلاحيته
        if (!$coupon || $coupon->expiry_date < now()) {
            return redirect()->back()->with('error', 'Invalid or expired coupon code.');
        }
    
        // التحقق من القيم إذا كانت null
        if (is_null($coupon->times_used)) {
            $coupon->times_used = 0;  // تعيين قيمة افتراضية في حالة null
        }
        if (is_null($coupon->max_usage)) {
            $coupon->max_usage = 1;  // تعيين قيمة افتراضية في حالة null
        }
    
        // استرجاع المستخدم الحالي
        $user = auth()->user();
    
        // التحقق مما إذا كان الكوبون قد تم استخدامه مسبقًا من قبل هذا المستخدم
        $usedBy = json_decode($coupon->used_by ?? '[]');
    
        if (in_array($user->id, $usedBy)) {
            return redirect()->back()->with('error', 'You have already used this coupon.');
        }
    
        // التحقق من عدد مرات استخدام الكوبون إذا كان مخصصًا لعدد معين من الاستخدامات
        if ($coupon->max_usage <= $coupon->times_used) {
            return redirect()->back()->with('error', 'This coupon has reached its maximum usage limit.');
        }
    
        // إضافة معرف المستخدم إلى العمود `used_by` (إذا لم يكن موجودًا بالفعل)
        $usedBy[] = $user->id;
        $coupon->used_by = json_encode($usedBy);
        $coupon->save();
    
        // زيادة عدد مرات الاستخدام في جدول الكوبون
        $coupon->increment('times_used');
    
        // إضافة الكوبون إلى الجلسة
        session(['coupon_code' => $coupon->code]);
    
        return redirect()->back()->with('success', 'Coupon applied successfully!');
    }
    

    

}
