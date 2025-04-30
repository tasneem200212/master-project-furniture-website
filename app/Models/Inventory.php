<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Inventory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['product_id', 'stock_quantity'];

    protected $dates = ['deleted_at']; 


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
