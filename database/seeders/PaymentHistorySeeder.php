<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentHistory;

class PaymentHistorySeeder extends Seeder
{
    public function run()
    {
        PaymentHistory::create([
            'order_id' => 1,
            'amount' => 299.99,
            'payment_method_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
