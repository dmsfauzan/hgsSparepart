<?php

namespace App\Filament\Resources\PartoutHResource\Pages;

use App\Filament\Resources\PartoutHResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePartoutH extends CreateRecord
{
    protected static string $resource = PartoutHResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $tanggal = \Carbon\Carbon::parse($data['tanggal']);
        $todayFormatted = $tanggal->format('Ymd');

        $count = \App\Models\PartoutH::whereDate('tanggal', $tanggal->toDateString())->count() + 1;

        $data['code'] = 'partout-' . $todayFormatted . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        $data['operator'] = auth()->user()->name;

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->details as $detail) {
            $part = \App\Models\Part::find($detail->part_id);
            $part->stok -= $detail->qty;
            $part->save();

            \App\Models\PartMutasi::create([
                'part_id' => $detail->part_id,
                'kode_transaksi' => $this->record->code,
                'qty' => $detail->qty,
                'tipe' => 'OUT'
            ]);
        }

        // Log aktivitas
        \App\Helpers\LogHelper::log(
            'Tambah Transaksi',
            'Part Out',
            'Kode: ' . $this->record->code
        );
    }
}
