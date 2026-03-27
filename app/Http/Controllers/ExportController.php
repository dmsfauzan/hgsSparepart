<?php

namespace App\Http\Controllers;

use App\Exports\PartExport;
use App\Exports\MutasiExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPart()
    {
        return Excel::download(new PartExport, 'laporan-stok-part.xlsx');
    }

    public function exportMutasi($bulan, $tahun)
    {
        return Excel::download(new MutasiExport($bulan, $tahun), 'laporan-mutasi-' . $bulan . '-' . $tahun . '.xlsx');
    }
}
