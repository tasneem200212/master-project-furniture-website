<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingMethod extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description', 'cost'];
    protected $table = 'shipping_methods';

    protected $dates = ['deleted_at']; 


}
