<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\PosKopiKitaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/print-receipt', [ReceiptController::class, 'print']);

Route::get('/kopi-kita/struk', [PosKopiKitaController::class, 'cetakStruk']);