<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'describtion',
        'price',
        'stock',
        'code',
        'featured',
        'brand_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'integer',
        'featured' => 'boolean',
        'brand_id' => 'integer',
    ];


    public function varities()
    {
        return $this->hasMany(ProductVarity::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getMasterImageAttribute()
    {
        return $this->images->where('master', true)->first();
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRateAttribute()
    {
        $count = $this->reviews()->count();
        if ($count == 0) {
            return 0;
        }
        return ($this->reviews()->sum('stars') / $count);
    }

    public function getActiveDiscountAttribute()
    {
        return $this->discounts()->where('end_time', '>', Carbon::now());
    }
}
