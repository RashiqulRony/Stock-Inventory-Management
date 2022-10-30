<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'user_id', 'customer_id', 'vat', 'subtotal_amount', 'total_amount', 'pay_amount', 'return_amount', 'point_withdraw', 'point_discount_amount', 'dew_amount', 'status', 'payment_option',
    ];
}
