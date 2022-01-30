<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'tbl_quanhuyen';

    protected $fillable = [
        'maqh',
        'name_quanhuyen',
        'type',
        'matp',
    ];
    public function province()
    {
        return $this->belongsTo('App\Models\City', 'matp', 'matp');
    }
}
