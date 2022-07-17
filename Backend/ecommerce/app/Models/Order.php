<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'gst',
        'pst',
        'vat',
        'sub_total',
        'shipping_charge',
        'total',
        'order_status',
        'shipping_address',
        'billing_address',
    ];
}