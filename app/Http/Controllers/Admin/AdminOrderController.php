<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function groupDataByCreatedAt()
    {
        $groupedOrders = DB::table('orders')
            ->select('id_pesanan', 'total', 'nama_penerima', 'alamat_pengiriman', 'fakultas', 'tanggal', 'jam', DB::raw('GROUP_CONCAT(menu_name SEPARATOR ", ") as menu_names'))
            ->groupBy('id_pesanan', 'total', 'nama_penerima', 'alamat_pengiriman', 'fakultas', 'tanggal', 'jam')
            ->get();

        return view('pointakses/admin/data_transaksi/tampilkan_transaksi', ['groupedOrders' => $groupedOrders]);
    }
}