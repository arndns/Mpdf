@extends('pointakses.admin.layouts.dashboard')'

@section('content')
    <h1>Daftar Pesanan</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Menu</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->users_id }}</td>
                    <td>{{ $order->menu_id }}, {{ $order->menu_id }}</td>
                    <td></td>
                    <td>{{ $order->total }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection