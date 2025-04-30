<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingAddress;

class ShippingAddressSeeder extends Seeder
{
    public function run()
    {
        ShippingAddress::insert([
            ['user_id' => 1, 'address' => 'Amman, Jordan', 'governorate' => 'Amman', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 2, 'address' => 'Zarqa, Jordan', 'governorate' => 'Zarqa', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 3, 'address' => 'Irbid, Jordan', 'governorate' => 'Irbid', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 4, 'address' => 'Aqaba, Jordan', 'governorate' => 'Aqaba', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 5, 'address' => 'Amman, Jordan', 'governorate' => 'Amman', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 6, 'address' => 'Mafraq, Jordan', 'governorate' => 'Mafraq', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 7, 'address' => 'Salt, Jordan', 'governorate' => 'Salt', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 8, 'address' => 'Tafilah, Jordan', 'governorate' => 'Tafilah', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 9, 'address' => 'Jerash, Jordan', 'governorate' => 'Jerash', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
            ['user_id' => 10, 'address' => 'Karak, Jordan', 'governorate' => 'Karak', 'area' => 'Jordan','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
