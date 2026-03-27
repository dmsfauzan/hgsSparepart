<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Part;

class LaporanStok extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Laporan Stok Sparepart';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $slug = 'laporan-data-sparepart';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.laporan-stok';

    public function getTitle(): string
    {
        return 'Laporan Stok Sparepart';
    }

    public function getViewData(): array
    {
        return [
            'parts' => Part::orderBy('kode')->get(),
        ];
    }
}
