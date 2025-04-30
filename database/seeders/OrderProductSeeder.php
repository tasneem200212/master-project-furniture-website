<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        // عدد السجلات التي تريد إضافتها
        $orders = Order::all(); // جلب جميع الطلبات
        $products = Product::all(); // جلب جميع المنتجات

        if ($orders->count() && $products->count()) {
            foreach ($orders as $order) {
                foreach ($products as $product) {
                    DB::table('order_product')->insert([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => rand(1, 5),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
