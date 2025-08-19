<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'unit_price',
        'status',
    ];

    public function cartsProducts()
    {
        return $this->hasMany(cart_product::class);
    }
}
