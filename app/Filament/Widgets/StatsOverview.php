<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Part In', \App\Models\PartinH::count())
                ->icon('heroicon-o-arrow-down-tray')
                ->color('primary'),

            Stat::make('Total Part Out', \App\Models\PartoutH::count())
                ->icon('heroicon-o-arrow-up-tray')
                ->color('danger'),

            Stat::make('Total Part', \App\Models\Part::count())
                ->icon('heroicon-o-wrench')
                ->color('success'),

            Stat::make('Transaksi Hari Ini', \App\Models\PartinH::whereDate('tanggal', today())->count() + \App\Models\PartoutH::whereDate('tanggal', today())->count())
                ->icon('heroicon-o-calendar')
                ->color('warning'),
        ];
    }
}