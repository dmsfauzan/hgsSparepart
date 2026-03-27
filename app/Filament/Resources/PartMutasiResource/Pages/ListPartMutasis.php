<?php

namespace App\Filament\Resources\PartMutasiResource\Pages;

use App\Filament\Resources\PartMutasiResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListPartMutasis extends ListRecords
{
    protected static string $resource = PartMutasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->label('Print Laporan Bulanan')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->form([
                    \Filament\Forms\Components\Select::make('bulan')
                        ->label('Bulan')
                        ->options([
                            '1' => 'Januari', '2' => 'Februari', '3' => 'Maret',
                            '4' => 'April', '5' => 'Mei', '6' => 'Juni',
                            '7' => 'Juli', '8' => 'Agustus', '9' => 'September',
                            '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                        ])
                        ->default(now()->month)
                        ->required(),
                    \Filament\Forms\Components\Select::make('tahun')
                        ->label('Tahun')
                        ->options(collect(range(2024, 2030))->mapWithKeys(fn ($y) => [$y => $y]))
                        ->default(now()->year)
                        ->required(),
                ])
                ->action(function (array $data) {
                    $this->redirect(route('mutasi.pdf', [
                        'bulan' => $data['bulan'],
                        'tahun' => $data['tahun']
                    ]));
                }),

            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-table-cells')
                ->color('info')
                ->form([
                    \Filament\Forms\Components\Select::make('bulan')
                        ->label('Bulan')
                        ->options([
                            '1' => 'Januari', '2' => 'Februari', '3' => 'Maret',
                            '4' => 'April', '5' => 'Mei', '6' => 'Juni',
                            '7' => 'Juli', '8' => 'Agustus', '9' => 'September',
                            '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
                        ])
                        ->default(now()->month)
                        ->required(),
                    \Filament\Forms\Components\Select::make('tahun')
                        ->label('Tahun')
                        ->options(collect(range(2024, 2030))->mapWithKeys(fn ($y) => [$y => $y]))
                        ->default(now()->year)
                        ->required(),
                ])
                ->action(function (array $data) {
                    $this->redirect(route('export.mutasi', [
                        'bulan' => $data['bulan'],
                        'tahun' => $data['tahun']
                    ]));
                }),
        ];
    }
}
