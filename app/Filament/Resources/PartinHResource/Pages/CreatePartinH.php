<?php

namespace App\Filament\Resources\PartinHResource\Pages;

use App\Filament\Resources\PartinHResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartinH extends CreateRecord
{
    protected static string $resource = PartinHResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Ambil tanggal dari input user
        $tanggal = \Carbon\Carbon::parse($data['tanggal']);
        $todayFormatted = $tanggal->format('Ymd');

        // Hitung berdasarkan tanggal yang dipilih user
        $count = \App\Models\PartinH::whereDate('tanggal', $tanggal->toDateString())->count() + 1;

        $data['code'] = 'partin-' . $todayFormatted . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        $data['operator'] = auth()->user()->name;

        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->record->details as $detail) {
            $part = \App\Models\Part::find($detail->part_id);
            $part->stok += $detail->qty;
            $part->save();

            \App\Models\PartMutasi::create([
                'part_id' => $detail->part_id,
                'kode_transaksi' => $this->record->code,
                'qty' => $detail->qty,
                'tipe' => 'IN'
            ]);
        }

        // Log aktivitas
        \App\Helpers\LogHelper::log(
            'Tambah Transaksi',
            'Part In',
            'Kode: ' . $this->record->code
        );
    }
}
