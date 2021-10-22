<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_code',
        'category_id',
        'brand_id',
        'thumbnail',
        'images',
        'price',
        'discount',
        'size',
        'color',
        'quantity',
        'short_description',
        'content',
        'sort_order',
        'slug',
        'status',
        'quantity_sold',
        'number_favorites'
    ];
}
