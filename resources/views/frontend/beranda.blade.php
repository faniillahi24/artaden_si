@extends('layouts.app')
@section('content')
<h1>Selamat Datang di Pemandian Air Panas Artaden</h1>
<p>Informasi umum, jam buka, dan galeri.</p>
@endsection

// === CONTOH: resources/views/frontend/reservasi.blade.php ===
@extends('layouts.app')
@section('content')
<form action="/reservasi" method="POST">
    @csrf
    <input type="text" name="nama_pengunjung" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="no_hp" placeholder="No HP" required>
    <input type="date" name="tanggal_kunjungan" required>
    <input type="number" name="jumlah_orang" placeholder="Jumlah Orang" required>

    <h4>Sewa Fasilitas</h4>
    @foreach($fasilitas as $f)
        <input type="checkbox" name="fasilitas[]" value="{{ $f->id }}"> {{ $f->nama_fasilitas }} (Rp{{ $f->harga }})
        <input type="number" name="jumlah_fasilitas[]" placeholder="Jumlah" min="1">
    @endforeach

    <button type="submit">Kirim</button>
</form>
@endsection
