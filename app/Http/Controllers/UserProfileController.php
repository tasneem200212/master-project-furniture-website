<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        // استرجاع معلومات المستخدم الحالي
        $user = auth()->user();
        
        // استرجاع جميع الطلبات المرتبطة بالمستخدم
        $orders = $user->orders;

        // عرض صفحة الملف الشخصي مع الطلبات
        return view('profile', compact('user', 'orders'));
    }

    public function showOrder($orderId)
    {
        $user = auth()->user();
        
        // العثور على الطلب بناءً على الـ ID
        $order = Order::findOrFail($orderId);

        // التحقق من أن الطلب يعود للمستخدم الحالي
        if ($order->user_id != $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // عرض تفاصيل الطلب
        return view('orders.show', compact('user', 'order'));
    }

    public function update(Request $request, $id)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // العثور على المستخدم
        $user = User::findOrFail($id);
    
        // تحديث البيانات
        $user->name = $request->name;
        $user->email = $request->email;
    
        // التحقق إذا كان هناك صورة جديدة
        if ($request->hasFile('profile_image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
    
            // حفظ الصورة الجديدة
            $path = $request->file('profile_image')->store('profile_pictures', 'public');
            $user->profile_image = $path;
        }
    
        // حفظ التعديلات
        $user->save();
    
        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function cancelOrder($id)
    {
        // العثور على الطلب
        $order = Order::findOrFail($id);
        
        // التحقق إذا كانت حالة الطلب "قيد الانتظار"
        if ($order->status === 'pending') {
            $order->status = 'cancelled';  // تحديث الحالة إلى "ملغى"
            $order->save();

            // إعادة التوجيه مع رسالة النجاح
            return redirect()->route('profile')->with('success', 'Order cancelled successfully.');
        }

        // في حال عدم إمكانية إلغاء الطلب
        return redirect()->route('profile')->with('error', 'Unable to cancel order.');
    }
}
