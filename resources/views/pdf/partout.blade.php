<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Partout - {{ $partout->code }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
        .info td { border: none; padding: 2px 8px; }
    </style>
</head>
<body>
    <h2>HGS Sparepart</h2>
    <h3 style="text-align:center">Bukti Pengeluaran Part</h3>

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
</body>
</html>