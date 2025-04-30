<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $category = $request->get('category');
        
        $products = Product::with('discount') 
                            ->when($search, function($query) use ($search) {
                                return $query->where('name', 'like', '%' . $search . '%');
                            })
                            ->when($category, function($query) use ($category) {
                                return $query->where('category_id', $category);
                            })
                            ->paginate(10);
        
        $categories = Category::all();
        
        return view('admin.products.index', compact('products', 'categories'));
    }
    
    
    


    public function show($id)
{
    $product = Product::with('productImages')->findOrFail($id);

    return view('admin.products.show', compact('product'));
}


public function create()
{
    $categories = Category::all();
    
    $discounts = Discount::all();

    return view('admin.products.create', compact('categories', 'discounts'));
}


public function store(Request $request)
{
    // التحقق من صحة البيانات المدخلة
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'images' => 'required|array|min:1',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'weight' => 'nullable|numeric',
        'dimensions' => 'nullable|string',
        'color' => 'nullable|string',
        'size' => 'nullable|string',
        'model' => 'nullable|string',
        'shipping' => 'nullable|string',
        'care_info' => 'nullable|string',
        'brand' => 'nullable|string',
        'discount_id' => 'nullable|exists:discounts,id', // التحقق من صحة discount_id
    ]);

    // إضافة المنتج إلى قاعدة البيانات
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'weight' => $request->weight,
        'dimensions' => $request->dimensions,
        'color' => $request->color,
        'size' => $request->size,
        'model' => $request->model,
        'shipping' => $request->shipping,
        'care_info' => $request->care_info,
        'brand' => $request->brand,
        'discount_id' => $request->discount_id, // تخزين discount_id
    ]);

    // تخزين الصور في مجلد التخزين
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('product_images', 'public');
            $product->productImages()->create(['image_path' => $imagePath]);
        }
    }

    // إعادة التوجيه إلى صفحة المنتجات مع رسالة نجاح
    return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
}








public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'weight' => $request->weight,
        'dimensions' => $request->dimensions,
        'color' => $request->color,
        'size' => $request->size,
        'model' => $request->model,
        'shipping' => $request->shipping,
        'care_info' => $request->care_info,
        'brand' => $request->brand,
        'discount_id' => $request->discount_id, 
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('product_images', 'public');
            $product->productImages()->create(['image_path' => $imagePath]);
        }
    }

    if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
            $image = ProductImage::find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }
    }



    return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
}

}
