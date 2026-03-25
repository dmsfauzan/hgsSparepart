<?php

namespace App\Http\Controllers;

use App\Models\PartinH;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function partinPdf($id)
    {
        $partin = PartinH::with('details.part')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.partin', compact('partin'));
        return $pdf->stream('partin-' . $partin->code . '.pdf');
    }

    public function partoutPdf($id)
    {
        $partout = \App\Models\PartoutH::with('details.part')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.partout', compact('partout'));
        return $pdf->stream('partout-' . $partout->code . '.pdf');
    }

    public function mutasiPdf($bulan, $tahun)
    {
        $mutasi = \App\Models\PartMutasi::with('part')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->orderBy('created_at', 'asc')
            ->get();

        $namaBulan = \Carbon\Carbon::createFromDate($tahun, $bulan, 1)->translatedFormat('F Y');

        $totalIn = $mutasi->where('tipe', 'IN')->sum('qty');
        $totalOut = $mutasi->where('tipe', 'OUT')->sum('qty');

        $pdf = Pdf::loadView('pdf.mutasi', compact('mutasi', 'namaBulan', 'totalIn', 'totalOut'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-mutasi-' . $bulan . '-' . $tahun . '.pdf');
    }
}