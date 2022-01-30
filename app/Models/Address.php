<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'City',
        'district',
        'wards',
        'details_add',
        'fullname',
        'phone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('\App\Models\product', 'user_id','id');
    }

    public function toCity()
    {
        return $this->belongsTo('\App\Models\City', 'City','matp');
    }

    public function toProvince()
    {
        return $this->belongsTo('\App\Models\Province', 'district','maqh');
    }

    public function toWards()
    {
        return $this->belongsTo('\App\Models\wards', 'wards','xaid');
    }
}
