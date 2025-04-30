<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['order_id', 'shipping_method', 'shipping_cost', 'status'];

    protected $dates = ['deleted_at']; 



    public function order()
    {
        return $this->belongsTo(Order::class);
    }

public function user()
{
    return $this->belongsTo(User::class);
}

}
