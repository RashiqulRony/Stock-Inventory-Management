<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'category_id',
        'subcategory_id',
        'brand_id',
        'name',
        'image',
        'descriptions',
        'notes',
        'status',
    ];

    public function variants() {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}
