<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBanner extends Model
{
    use HasFactory;
    protected $table = 'sub_banners';
    protected $fillable = [
        'small_banner_1',
        'small_banner_2',
        'sub_banner',
        'is_view_1',
        'is_view_2',
        'is_view_sub',
        ];
}
