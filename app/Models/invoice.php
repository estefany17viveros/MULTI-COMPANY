<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order_product;
use App\Models\invoice_item;

class invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'invoice_number',
        'issue_date',
        'patment_method',
    ];

    public function orderProducts()
    {
        return $this->belongsTo(order_product::class);
    }

    public function invoiceItems()
    {
        return $this->belongsTo(invoice_item::class);
    }
}
