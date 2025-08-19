<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\cart;

class cart_product extends Model
{
    /** @use HasFactory<\Database\Factories\CartProductFactory> */
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'cart_product_id');
    }
}
