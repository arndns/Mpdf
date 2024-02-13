@extends('frontend.customer.layouts.menu')
@include('frontend.include.header')
@section('menu')

 <!--Page header & Title-->
<section id="page_header">
    <div class="page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Shopping Cart</h2>
                    <p>UINSA FOOD</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @php $total = 0 @endphp
            @if(session("order_" . auth()->id()))
                @foreach(session("order_" . auth()->id()) as $id => $order_detail)
                    <tr rowId="{{ $id }}">
                        <td data-th="Menu">{{ $order_detail['menu_name'] }}</td>
                        <td data-th="Seller">{{ $order_detail['seller'] }}</td>
                        <td data-th="Price">Rp. {{ $order_detail['menu_price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control edit-cart-info" value="{{ $order_detail['quantity'] }}" />
                        </td>
                        <td data-th="Subtotal">{{ $order_detail['subtotal'] }}</td>
                        <td class="actions">
                            <button class="btn btn-outline-danger btn-sm delete-product"><i class="icon-trash"></i></button>
                        </td>
                        @php
                        $total += $order_detail['subtotal'];
                        @endphp
                    </tr>    
                @endforeach
            @endif
        </tbody>
        
        <tfoot>
            <tr>
                <td colspan="5"><strong>Total: Rp. {{ number_format($total, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6" class="text-right">
                    <a href="{{ url('/menu') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <a href="{{ url('/checkout') }}" class="btn btn-danger">Checkout</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(".edit-cart-info").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        var quantity = ele.val();

        $.ajax({
            url: '{{ route('update.sopping.order') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
                quantity: quantity,
            },
            success: function (response) {
               window.location.reload(true);
            }
        });
    });

    $(".delete-product").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('delete.cart.menu') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection
