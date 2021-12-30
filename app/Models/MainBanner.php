<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBanner extends Model
{
    use HasFactory;
    protected $table = 'main_banners';
    protected $fillable = [
            'main_banner_1',
            'start_price',
            'name_product',
            'sale_offer',
            'is_view',
            ];
}
