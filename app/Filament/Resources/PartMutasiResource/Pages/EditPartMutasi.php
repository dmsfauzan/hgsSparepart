<?php

namespace App\Filament\Resources\PartMutasiResource\Pages;

use App\Filament\Resources\PartMutasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartMutasi extends EditRecord
{
    protected static string $resource = PartMutasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
