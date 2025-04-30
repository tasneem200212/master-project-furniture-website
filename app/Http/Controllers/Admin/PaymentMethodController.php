<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;


class PaymentMethodController extends Controller
{
    public function index()
    {
        // عرض جميع طرق الدفع
        $paymentMethods = PaymentMethod::all();
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        // عرض نموذج إضافة طريقة دفع جديدة
        return view('admin.payment_methods.create');
    }

    public function store(Request $request)
    {
        // تخزين طريقة دفع جديدة
        $request->validate([
            'method_name' => 'required|string|max:255',
        ]);

        PaymentMethod::create([
            'method_name' => $request->method_name,
        ]);

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method added successfully!');
    }

    public function edit($id)
    {
        // عرض نموذج تعديل طريقة الدفع
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, $id)
    {
        // تحديث طريقة الدفع
        $request->validate([
            'method_name' => 'required|string|max:255',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update([
            'method_name' => $request->method_name,
        ]);

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method updated successfully!');
    }

    public function destroy($id)
    {
        // حذف طريقة الدفع
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('admin.payment_methods.index')->with('success', 'Payment Method deleted successfully!');
    }
}
