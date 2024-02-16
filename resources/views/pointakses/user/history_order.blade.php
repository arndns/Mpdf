@extends('frontend.customer.layouts.menu')
@include('frontend.include.header')

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
                <td>
                    @isset($groupedOrder->id_pesanan)
                    <strong>ID Pesanan: {{ $groupedOrder->id_pesanan }}</strong>
                    @endisset
                    <br>Menu (Jumlah): <strong>{{ $groupedOrder->menu_with_quantity }}</strong>
                    <br>Total: {{ $groupedOrder->total }}
                    <br>Nama Penerima: {{ $groupedOrder->nama_penerima }}
                    <br>Alamat Pengiriman: {{ $groupedOrder->alamat_pengiriman }}
                    <br>Fakultas: {{ $groupedOrder->fakultas }}
                    <br>Tanggal & Jam: {{ $groupedOrder->tanggal }}, {{ $groupedOrder->jam }}
                </td>
                <td>
                    @isset($groupedOrder->id_pesanan)
                    {{-- <a href="{{ route('user_invoice', ['id_pesanan' => $groupedOrder->id_pesanan]) }}"
                        class="btn btn-info">Lihat Invoice</a> --}}
                    <a href="{{ route('download', ['id_pesanan' => $groupedOrder->id_pesanan]) }}"
                        class="btn btn-success">LIHAT INVOICE</a>
                    @endisset
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