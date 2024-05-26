<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QRController;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('landing');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');





Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/csv-all', [OrderController::class, 'generateCSV']);
Route::post('/orders/import', [OrderController::class, 'import'])->name('orders.import');



Route::get('/products/pdf', [ProductController::class, 'pdf'])->name('pdf');



Route::get('/scanner', function () {
    return view('scanner');
})->name('scanner');
Route::post('/scanner/scan', [OrderController::class, 'handleScan'])->name('scanner.scan');

Route::get('/qr', [QRController::class, 'index']);
Route::post('/generate-qr', [QRController::class, 'generateQR']);

// routes/web.php
Route::delete('/orders/deleteAll', [OrderController::class, 'deleteAll'])->name('orders.deleteAll');
