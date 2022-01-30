<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    protected $table = 'tbl_xaphuongthitran';

    protected $fillable = [
        'xaid',
        'name_xaphuong',
        'type',
        'maqh',
    ];
    public function district()
    {
        return $this->belongsTo('App\Models\Province', 'maqh', 'maqh');
    }
}
