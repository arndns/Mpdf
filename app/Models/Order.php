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
        'quantity',
        'menu_price',
        'subtotal',
        'total',
        'id_pesanan', // Tambahkan kolom id_pesanan
        'nama_penerima', // Tambahkan kolom nama_penerima
        'alamat_pengiriman', // Tambahkan kolom alamat_pengiriman
        'fakultas', // Tambahkan kolom fakultas
        'tanggal', // Tambahkan kolom tanggal
        'jam', // Tambahkan kolom jam
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
