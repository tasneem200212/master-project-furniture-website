<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        OrderDetail::insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'price' => 199.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'product_id' => 3,
                'quantity' => 1,
                'price' => 299.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'quantity' => 4,
                'price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_id' => 5,
                'quantity' => 2,
                'price' => 89.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'product_id' => 4,
                'quantity' => 1,
                'price' => 499.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'product_id' => 6,
                'quantity' => 3,
                'price' => 129.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 2,
                'quantity' => 5,
                'price' => 149.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 7,
                'quantity' => 2,
                'price' => 79.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 5,
                'product_id' => 8,
                'quantity' => 1,
                'price' => 999.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 5,
                'product_id' => 9,
                'quantity' => 2,
                'price' => 59.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 6,
                'product_id' => 10,
                'quantity' => 3,
                'price' => 189.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 6,
                'product_id' => 11,
                'quantity' => 1,
                'price' => 349.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 7,
                'product_id' => 12,
                'quantity' => 4,
                'price' => 89.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 7,
                'product_id' => 13,
                'quantity' => 1,
                'price' => 549.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 8,
                'product_id' => 14,
                'quantity' => 2,
                'price' => 249.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 8,
                'product_id' => 15,
                'quantity' => 3,
                'price' => 159.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
