<?php

namespace Modules\Orders\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
