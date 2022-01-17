<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected    $fillable = [
        'user_id',
        'product_id',
        'qty',
        'price',
        'type',
    ];

    // Gần giống với kết nối bảng trong controller, cái dưới có nghĩa là một sản phẩm trong Model Cart thuộc về một sản phẩm trong model Product thông qua id và product_id

    // Mỗi khi $value bên view trỏ qua thì nó sẽ trỏ qua hàm product() thì nó sẽ trở thành một product

    public function product()
    {
        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
}
