<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laporan Stok Part</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 11px; }
            h2, h3 { text-align: center; margin: 0; }
            table { width: 100%; border-collapse: collapse; margin-top: 15px; }
            th, td { border: 1px solid #000; padding: 5px; text-align: left; }
            th { background-color: #f0f0f0; text-align: center; }
            td.center { text-align: center; }
            .habis { color: red; font-weight: bold; }
            .menipis { color: orange; font-weight: bold; }
            .aman { color: green; font-weight: bold; }
            .signature-table { margin-top: 40px; width: 100%; border-collapse: collapse; }
            .signature-table td { border: none; text-align: center; padding: 0 10px; width: 20%; }
            .signature-line { margin-top: 50px; border-top: 1px solid #000; width: 80%; margin-left: auto; margin-right: auto; }
            .print-info { margin-top: 20px; font-size: 11px; }
        </style>
    </head>
    <body>
        <h2>HGS Sparepart</h2>
        <h3>Laporan Stok Sparepart</h3>
        <p style="text-align:center">Dicetak pada: {{ $tanggal }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Part</th>
                    <th>Nama Part</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parts as $i => $part)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td>{{ $part->kode }}</td>
                    <td>{{ $part->nama }}</td>
                    <td class="center">{{ $part->stok }}</td>
                    <td class="center">
                        @if($part->stok <= 0)
                            <span class="habis">Habis</span>
                        @elseif($part->stok <= 5)
                            <span class="menipis">Menipis</span>
                        @else
                            <span class="aman">Aman</span>
                        @endif
                    </td>
                </tr>
                @endforeach
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
