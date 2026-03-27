<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laporan Mutasi - {{ $namaBulan }}</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 11px; }
            h2, h3 { text-align: center; margin: 0; }
            table { width: 100%; border-collapse: collapse; margin-top: 15px; }
            th, td { border: 1px solid #000; padding: 5px; text-align: left; }
            th { background-color: #f0f0f0; text-align: center; }
            td.center { text-align: center; }
            .in { color: green; font-weight: bold; }
            .out { color: red; font-weight: bold; }
            .total { font-weight: bold; background-color: #f0f0f0; }
            .signature-table { margin-top: 40px; width: 100%; border-collapse: collapse; }
            .signature-table td { border: none; text-align: center; padding: 0 10px; width: 20%; }
            .signature-line { margin-top: 50px; border-top: 1px solid #000; width: 80%; margin-left: auto; margin-right: auto; }
            .print-info { margin-top: 20px; font-size: 11px; }
        </style>
    </head>
    <body>
        <h2>HGS Sparepart</h2>
        <h3>Laporan Mutasi Sparepart Bulan {{ $namaBulan }}</h3>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Kode Part</th>
                    <th>Nama Part</th>
                    <th>Qty</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mutasi as $i => $item)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td class="center">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td>{{ $item->part->kode }}</td>
                    <td>{{ $item->part->nama }}</td>
                    <td class="center">{{ $item->qty }}</td>
                    <td class="center {{ $item->tipe == 'IN' ? 'in' : 'out' }}">{{ $item->tipe }}</td>
                </tr>
                @endforeach
                <tr class="total">
                    <td colspan="5" style="text-align:right">Total</td>
                    <td colspan="2" class="center">
                        <span class="in">IN: {{ $totalIn }}</span> |
                        <span class="out">OUT: {{ $totalOut }}</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Tanda Tangan -->
        <table class="signature-table">
            <tr>
                <td><strong>Approved</strong></td>
                <td><strong>Is Known</strong></td>
                <td><strong>Cashier</strong></td>
                <td><strong>Receiver</strong></td>
                <td><strong>Requested</strong></td>
            </tr>
            <tr>
                <td style="height: 60px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><div class="signature-line"></div></td>
                <td><div class="signature-line"></div></td>
                <td><div class="signature-line"></div></td>
                <td><div class="signature-line"></div></td>
                <td><div class="signature-line"></div></td>
            </tr>
        </table>

        <!-- Print Info -->
        <div class="print-info">
            <p>Print User : {{ strtoupper(auth()->user()->name) }}</p>
            <p>Print Date : {{ \Carbon\Carbon::now()->format('m/d/Y g:i:s A') }}</p>
        </div>
    </body>
</html>
