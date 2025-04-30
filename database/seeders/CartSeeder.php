<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $products = Product::take(3)->get(); 
        foreach ($products as $product) {
            Cart::create([
                'user_id'   => $user->id,
                'product_id'=> $product->id,
                'quantity'  => rand(1, 5),
                'variant'   => 'Color: Black, Size: M',
            ]);
        }
    }
}
