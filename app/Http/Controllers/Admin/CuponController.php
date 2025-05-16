<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CuponController extends Controller
{
    public function index()
    {
        $cupons = Coupon::all();
        return view('admin.cupon.index', compact('cupons'));
    }

    public function create()
    {
        return view('admin.cupon.create');
    }

    public function edit($id)
    {
        $cupon = Coupon::findOrFail($id);
        return view('admin.cupon.edit', compact('cupon'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'code' => 'required|string',
            'discount_percentage' => 'required|numeric',
            'expiry_date' => 'required|date',
            'max_usage' => 'required|integer',
            'times_used' => 'required|integer',
        ]);

        $cupon = Coupon::findOrfail($id);

        $cupon->code = $request->code;
        $cupon->discount_percentage = $request->discount_percentage;
        $cupon->expiry_date = $request->expiry_date;
        $cupon->max_usage = $request->max_usage;
        $cupon->times_used = $request->times_used;


        $cupon->save();
        return redirect()->route('admin.cupon.index')->with('success', 'Cupon updated successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:coupons,code',
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'expiry_date' => 'required|date|after:today',
            'max_usage' => 'required|integer',
            'times_used' => 'required|integer',
        ]);

        try {
            Coupon::create([
                'code' => Str::upper($request->code),
                'discount_percentage' => $request->discount_percentage,
                'expiry_date' => $request->expiry_date,
                'max_usage' => $request->max_usage,
                'times_used' => $request->times_used,
            ]);

            return redirect()
                ->route('admin.cupon.index')
                ->with('swal', [
                    'icon' => 'success',
                    'title' => 'تمت الإضافة بنجاح',
                    'text' => 'تم إضافة الكوبون بنجاح إلى النظام',
                    'showConfirmButton' => false,
                    'timer' => 3000
                ]);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                return back()
                    ->with('swal', [
                        'icon' => 'error',
                        'title' => 'خطأ في الإضافة',
                        'text' => 'كود الكوبون هذا موجود مسبقاً في النظام',
                        'showConfirmButton' => true,
                    ])
                    ->withInput();
            }

            return back()
                ->with('swal', [
                    'icon' => 'error',
                    'title' => 'حدث خطأ',
                    'text' => 'حدث خطأ غير متوقع. يرجى المحاولة مرة أخرى',
                    'showConfirmButton' => true,
                ])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrfail($id);
        $coupon->delete();

        return redirect()->route('admin.cupon.index')->with('success', 'Cupon deleted successfully');
    }
}
