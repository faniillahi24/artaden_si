@extends('layouts.admin')
@section('content')
<h2>Tambah Fasilitas</h2>
<form method="POST" action="{{ route('fasilitas.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Tipe Fasilitas</label>
        <select name="tipe_fasilitas" class="form-control">
            <option value="umum">Umum</option>
            <option value="sewa">Sewa</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Harga (Jika Sewa)</label>
        <input type="number" name="harga" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection