<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Order;

class OrderController extends Controller
{
    public function placeOrder(Request $request): RedirectResponse
    {

        $orderData = Session::get("order_" . auth()->id());

        foreach ($orderData as $orderDetail) {
            $order = new Order([
                'users_id' => auth()->id(),
                'menu_id' => $orderDetail['menu_id'],
                'menu_name' => $orderDetail['menu_name'],
                'menu_pic' => $orderDetail['menu_pic'],
                'menu_price' => $orderDetail['menu_price'],
                'quantity' => $orderDetail['quantity'],
                'subtotal' => $this->calculateSubtotal($orderData),
                'total' => $this->calculateTotal($orderData)
            ]);
            $order->save();

            $orderId = $order->id;

            $orderDetail['order_id'] = $orderId;
        }

        Session::forget("order_" . auth()->id());

        // Redirect ke halaman terima kasih atau halaman lainnya
        return redirect()->route('menu_user')->with('Berhasil', 'Transaksi berhasil.');
    }

    private function calculateTotal($orderData)
    {
        $total = 0;

        foreach ($orderData as $orderDetail) {
            $total += $orderDetail['subtotal'];
        }

        return $total;
    }

    private function getTotalQuantity($orderData)
    {
        $totalQuantity = 0;

        foreach ($orderData as $orderDetail) {
            $totalQuantity += $orderDetail['quantity'];
        }

        return $totalQuantity;
    }

    private function calculateSubtotal($orderData)
    {
        $subtotal = 0;

        foreach ($orderData as $orderDetail) {
            $subtotal += $orderDetail['subtotal'];
        }

        return $subtotal;
    }
}