<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin/register', \App\Filament\Pages\Auth\Register::class)
    ->name('filament.admin.auth.register')
    ->middleware('guest');

Route::get('/partin-pdf/{id}', [PdfController::class, 'partinPdf'])
    ->middleware('auth')
    ->name('partin.pdf');

Route::get('/partout-pdf/{id}', [PdfController::class, 'partoutPdf'])
    ->middleware('auth')
    ->name('partout.pdf');

Route::get('/mutasi-pdf/{bulan}/{tahun}', [PdfController::class, 'mutasiPdf'])
    ->middleware('auth')
    ->name('mutasi.pdf');

Route::get('/laporan-stok-pdf', [PdfController::class, 'laporanStokPdf'])
    ->middleware('auth')
    ->name('laporan.stok.pdf');

Route::get('/laporan-perpart-pdf/{id}', [PdfController::class, 'laporanPerPartPdf'])
    ->middleware('auth')
    ->name('laporan.perpart.pdf');

Route::get('/export-part', [ExportController::class, 'exportPart'])
    ->middleware('auth')
    ->name('export.part');

Route::get('/export-mutasi/{bulan}/{tahun}', [ExportController::class, 'exportMutasi'])
    ->middleware('auth')
    ->name('export.mutasi');
