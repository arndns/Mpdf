<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */

    protected $table = 'table_menu';
    protected $guarded = ['id'];

    protected $fillable = [
        'menu_pic',
        'menu_name',
        'menu_price',
        'menu_desc'
    ];

    public function category()
    {
        return $this -> belongsTo(Category::class);
    }

    public function user()
    {
        return $this -> belongsTo(User::class, 'users_id');
    }

    public function order()
    {
        return $this -> belongsTo(Order::class);
    }
}