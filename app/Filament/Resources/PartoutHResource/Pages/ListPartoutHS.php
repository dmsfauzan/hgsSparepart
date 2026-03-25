<?php

namespace App\Filament\Resources\PartoutHResource\Pages;

use App\Filament\Resources\PartoutHResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartoutHS extends ListRecords
{
    protected static string $resource = PartoutHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make() -> label ('New Data Out'),
        ];
    }
}
