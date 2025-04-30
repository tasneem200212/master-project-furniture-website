<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Discount extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['code', 'discount_value', 'discount_type', 'start_date', 'end_date', 'discount_id'];

    protected $dates = ['deleted_at']; 


    public function product()
    {
        return $this->hasOne(Product::class, 'discount_id');
    }
    



}
