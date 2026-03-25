<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\PartinH;
use App\Models\PartoutH;
use Carbon\Carbon;

class TransaksiChart extends ChartWidget
{
    protected static ?string $heading = 'Transaksi Per Hari (30 Hari Terakhir)';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '300px';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = collect(range(29, 0))->map(function ($daysAgo) {
            $date = Carbon::today()->subDays($daysAgo);
            return [
                'date' => $date->format('d M'),
                'in' => PartinH::whereDate('tanggal', $date)->count(),
                'out' => PartoutH::whereDate('tanggal', $date)->count(),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Part In',
                    'data' => $data->pluck('in')->toArray(),
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'pointBackgroundColor' => 'rgb(59, 130, 246)',
                    'pointBorderColor' => 'rgb(59, 130, 246)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Part Out',
                    'data' => $data->pluck('out')->toArray(),
                    'backgroundColor' => 'rgba(239, 68, 68, 0.2)',
                    'borderColor' => 'rgb(239, 68, 68)',
                    'pointBackgroundColor' => 'rgb(239, 68, 68)',
                    'pointBorderColor' => 'rgb(239, 68, 68)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}