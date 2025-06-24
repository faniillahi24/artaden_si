@extends('layouts.admin')
@section('content')
<h2>Detail Reservasi</h2>
<p><strong>Nama:</strong> {{ $data->nama_pengunjung }}</p>
<p><strong>Email:</strong> {{ $data->email }}</p>
<p><strong>No HP:</strong> {{ $data->no_hp }}</p>
<p><strong>Tanggal:</strong> {{ $data->tanggal_kunjungan }}</p>
<p><strong>Jumlah Orang:</strong> {{ $data->jumlah_orang }}</p>
<p><strong>Status:</strong> {{ ucfirst($data->status) }}</p>
<h5>Fasilitas Disewa:</h5>
<ul>
    @foreach($data->fasilitas as $f)
        <li>{{ $f->nama_fasilitas }} x {{ $f->pivot->jumlah }} = Rp{{ number_format($f->pivot->subtotal) }}</li>
    @endforeach
</ul>
<p><strong>Total Biaya:</strong> Rp{{ number_format($data->total_biaya) }}</p>
<a href="{{ route('reservasi.index') }}" class="btn btn-secondary">Kembali</a>
@endsection