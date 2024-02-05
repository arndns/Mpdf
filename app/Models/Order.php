<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'users_id',
        'menu_id',
        'menu_name',
        'menu_pic',
        'menu_price',
        'quantity',
        'subtotal',
        'total',
        'id_pesanan', // Tambahkan kolom id_pesanan
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
