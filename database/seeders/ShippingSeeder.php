<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipping;

class ShippingSeeder extends Seeder
{
    public function run()
    {
        Shipping::insert([
            ['order_id' => 1, 'shipping_method' => 'Fast Shipping', 'shipping_cost' => 20.00, 'status' => 'pending','created_at' => now(),'updated_at' => now()],
            ['order_id' => 2, 'shipping_method' => 'Standard Shipping', 'shipping_cost' => 10.00, 'status' => 'shipped','created_at' => now(),'updated_at' => now()],
            ['order_id' => 3, 'shipping_method' => 'Fast Shipping', 'shipping_cost' => 20.00, 'status' => 'pending','created_at' => now(),'updated_at' => now()],
            ['order_id' => 4, 'shipping_method' => 'Standard Shipping', 'shipping_cost' => 10.00, 'status' => 'shipped','created_at' => now(),'updated_at' => now()],
            ['order_id' => 5, 'shipping_method' => 'Free Shipping', 'shipping_cost' => 0.00, 'status' => 'delivered','created_at' => now(),'updated_at' => now()],
            ['order_id' => 6, 'shipping_method' => 'Overnight Shipping', 'shipping_cost' => 40.00, 'status' => 'pending','created_at' => now(),'updated_at' => now()],
            ['order_id' => 7, 'shipping_method' => 'Standard Shipping', 'shipping_cost' => 10.00, 'status' => 'shipped','created_at' => now(),'updated_at' => now()],
            ['order_id' => 8, 'shipping_method' => 'Fast Shipping', 'shipping_cost' => 20.00, 'status' => 'pending','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
