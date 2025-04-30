<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // استخدام نموذج Product بدلاً من User
use App\Models\Category; // في حال كنت تستخدم فئات للمنتجات (اختياري)
use App\Models\Order; // في حال كنت بحاجة للتعامل مع الطلبات
use App\Models\Review; // في حال كنت بحاجة للتعامل مع التعليقات على المنتجات
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // جلب البيانات التي نحتاجها
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $customersCount = User::count(); 
        $totalRevenue = Order::sum('total_price');
        
        // جلب الإيرادات الشهرية
        $monthlyRevenue = Order::selectRaw('SUM(total_price) as total_revenue, MONTH(created_at) as month, YEAR(created_at) as year')
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'asc')
                                ->orderBy('month', 'asc')
                                ->get();
    
        // تحويل الإيرادات الشهرية إلى بيانات يمكن عرضها في الرسم البياني
        $labels = [];
        $revenues = [];
        foreach ($monthlyRevenue as $data) {
            $labels[] = "{$data->month}-{$data->year}"; // تنسيق الشهر والسنة
            $revenues[] = $data->total_revenue;
        }
    
        // جلب الطلبات مع البيانات المتعلقة بالمستخدمين والمنتجات
        $orders = Order::with('user', 'products')->get(); 
    
        // إعادة التوجيه إلى الـ View مع جميع البيانات
        return view('admin.dashboard', compact('productsCount', 'ordersCount', 'customersCount', 'totalRevenue', 'labels', 'revenues', 'orders'));
    }
    
    
        // عرض نموذج إضافة منتج جديد
        public function create()
        {
            return view('admin.products.create');
        }
    
        // تخزين منتج جديد
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                // ... باقي الحقول
            ]);
            
            Product::create($request->all());
            return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
        }
    
        // عرض تفاصيل المنتج
        public function show($id)
        {
            $product = Product::findOrFail($id);
            return view('admin.products.show', compact('product'));
        }
    
        // عرض نموذج تعديل المنتج
        public function edit($id)
        {
            $product = Product::findOrFail($id);
            return view('admin.products.edit', compact('product'));
        }
    
        // تحديث المنتج
        public function update(Request $request, $id)
        {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        }
    
        // حذف المنتج
        public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        }
    }
    