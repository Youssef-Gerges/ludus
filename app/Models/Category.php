<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'featured',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'featured' => 'boolean',
    ];


    public function brands()
    {
        return $this->hasManyThrough(Brand::class, BrandCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, BrandCategory::class, 'category_id', 'brand_id');
    }
}
