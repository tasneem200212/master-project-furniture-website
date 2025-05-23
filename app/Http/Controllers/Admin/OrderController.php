<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
USE App\Models\Discount;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
    
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }
    
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
    
        $orders = $query->orderBy('created_at','desc')->paginate(8);
    
        return view('admin.orders.index', compact('orders'));
    }
    
    

    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
    
        $products = $order->products()->paginate(10);
    
        return view('admin.orders.show', compact('order', 'products'));
    }
    
    
    
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
    }

    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }

    public function getDiscounts(Request $request)
{
    $discountPercentage = $request->input('discount_percentage');

    $query = Discount::query();

    if ($discountPercentage) {
        $query->where('discount_percentage', $discountPercentage);
    }

    $discounts = $query->get();

    return view('admin.discounts.index', compact('discounts'));
}

}
