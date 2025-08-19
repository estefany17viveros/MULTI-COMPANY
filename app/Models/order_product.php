<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;
use App\Models\invoice;

class order_product extends Model
{
    /** @use HasFactory<\Database\Factories\OrderProductFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_amount',
    ];

    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function invoice()
    {
        return $this->belongsTo(invoice::class);
    }
}
