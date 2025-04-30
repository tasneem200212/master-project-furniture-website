<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        ProductImage::insert([
            ['product_id' => 1, 'image_path' => 'images/product1_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 1, 'image_path' => 'images/product1_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 1, 'image_path' => 'images/product1_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'image_path' => 'images/product2_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'image_path' => 'images/product2_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 2, 'image_path' => 'images/product2_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'image_path' => 'images/product3_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'image_path' => 'images/product3_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 3, 'image_path' => 'images/product3_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'image_path' => 'images/product4_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'image_path' => 'images/product4_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 4, 'image_path' => 'images/product4_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'image_path' => 'images/product5_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'image_path' => 'images/product5_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 5, 'image_path' => 'images/product5_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 6, 'image_path' => 'images/product6_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 6, 'image_path' => 'images/product6_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 6, 'image_path' => 'images/product6_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 7, 'image_path' => 'images/product7_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 7, 'image_path' => 'images/product7_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 7, 'image_path' => 'images/product7_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 8, 'image_path' => 'images/product8_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 8, 'image_path' => 'images/product8_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 8, 'image_path' => 'images/product8_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 9, 'image_path' => 'images/product9_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 9, 'image_path' => 'images/product9_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 9, 'image_path' => 'images/product9_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 10, 'image_path' => 'images/product10_1.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 10, 'image_path' => 'images/product10_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 10, 'image_path' => 'images/product10_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 11, 'image_path' => 'images/product11_1.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 11, 'image_path' => 'images/product11_2.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 11, 'image_path' => 'images/product11_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 12, 'image_path' => 'images/product12_1.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 12, 'image_path' => 'images/product12_2.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 12, 'image_path' => 'images/product12_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 13, 'image_path' => 'images/product13_1.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 13, 'image_path' => 'images/product13_2.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 13, 'image_path' => 'images/product13_3.jpg','created_at' => now(),'updated_at' => now()],
            ['product_id' => 14, 'image_path' => 'images/product14_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 14, 'image_path' => 'images/product14_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 14, 'image_path' => 'images/product14_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 15, 'image_path' => 'images/product15_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 15, 'image_path' => 'images/product15_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 15, 'image_path' => 'images/product15_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 16, 'image_path' => 'images/product16_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 16, 'image_path' => 'images/product16_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 16, 'image_path' => 'images/product16_3.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 17, 'image_path' => 'images/product17_1.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 17, 'image_path' => 'images/product17_2.png','created_at' => now(),'updated_at' => now()],
            ['product_id' => 17, 'image_path' => 'images/product17_3.png','created_at' => now(),'updated_at' => now()],
            

        ]);
    }
}
