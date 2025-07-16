@extends('layouts.admin')

@section('content')
<h2>Daftar Reservasi</h2>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Metode Pembayaran</th>
            <th>Bukti Transfer</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservasi as $r)
        <tr>
            <td>{{ $r->nama_pengunjung }}</td>
            <td>{{ $r->tanggal_kunjungan }}</td>
            <td>{{ ucfirst($r->status) }}</td>
            <td>Rp{{ number_format($r->total_biaya) }}</td>
            <td>
                @if ($r->metode_pembayaran == 'Manual Transfer')
                Transfer Bank
                @elseif ($r->metode_pembayaran == 'Bayar di Lokasi')
                Bayar di Tempat (COD)
                @else
                <span class="text-muted">Belum dipilih</span>
                @endif
            </td>

            <td>
                @if($r->bukti_transfer)
                    <a href="{{ asset('storage/' . $r->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Lihat</a>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.reservasi.show', $r->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('admin.reservasi.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form method="POST" action="{{ route('admin.reservasi.destroy', $r->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus reservasi ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
