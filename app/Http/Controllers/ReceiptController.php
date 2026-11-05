<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class ReceiptController extends Controller
{
    public function print()
    {
        try {
            $connector = new FilePrintConnector(storage_path('app/struk_test.txt'));

            $printer = new Printer($connector);

            // 1. Format Header
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("TOKO CONTOH\n");
            $printer->setEmphasis(false);
            $printer->text("Jl. Mawar No. 123\n");
            $printer->text("================================\n");

            // 2. Daftar Item Belanja
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Barang A             2 x 5.000\n");
            $printer->text("Barang B             1 x 10.000\n");
            $printer->text("--------------------------------\n");
            $printer->text("Total:                Rp20.000\n");
            $printer->text("================================\n");

            // 3. Footer dan Potong Kertas
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Terima kasih!\n");
            $printer->cut();
            $printer->close();

            return response()->json([
                'message' => 'Struk berhasil dicetak (disimpan ke file)!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}