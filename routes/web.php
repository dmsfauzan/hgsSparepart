<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/partin-pdf/{id}', [PdfController::class, 'partinPdf'])
    ->middleware('auth')
    ->name('partin.pdf');

Route::get('/partout-pdf/{id}', [PdfController::class, 'partoutPdf'])
    ->middleware('auth')
    ->name('partout.pdf');

Route::get('/mutasi-pdf/{bulan}/{tahun}', [PdfController::class, 'mutasiPdf'])
    ->middleware('auth')
    ->name('mutasi.pdf');