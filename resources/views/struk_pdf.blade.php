<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $toko }} - Struk Kasir</title>
    <style>
        @page {
            /* Ukuran kertas struk kasir roll mini (58mm) */
            size: 58mm 165mm;
            margin: 0;
        }
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 9px;
            color: #000;
            margin: 0;
            padding: 10px 8px;
            line-height: 1.3;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }
        .title {
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .dashed {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        .double {
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            height: 2px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }
        td {
            padding: 2px 0;
            vertical-align: top;
        }
        .footer {
            margin-top: 8px;
            font-size: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <div class="title">{{ $toko }}</div>
        <div>{{ $alamat }}</div>
        <div>Telp: {{ $telp }}</div>
    </div>

    <div class="dashed"></div>

    <table>
        <tr>
            <td>No: {{ $no_struk }}</td>
            <td class="text-right">Kasir: {{ $kasir }}</td>
        </tr>
        <tr>
            <td colspan="2">Waktu: {{ $waktu }}</td>
        </tr>
    </table>

    <div class="dashed"></div>

    <table>
        @foreach ($items as $item)
            <tr>
                <td colspan="2" class="bold">{{ $item['nama'] }}</td>
            </tr>
            <tr>
                <td>{{ $item['qty'] }} x Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>

    <div class="dashed"></div>

    <table>
        <tr>
            <td>Subtotal</td>
            <td class="text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Diskon Promo</td>
            <td class="text-right">-Rp {{ number_format($diskon, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="double"></div>

    <table>
        <tr class="bold" style="font-size: 10px;">
            <td>TOTAL BAYAR</td>
            <td class="text-right">Rp {{ number_format($total_bayar, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Metode Bayar</td>
            <td class="text-right">{{ $metode_bayar }}</td>
        </tr>
    </table>

    <div class="dashed"></div>

    <div class="footer">
        *** TERIMA KASIH ***<br>
        Silakan berkunjung kembali!<br>
        Instagram: @kopikita.official
    </div>
</body>
</html>