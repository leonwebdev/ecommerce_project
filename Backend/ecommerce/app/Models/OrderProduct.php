<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'unit_price',
        'quantity',
        'line_price',
        'product_name',
        'size',
    ];
}