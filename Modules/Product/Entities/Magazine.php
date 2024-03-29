<?php

namespace App\Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Product\Entities\Product;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_quntity',
        'quantity_product_add_or_sub',
        'action_used'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
