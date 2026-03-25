<?php

namespace App\Filament\Resources\PartinHResource\Pages;

use App\Filament\Resources\PartinHResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartinH extends EditRecord
{
    protected static string $resource = PartinHResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
