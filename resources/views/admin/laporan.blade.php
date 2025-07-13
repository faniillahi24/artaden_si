@extends('layouts.admin')

@section('title', 'Laporan Bulan ' . $bulan)

@section('content')
<div class="container">
    <h1 class="mt-4">Laporan Reservasi Bulan {{ $bulan }}</h1>

    <div class="alert alert-info mt-3">
        <strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
    </div>

    <table class="table table-bordered mt-3">
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
            @forelse($data as $i => $r)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $r->nama_pengunjung ?? '-' }}</td>
                    <td>
                        @if ($r->fasilitas->isNotEmpty())
                        {{ $r->fasilitas->pluck('nama_fasilitas')->filter()->join(', ') }}
                        @else
                        -
                        @endif
                    </td>


                    <td>{{ $r->created_at->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($r->total_biaya, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($r->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data reservasi bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('admin.laporan.unduh') }}" class="btn btn-primary mb-3">📥 Unduh PDF</a>
</div>
@endsection