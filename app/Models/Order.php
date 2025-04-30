<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id', 'status', 'total_price', 'shipping_address_id'
    ];

    protected $dates = ['deleted_at']; 


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
                    ->withPivot('quantity');
    }
    

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }  

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
