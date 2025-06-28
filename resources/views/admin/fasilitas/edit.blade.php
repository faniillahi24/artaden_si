@extends('layouts.admin')
@section('content')
<h2>Edit Fasilitas</h2>
<form method="POST" action="{{ route('admin.fasilitas.update', $fasilitas->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" class="form-control" value="{{ $fasilitas->nama_fasilitas }}" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $fasilitas->deskripsi }}</textarea>
    </div>
    <div class="mb-3">
        <label>Tipe Fasilitas</label>
        <select name="tipe_fasilitas" class="form-control">
            <option value="umum" {{ $fasilitas->tipe_fasilitas == 'umum' ? 'selected' : '' }}>Umum</option>
            <option value="sewa" {{ $fasilitas->tipe_fasilitas == 'sewa' ? 'selected' : '' }}>Sewa</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $fasilitas->harga }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
