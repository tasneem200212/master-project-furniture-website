<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::with('product')->paginate(10);
        return view('admin.inventory.index', compact('inventoryItems'));
    }

    public function destroy($id)
    {
        $item = Inventory::find($id);
        if ($item) {
            $item->delete();
        }

        return redirect()->route('admin.inventory.index')->with('success', 'Item deleted successfully');
    }


    public function create()
    {
        // استرجاع جميع المنتجات
        $products = Product::all();
        
        return view('admin.inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'product_id' => 'required|exists:products,id',  // التأكد من أن المنتج موجود
            'stock_quantity' => 'required|integer|min:1',  // التأكد من أن الكمية هي عدد صحيح أكبر من أو يساوي 1
        ]);
    
        // البحث عن المنتج في الـ Inventory
        $inventoryItem = Inventory::where('product_id', $request->product_id)->first();
    
        if ($inventoryItem) {
            // إذا كان المنتج موجودًا بالفعل، نقوم بتعديل الكمية بإضافة الكمية الجديدة إلى الكمية الحالية
            $inventoryItem->stock_quantity += $request->stock_quantity;
            $inventoryItem->save();
            
            // إضافة رسالة النجاح
            return redirect()->route('admin.inventory.index')->with('success', 'Product stock updated successfully!');
        } else {
            // إذا لم يكن المنتج موجودًا، نقوم بإنشاء سجل جديد للمنتج في الـ Inventory
            $inventoryItem = new Inventory();
            $inventoryItem->product_id = $request->product_id;
            $inventoryItem->stock_quantity = $request->stock_quantity;
            $inventoryItem->save();
    
            // إضافة رسالة النجاح
            return redirect()->route('admin.inventory.index')->with('success', 'Product added to inventory successfully!');
        }
    }
    

    public function edit($id)
{
    $inventoryItem = Inventory::findOrFail($id);
    return view('admin.inventory.edit', compact('inventoryItem'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'stock_quantity' => 'required|integer|min:0',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
    ]);

    $inventoryItem = Inventory::findOrFail($id);
    $inventoryItem->stock_quantity = $request->input('stock_quantity');
    $inventoryItem->product->price = $request->input('price');
    $inventoryItem->product->description = $request->input('description');
    $inventoryItem->product->save();
    $inventoryItem->save();

    return redirect()->route('admin.inventory.index')->with('success', 'Product updated successfully!');
}

}
