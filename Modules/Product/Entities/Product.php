<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'weight',
        'height',
        'width',
        'depth',
        'stock_quntity',
        'product_image',
        'price'
    ];

    // protected static function newFactory()
    // {
    //     return \App\Modules\Product\Database\factories\ProductFactory::new();
    // }
}
