<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        Discount::insert([
            [
                'code' => 'SUMMER21',
                'discount_percentage' => 10,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'WINTER24',
                'discount_percentage' => 15,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BLACKFRIDAY',
                'discount_percentage' => 20,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addWeeks(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'WELCOME10',
                'discount_percentage' => 10,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'VIP25',
                'discount_percentage' => 25,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(4),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'NEWYEAR30',
                'discount_percentage' => 30,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FURNITURE15',
                'discount_percentage' => 15,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'BUNDLE20',
                'discount_percentage' => 20,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FLASHSALE5',
                'discount_percentage' => 5,
                'discount_type' => 'percentage',
                'start_date' => now(),
                'end_date' => now()->addWeeks(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'FREESHIP',
                'discount_percentage' => 0,
                'discount_type' => 'fixed',
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
