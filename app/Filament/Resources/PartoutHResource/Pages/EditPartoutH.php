<?php

namespace App\Filament\Resources\PartoutHResource\Pages;

use App\Filament\Resources\PartoutHResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartoutH extends EditRecord
{
    protected static string $resource = PartoutHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
