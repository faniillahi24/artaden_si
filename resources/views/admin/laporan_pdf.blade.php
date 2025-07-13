<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Reservasi Bulan {{ $bulan }}</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Reservasi Bulan {{ $bulan }}</h2>
    <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Fasilitas</th>
                <th>Tanggal Reservasi</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $r)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $r->nama_pengunjung }}</td>
                    <td>
                        @if ($r->fasilitas->isNotEmpty())
                            {{ $r->fasilitas->pluck('nama_fasilitas')->filter()->join(', ') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $r->tanggal_kunjungan->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($r->total_biaya, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($r->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>