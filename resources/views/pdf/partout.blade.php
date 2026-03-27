<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Partout - {{ $partout->code }}</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 12px; }
            h2 { text-align: center; margin: 0; }
            h3 { text-align: center; margin: 4px 0 10px; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; }
            th, td { border: 1px solid #000; padding: 6px; text-align: left; }
            th { background-color: #f0f0f0; }
            .info { margin-bottom: 10px; }
            .info td { border: none; padding: 2px 8px; }
            .signature-table { margin-top: 40px; border: none; }
            .signature-table td { border: none; text-align: center; padding: 0 10px; width: 20%; }
            .signature-line { margin-top: 50px; border-top: 1px solid #000; width: 80%; margin-left: auto; margin-right: auto; }
            .print-info { margin-top: 20px; font-size: 11px; }
        </style>
    </head>
    <body>
        <h2>HGS Sparepart</h2>
        <h3>Bukti Pengeluaran Part</h3>

        <table class="info">
            <tr><td>Kode</td><td>: {{ $partout->code }}</td></tr>
            <tr><td>Tanggal</td><td>: {{ \Carbon\Carbon::parse($partout->tanggal)->format('d M Y') }}</td></tr>
            <tr><td>Pengirim</td><td>: {{ $partout->pengirim ?? '-' }}</td></tr>
            <tr><td>Penerima</td><td>: {{ $partout->penerima ?? '-' }}</td></tr>
            <tr><td>Operator</td><td>: {{ $partout->operator }}</td></tr>
        </table>

        <br>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Part</th>
                    <th>Nama Part</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partout->details as $i => $detail)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $detail->part->kode }}</td>
                    <td>{{ $detail->part->nama }}</td>
                    <td>{{ $detail->qty }}</td>
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
                <td>
                    <div class="signature-line"></div>
                </td>
                <td>
                    <div class="signature-line"></div>
                </td>
                <td>
                    <div class="signature-line"></div>
                </td>
                <td>
                    <div class="signature-line"></div>
                </td>
                <td>
                    <div class="signature-line"></div>
                </td>
            </tr>
        </table>

        <!-- Print Info -->
        <div class="print-info">
            <p>Print User : {{ strtoupper($partout->operator) }}</p>
            <p>Print Date : {{ \Carbon\Carbon::now()->format('m/d/Y g:i:s A') }}</p>
        </div>
    </body>
</html>
