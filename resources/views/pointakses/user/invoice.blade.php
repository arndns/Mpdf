<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        @if ($groupedOrders && $groupedOrders)
                            @foreach ($groupedOrders as $groupedOrder)
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                    <img src="{{ asset('frontend/images/logo_uinsa_food.png') }}"
                                                        alt="logo" class="img-responsive">
                                                </td>
                                                <td>
                                                    <strong>ID Pesanan: {{ $groupedOrder->id_pesanan }}</strong>
                                                    <br><strong>Pemesan: {{ $groupedOrder->nama_lengkap }}</strong>
                                                    <br>Menu: {{ $groupedOrder->menu_with_quantity }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                PUSBIS<br>
                                (Pusat Bisnis UIN Sunan Ampel Surabaya)
                                <br>
                                Kantin Maqha lt 2 UIN Sunan Ampel Surabaya, Jl. Ahmad Yani No.117, Jemur Wonosari,
                                Wonocolo, Surabaya
                            </td>
                            <td>
                                <br>Nama Penerima: {{ $groupedOrder->nama_penerima }}
                                <br>Alamat Pengiriman: {{ $groupedOrder->alamat_pengiriman }}
                                <br>Fakultas: {{ $groupedOrder->fakultas }}
                                <br>Tanggal & Jam: {{ $groupedOrder->tanggal }}, {{ $groupedOrder->jam }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Menu (Jumlah)</td>
                <td>Vendor</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Subtotal</td>
            </tr>

            <tr class="item">
                <td>{{ $groupedOrder->menu_with_quantity }}</td>
                <td>{{ $groupedOrder->sellers }}</td>
                <td>{{ $groupedOrder->menu_prices }}</td>
                <td>{{ $groupedOrder->quantities }}</td>
                <td>{{ $groupedOrder-> subtotals }}</td>
            </tr>
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total: Rp {{ $groupedOrder->total }}</strong></td>
            </tr>
        </table>
    </div>
</body>
</html>