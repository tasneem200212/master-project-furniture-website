<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Shipping;
use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            DiscountSeeder::class,
            ProductSeeder::class,
            ProductCategorySeeder::class,
            ProductImageSeeder::class,
            ProductVariantSeeder::class,
            CouponSeeder::class, 
            InventorySeeder::class,
            UserSeeder::class,
            CartSeeder::class,
            WishlistSeeder::class,
            ShippingAddressSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            PaymentMethodSeeder::class,
            PaymentHistorySeeder::class,
            ShippingSeeder::class,
            ReviewSeeder::class,
            ShippingMethodSeeder::class,
            PostSeeder::class,
        ]);
    }
    
}
