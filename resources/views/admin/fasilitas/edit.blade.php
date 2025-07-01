@extends('layouts.admin')
@section('content')
<h2>Edit Fasilitas</h2>
<form method="POST" 
action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" 
enctype="multipart/form-data">   {{-- ← wajib --}}
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

    <!-- Foto -->
    <div class="form-group">
        <label for="foto">Foto Fasilitas</label>
        <input type="file" name="foto" class="form-control">

        @if ($fasilitas->foto)
            <div class="mt-2">
                <img src="{{ asset('storage/fasilitas/' . $fasilitas->foto) }}" width="150" class="mt-2">
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection
