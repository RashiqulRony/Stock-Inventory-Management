<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'photo',
        'address',
        'point',
        'total_point',
        'status',
    ];
}
