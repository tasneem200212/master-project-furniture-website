<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon; 
use Illuminate\Http\Request;

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

public function update(Request $request,$id){

    $request->validate([
        'code' => 'required|string',
        'discount_percentage' => 'required|numeric',
        'expiry_date' => 'required|date',
    ]);

    $cupon=Coupon::findOrfail($id);

    $cupon->code=$request->code;
    $cupon->discount_percentage=$request->discount_percentage;
    $cupon->expiry_date=$request->expiry_date;

    $cupon->save();
    return redirect()->route('admin.cupon.index')->with('success','Cupon updated successfully');

}

public function store(Request $request)
{
    $request->validate([
        'code' => 'required|string',
        'discount_percentage' => 'required|numeric',
        'expiry_date' => 'required|date',
    ]);

    Coupon::create([
        'code' => $request->code,
        'discount_percentage' => $request->discount_percentage,
        'expiry_date' => $request->expiry_date,
    ]);

    return redirect()->route('admin.cupon.index')->with('success', 'Cupon added successfully');
}

public function destroy($id){
$coupon=Coupon::findOrfail($id);
$coupon->delete();

return redirect()->route('admin.cupon.index')->with('success','Cupon deleted successfully');
}


}

