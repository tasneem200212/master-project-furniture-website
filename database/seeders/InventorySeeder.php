<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Inventory::insert([
            ['product_id' => 1, 'stock_quantity' => 100,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'stock_quantity' => 50,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'stock_quantity' => 200,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'stock_quantity' => 75,'created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'stock_quantity' => 30,'created_at' => now(),'updated_at' => now()],
        ]);
    }
}
