<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        PaymentMethod::create(['method_name' => 'Credit Card','created_at' => now(),'updated_at' => now()]);
        PaymentMethod::create(['method_name' => 'Cash on Delivery','created_at' => now(),'updated_at' => now()]);
    }
}
