@extends('frontend.customer.layouts.menu')
@include('frontend.include.header')

@section('menu')
    <section id="page_header">
        <div class="page_title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Shopping  Cart</h2>
                        <p>UINSA FOOD</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <br>
        <h2>Checkout</h2>
        <br>
        <table id="cart" class="table table-bordered">
            <!-- ... Display cart items ... -->
            <tr>
            <th>Menu</th>
            <th></th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @php $total = 0 @endphp
        @if(session("order_" . auth()->id()))
            @foreach(session("order_" . auth()->id()) as $id => $order_detail)
                <tr rowId="{{ $id }}">
                    <td data-th="Menu">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="nomargin">{{ $order_detail['menu_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <img src="{{ url('storage/menu_images/' . basename($order_detail['menu_pic'])) }}" class="rounded" style="width: 150px">
                    </td>
                    <td data-th="Price">Rp. {{ $order_detail['menu_price'] }}</td>
                    <td data-th="Quantity"> {{ $order_detail['quantity'] }} </td>
                    <td data-th="Subtotal" class="text-center">{{ $order_detail['subtotal'] }} </td>
                    @php
                    $total += $order_detail['subtotal'];
                    @endphp
                </tr>    
            @endforeach
        @endif
        </table>
        <div class="text-right">
            <strong><p>Total: Rp. {{ $total }}</p></strong>
            <!-- Add a form for submitting the order -->
            <form action="{{ route('place.order') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Place Order</button>
            </form>
        </div>
    </div>
@endsection
