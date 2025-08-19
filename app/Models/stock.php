<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
     protected $fillable = [
        'product_id',
        'branch_id',
        'quantity',
    ];
    protected $allowedfilter = [
        'product_id',
        'branch_id',
        'quantity',
    ];
    protected $allowSort = [
        'product_id',
        'branch_id',
        'quantity',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function branch()
    {
        return $this->belongsTo(branch::class);
    }
}
