<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentHistory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['order_id', 'payment_method_id', 'amount'];

    protected $dates = ['deleted_at']; 


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
