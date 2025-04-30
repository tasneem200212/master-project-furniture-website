<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        ProductVariant::insert([
            ['product_id' => 1, 'variant_name' => 'Variant 1', 'color' => 'Red', 'size' => 'Large', 'additional_price' => 10.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 1, 'variant_name' => 'Variant 2', 'color' => 'Blue', 'size' => 'Medium', 'additional_price' => 5.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 1, 'variant_name' => 'Variant 3', 'color' => 'Green', 'size' => 'Small', 'additional_price' => 7.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'variant_name' => 'Variant 1', 'color' => 'Black', 'size' => 'Large', 'additional_price' => 12.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'variant_name' => 'Variant 2', 'color' => 'White', 'size' => 'Medium', 'additional_price' => 8.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'variant_name' => 'Variant 1', 'color' => 'Brown', 'size' => 'Large', 'additional_price' => 15.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'variant_name' => 'Variant 2', 'color' => 'Beige', 'size' => 'Medium', 'additional_price' => 6.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'variant_name' => 'Variant 3', 'color' => 'Gray', 'size' => 'Small', 'additional_price' => 10.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'variant_name' => 'Variant 1', 'color' => 'Yellow', 'size' => 'Large', 'additional_price' => 9.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'variant_name' => 'Variant 2', 'color' => 'Pink', 'size' => 'Medium', 'additional_price' => 5.50,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'variant_name' => 'Variant 1', 'color' => 'Purple', 'size' => 'Large', 'additional_price' => 20.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'variant_name' => 'Variant 2', 'color' => 'Orange', 'size' => 'Small', 'additional_price' => 7.50,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 6, 'variant_name' => 'Variant 1', 'color' => 'Silver', 'size' => 'Medium', 'additional_price' => 18.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 6, 'variant_name' => 'Variant 2', 'color' => 'Gold', 'size' => 'Large', 'additional_price' => 25.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 7, 'variant_name' => 'Variant 1', 'color' => 'Blue', 'size' => 'Medium', 'additional_price' => 5.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 7, 'variant_name' => 'Variant 2', 'color' => 'Red', 'size' => 'Large', 'additional_price' => 8.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 8, 'variant_name' => 'Variant 1', 'color' => 'White', 'size' => 'Medium', 'additional_price' => 6.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 8, 'variant_name' => 'Variant 2', 'color' => 'Gray', 'size' => 'Large', 'additional_price' => 10.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 9, 'variant_name' => 'Variant 1', 'color' => 'Brown', 'size' => 'Medium', 'additional_price' => 12.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 9, 'variant_name' => 'Variant 2', 'color' => 'Black', 'size' => 'Large', 'additional_price' => 15.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 10, 'variant_name' => 'Variant 1', 'color' => 'Beige', 'size' => 'Small', 'additional_price' => 4.00,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 10, 'variant_name' => 'Variant 2', 'color' => 'Purple', 'size' => 'Large', 'additional_price' => 8.00,'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
