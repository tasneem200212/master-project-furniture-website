<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        ProductCategory::insert([
            ['product_id' => 1, 'category_id' => 1,'created_at' => now(),'updated_at' => now()],  // المنتج 1 ينتمي إلى الفئة 1
            ['product_id' => 2, 'category_id' => 1,'created_at' => now(),'updated_at' => now()],  // المنتج 2 ينتمي إلى الفئة 1
            ['product_id' => 3, 'category_id' => 2,'created_at' => now(),'updated_at' => now()],  // المنتج 3 ينتمي إلى الفئة 2
            ['product_id' => 4, 'category_id' => 2,'created_at' => now(),'updated_at' => now()],  // المنتج 4 ينتمي إلى الفئة 2
            ['product_id' => 5, 'category_id' => 3,'created_at' => now(),'updated_at' => now()],  // المنتج 5 ينتمي إلى الفئة 3
            ['product_id' => 6, 'category_id' => 3,'created_at' => now(),'updated_at' => now()],  // المنتج 6 ينتمي إلى الفئة 3
            ['product_id' => 7, 'category_id' => 1,'created_at' => now(),'updated_at' => now()],  // المنتج 7 ينتمي إلى الفئة 1
            ['product_id' => 8, 'category_id' => 2,'created_at' => now(),'updated_at' => now()],  // المنتج 8 ينتمي إلى الفئة 2
            ['product_id' => 9, 'category_id' => 3,'created_at' => now(),'updated_at' => now()],  // المنتج 9 ينتمي إلى الفئة 3
            ['product_id' => 10, 'category_id' => 1,'created_at' => now(),'updated_at' => now()], // المنتج 10 ينتمي إلى الفئة 1
            ['product_id' => 11, 'category_id' => 2,'created_at' => now(),'updated_at' => now()], // المنتج 11 ينتمي إلى الفئة 2
            ['product_id' => 12, 'category_id' => 3,'created_at' => now(),'updated_at' => now()], // المنتج 12 ينتمي إلى الفئة 3
            ['product_id' => 13, 'category_id' => 1,'created_at' => now(),'updated_at' => now()], // المنتج 13 ينتمي إلى الفئة 1
            ['product_id' => 14, 'category_id' => 2,'created_at' => now(),'updated_at' => now()], // المنتج 14 ينتمي إلى الفئة 2
            ['product_id' => 15, 'category_id' => 3,'created_at' => now(),'updated_at' => now()], // المنتج 15 ينتمي إلى الفئة 3
            ['product_id' => 5, 'category_id' => 1,'created_at' => now(),'updated_at' => now()],  // المنتج 5 ينتمي أيضًا إلى الفئة 1 (منتج متعدد الفئات)
            ['product_id' => 6, 'category_id' => 2,'created_at' => now(),'updated_at' => now()],  // المنتج 6 ينتمي أيضًا إلى الفئة 2
            ['product_id' => 7, 'category_id' => 3,'created_at' => now(),'updated_at' => now()],  // المنتج 7 ينتمي أيضًا إلى الفئة 3
        ]);
    }
}
