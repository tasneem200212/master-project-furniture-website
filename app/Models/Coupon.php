<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Coupon extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['code', 'discount_percentage', 'expiry_date', 'times_used', 'max_usage'];

    protected $dates = ['deleted_at']; 


}
