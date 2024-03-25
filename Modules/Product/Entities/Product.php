<?php

namespace Modules\Product\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
