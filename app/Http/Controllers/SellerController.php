<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    function index() {
        return view('pointakses/seller/index');
    }

    public function seller_order()
    {
        $userId = Auth::id();
    
        $groupedOrders = DB::table('orders')
            ->select('id_pesanan', 'total', 'nama_penerima', 'alamat_pengiriman', 'fakultas', 'tanggal', 'jam', DB::raw('GROUP_CONCAT(menu_name SEPARATOR ", ") as menu_names'))
            ->where('menu_id',  $userId)
            ->groupBy('id_pesanan', 'total', 'nama_penerima', 'alamat_pengiriman', 'fakultas', 'tanggal', 'jam')
            ->get();
    
        return view('pointakses/seller/data_order/tampilkan_order', ['groupedOrders' => $groupedOrders]);
    }
}