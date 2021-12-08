<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'price_root',
        'price_sell',
        'code_product',
        'category_id',
        'rating',
        'color',
        'is_view',
        'status',
        'feature',
        'info_product',
        'image_product',
        'qty',
        'description',
        'details',
        'reviews',
    ];
}
