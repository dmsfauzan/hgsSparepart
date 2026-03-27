<?php

namespace App\Exports;

use App\Models\Part;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;

class PartExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection(): Collection
    {
        return Part::orderBy('kode')->get()->map(function ($part, $i) {
            return [
                'No' => $i + 1,
                'Kode Part' => $part->kode,
                'Nama Part' => $part->nama,
                'Stok' => $part->stok,
                'Status' => $part->stok <= 0 ? 'Habis' : ($part->stok <= 5 ? 'Menipis' : 'Aman'),
            ];
        });
    }

    public function headings(): array
    {
        return ['No', 'Kode Part', 'Nama Part', 'Stok', 'Status'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
