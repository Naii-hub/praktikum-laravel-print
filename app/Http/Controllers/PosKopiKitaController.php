<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PosKopiKitaController extends Controller
{
    public function cetakStruk()
    {
        // 1. Data transaksi studi kasus "Kopi Kita"
        $dataTransaksi = [
            'toko'         => 'KOPI KITA',
            'alamat'       => 'Jl. Danau Toba No. 10, Jember',
            'telp'         => '0812-3456-7890',
            'no_struk'     => 'TRX-KOPI-' . date('YmdHi'),
            'kasir'        => 'Kasir 01',
            'waktu'        => now()->timezone('Asia/Jakarta')->format('d/m/Y H:i:s'),
            'items'        => [
                ['nama' => 'Kopi Susu Aren',   'qty' => 2, 'harga' => 18000, 'subtotal' => 36000],
                ['nama' => 'Croissant Butter', 'qty' => 1, 'harga' => 22000, 'subtotal' => 22000],
                ['nama' => 'Americano',        'qty' => 1, 'harga' => 15000, 'subtotal' => 15000],
            ],
            'subtotal'     => 73000,
            'diskon'       => 10000,
            'total_bayar'  => 63000,
            'metode_bayar' => 'Tunai',
        ];

        // 2. Render tampilan Blade menjadi PDF seukuran kertas roll struk kasir
        $pdf = Pdf::loadView('struk_pdf', $dataTransaksi)
                  ->setPaper([0, 0, 164.41, 467.72], 'portrait');

        // 3. Tampilkan PDF langsung di browser
        return $pdf->stream('Struk-Kopi-Kita.pdf');
    }
}