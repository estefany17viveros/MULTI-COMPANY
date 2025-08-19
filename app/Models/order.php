<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cart_product;
use App\Models\order_product;

class order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'cart_product_id',
        'description',
        'quantity',
        'unit_price',
        'total_amount',
    ];

    public function cartProduct()
    {
        return $this->belongsTo(cart_product::class, 'cart_product_id');
    }

    public function orderProducts()
    {
        return $this->hasMany(order_product::class);
    }
}