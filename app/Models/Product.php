<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id','category_id','name','slug','description',
        'price','sale_price','sku','stock','images','sizes','colors',
        'status','featured',
    ];

    protected $casts = [
        'images'   => 'array',
        'sizes'    => 'array',
        'colors'   => 'array',
        'featured' => 'boolean',
        'price'    => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category()   { return $this->belongsTo(Category::class); }
    public function vendor()     { return $this->belongsTo(Vendor::class); }
    public function reviews()    { return $this->hasMany(Review::class); }
    public function orderItems() { return $this->hasMany(OrderItem::class); }
    public function wishlists()  { return $this->hasMany(Wishlist::class); }

    public function getEffectivePriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }

    public function getFirstImageAttribute()
    {
        $imgs = $this->images;
        if (is_array($imgs) && count($imgs) > 0) return $imgs[0];
        return 'images/shop/product/1.png';
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
