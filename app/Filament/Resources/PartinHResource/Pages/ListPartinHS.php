<?php

namespace App\Filament\Resources\PartinHResource\Pages;

use App\Filament\Resources\PartinHResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartinHs extends ListRecords
{
    protected static string $resource = PartinHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() -> label ('New Data In'),
        ];
    }
}