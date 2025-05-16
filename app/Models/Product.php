<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'image', 'weight', 'dimensions', 
        'color', 'size', 'model', 'shipping', 'care_info', 'brand', 'discount_id'
    ];

    protected $dates = ['deleted_at']; 

    // علاقة مع الفئة (Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة مع صور المنتج (ProductImage)
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    // علاقة مع التقييمات (Review)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // علاقة مع التباينات (ProductVariant)
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // علاقة مع السلة (Cart)
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // المتوسط الحسابي لتقييم المنتج
    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->avg('rating') ?? 0);
    }

    // عدد التقييمات للمنتج
    public function getReviewCountAttribute()
    {
        return $this->reviews()->count();
    }

    // علاقة مع الخصم (Discount)
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details')
                    ->withPivot('quantity', 'price');
    }
    

}
