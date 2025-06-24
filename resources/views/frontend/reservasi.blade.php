@extends('layouts.app')

@section('title', 'Daftar Reservasi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Reservasi Pengunjung</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Pengunjung</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Tanggal Kunjungan</th>
                <th>Jumlah Orang</th>
                <th>Total Biaya</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservasi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pengunjung }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d-m-Y') }}</td>
                    <td>{{ $item->jumlah_orang }}</td>
                    <td>Rp{{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada reservasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
