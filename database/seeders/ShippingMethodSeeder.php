<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingMethod::insert([
            ['name' => 'Fast Shipping', 'description' => 'Delivery within 1–2 business days', 'cost' => 20.00],
            ['name' => 'Standard Shipping', 'description' => 'Delivery within 3–5 business days', 'cost' => 10.00],
            ['name' => 'Free Shipping', 'description' => 'Free for orders over 50 JOD', 'cost' => 0.00],
            ['name' => 'Overnight Shipping', 'description' => 'Delivery by 9am next day', 'cost' => 40.00],
        ]);
        }
}
