<?php

namespace App\Filament\Resources\PartResource\Pages;

use App\Filament\Resources\PartResource;
use Filament\Resources\Pages\EditRecord;

class EditPart extends EditRecord
{
    protected static string $resource = PartResource::class;

    protected function afterSave(): void
    {
        \App\Helpers\LogHelper::log(
            'Edit Data',
            'Master Data',
            'Edit Part: ' . $this->record->kode . ' - ' . $this->record->nama
        );
    }
}
