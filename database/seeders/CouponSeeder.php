<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'code' => 'WINTER2022',
            'discount_percentage' => 15,
            'expiry_date' => '2025-12-31' ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);    }
}
