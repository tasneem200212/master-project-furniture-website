<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function paypal($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('payment.paypal', compact('order'));
    }


    public function bank($order_id)
    {
        $order = Order::findOrFail($order_id);
        return view('payment.bank', compact('order'));
    }
}
