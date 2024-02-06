@extends('frontend.customer.layouts.menu')
@include('frontend.include.header')

@section('menu')
    <section id="page_header">
        <div class="page_title">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">History Order</h2>
                        <p>UINSA FOOD</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Data Order</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groupedOrders as $groupedOrder)
                    <tr>
                        <td><strong>ID Pesanan: {{ $groupedOrder->id_pesanan }} </strong>
                            <br>Menu: {{ $groupedOrder->menu_names }}
                            <br>Total: {{ $groupedOrder->total }}
                        </td>
                        <td><a href="#" class="btn btn-info">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    </div>
    </div>
@endsection
