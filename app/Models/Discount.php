<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'varity_id',
        'value',
        'end_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'varity_id' => 'integer',
        'end_time' => 'datetime',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function varity()
    {
        return $this->belongsTo(ProductVarity::class);
    }
}
