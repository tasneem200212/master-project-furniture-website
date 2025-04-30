<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::insert([
            [ 'user_id' => 1,'payment_method_id' => 1, 'shipping_address_id' => 1, 'status' => 'pending', 'total_price' => 299.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 2,'payment_method_id' => 2, 'shipping_address_id' => 2, 'status' => 'completed', 'total_price' => 499.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 3,'payment_method_id' => 3, 'shipping_address_id' => 3, 'status' => 'canceled', 'total_price' => 159.99,'created_at' => now(),'updated_at' => now()],
            ['user_id' => 4,'payment_method_id' => 1, 'shipping_address_id' => 4, 'status' => 'pending', 'total_price' => 89.99,'created_at' => now(),'updated_at' => now()],
            ['user_id' => 5, 'payment_method_id' => 2, 'shipping_address_id' => 5, 'status' => 'completed', 'total_price' => 99.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 6,'payment_method_id' => 3, 'shipping_address_id' => 6, 'status' => 'canceled', 'total_price' => 49.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 7,'payment_method_id' => 2, 'shipping_address_id' => 7, 'status' => 'pending', 'total_price' => 379.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 8,'payment_method_id' => 1, 'shipping_address_id' => 8, 'status' => 'completed', 'total_price' => 259.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 9,'payment_method_id' => 3, 'shipping_address_id' => 9, 'status' => 'canceled', 'total_price' => 189.99,'created_at' => now(),'updated_at' => now()],
            [ 'user_id' => 10,'payment_method_id' => 2, 'shipping_address_id' => 10, 'status' => 'completed', 'total_price' => 799.99,'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
