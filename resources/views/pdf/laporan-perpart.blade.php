<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laporan Per Part - {{ $part->nama }}</title>
        <style>
            body { font-family: Arial, sans-serif; font-size: 11px; }
            h2, h3 { text-align: center; margin: 0; }
            table { width: 100%; border-collapse: collapse; margin-top: 15px; }
            th, td { border: 1px solid #000; padding: 5px; text-align: left; }
            th { background-color: #f0f0f0; text-align: center; }
            td.center { text-align: center; }
            .in { color: green; font-weight: bold; }
            .out { color: red; font-weight: bold; }
        </style>
    </head>
    <body>
        <h2>HGS Sparepart</h2>
        <h3>Laporan Mutasi Per Part</h3>
        <br>
        <table class="info" style="border:none">
            <tr><td style="border:none">Kode Part</td><td style="border:none">: {{ $part->kode }}</td></tr>
            <tr><td style="border:none">Nama Part</td><td style="border:none">: {{ $part->nama }}</td></tr>
            <tr><td style="border:none">Stok Saat Ini</td><td style="border:none">: {{ $part->stok }}</td></tr>
            <tr><td style="border:none">Dicetak Pada</td><td style="border:none">: {{ $tanggal }}</td></tr>
        </table>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Qty</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mutasi as $i => $item)
                <tr>
                    <td class="center">{{ $i + 1 }}</td>
                    <td class="center">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                    <td>{{ $item->kode_transaksi }}</td>
                    <td class="center">{{ $item->qty }}</td>
                    <td class="center {{ $item->tipe == 'IN' ? 'in' : 'out' }}">{{ $item->tipe }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
