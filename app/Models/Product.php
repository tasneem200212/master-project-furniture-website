<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,SoftDeletes;

        protected $fillable = [
            'name', 'description', 'price', 'category_id', 'image', 'weight', 'dimensions', 
            'color', 'size', 'model', 'shipping', 'care_info', 'brand', 'discount_id'
        ];

        protected $dates = ['deleted_at']; 



public function category()
{
    return $this->belongsTo(Category::class);
}

public function productImages()
{
        return $this->hasMany(ProductImage::class);
    }

public function reviews()
    {
        return $this->hasMany(Review::class);
    }

public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function carts()
{
    return $this->hasMany(Cart::class);
}

public function getAverageRatingAttribute()
{
    return round($this->reviews()->avg('rating') ?? 0);
}

public function getReviewCountAttribute()
{
    return $this->reviews()->count();
}

public function discount()
{
    return $this->belongsTo(Discount::class, 'discount_id');
}

public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
                ->withPivot('quantity');
}


}
