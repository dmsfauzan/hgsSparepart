<?php

namespace App\Exports;

use App\Models\PartMutasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;

class MutasiExport implements FromCollection, WithHeadings, WithStyles
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection(): Collection
    {
        return PartMutasi::with('part')
            ->whereMonth('created_at', $this->bulan)
            ->whereYear('created_at', $this->tahun)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($item, $i) {
                return [
                    'No' => $i + 1,
                    'Tanggal' => $item->created_at->format('d M Y H:i'),
                    'Kode Part' => $item->part->kode,
                    'Nama Part' => $item->part->nama,
                    'Kode Transaksi' => $item->kode_transaksi,
                    'Qty' => $item->qty,
                    'Tipe' => $item->tipe,
                ];
            });
    }

    public function headings(): array
    {
        return ['No', 'Tanggal', 'Kode Part', 'Nama Part', 'Kode Transaksi', 'Qty', 'Tipe'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
