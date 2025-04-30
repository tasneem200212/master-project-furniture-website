<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    public function run()
    {
        Wishlist::insert([
            ['user_id' => 1, 'product_id' => 1,'created_at' => now(),'updated_at' => now()], // إضافة منتج للمستخدم 1
            ['user_id' => 1, 'product_id' => 2,'created_at' => now(),'updated_at' => now()], // إضافة منتج آخر للمستخدم 1
            ['user_id' => 1, 'product_id' => 3,'created_at' => now(),'updated_at' => now()], // إضافة منتج ثالث للمستخدم 1
            
            ['user_id' => 2, 'product_id' => 4,'created_at' => now(),'updated_at' => now()], // إضافة منتج للمستخدم 2
            ['user_id' => 2, 'product_id' => 5,'created_at' => now(),'updated_at' => now()], // إضافة منتج آخر للمستخدم 2
            ['user_id' => 2, 'product_id' => 6,'created_at' => now(),'updated_at' => now()], // إضافة منتج ثالث للمستخدم 2
            
            ['user_id' => 3, 'product_id' => 7,'created_at' => now(),'updated_at' => now()], // إضافة منتج للمستخدم 3
            ['user_id' => 3, 'product_id' => 8,'created_at' => now(),'updated_at' => now()], // إضافة منتج آخر للمستخدم 3
            ['user_id' => 3, 'product_id' => 9,'created_at' => now(),'updated_at' => now()], // إضافة منتج ثالث للمستخدم 3
            
            ['user_id' => 4, 'product_id' => 10,'created_at' => now(),'updated_at' => now()], // إضافة منتج للمستخدم 4
            ['user_id' => 4, 'product_id' => 11,'created_at' => now(),'updated_at' => now()], // إضافة منتج آخر للمستخدم 4
            ['user_id' => 4, 'product_id' => 12,'created_at' => now(),'updated_at' => now()], // إضافة منتج ثالث للمستخدم 4
            
            ['user_id' => 5, 'product_id' => 13,'created_at' => now(),'updated_at' => now()], // إضافة منتج للمستخدم 5
            ['user_id' => 5, 'product_id' => 14,'created_at' => now(),'updated_at' => now()], // إضافة منتج آخر للمستخدم 5
            ['user_id' => 5, 'product_id' => 15,'created_at' => now(),'updated_at' => now()], // إضافة منتج ثالث للمستخدم 5
        ]);
    }
}
