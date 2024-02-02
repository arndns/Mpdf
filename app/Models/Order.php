<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'orders';

    protected $fillable = [
        'users_id',
        'menu_id',
        'menu_price',
        'quantity',
        'subtotal',
        'total'
    ];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function menus()
    {
        return $this -> hasMany(Menu::class, 'menu_id');
    }

    public function purchase()
    {
        return $this -> belongsTo(Purchase::class);
    }
}