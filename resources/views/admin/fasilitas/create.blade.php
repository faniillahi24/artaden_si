@extends('layouts.admin')

@section('content')
<h2>Tambah Fasilitas</h2>

{{-- Tampilkan error validasi jika ada --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form Tambah Fasilitas --}}
<form method="POST" action="{{ route('admin.fasilitas.store') }}" enctype="multipart/form-data">
@csrf

    <div class="form-group">
        <label for="nama_fasilitas">Nama Fasilitas</label>
        <input type="text" name="nama_fasilitas" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="tipe_fasilitas">Tipe Fasilitas</label>
        <select name="tipe_fasilitas" class="form-control" required>
            <option value="">-- Pilih Tipe --</option>
            <option value="umum">Umum</option>
            <option value="sewa">Sewa</option>
        </select>
    </div>

    <div class="form-group">
        <label for="harga">Harga (Hanya untuk tipe sewa)</label>
        <input type="number" name="harga" class="form-control">
    </div>

    {{-- Optional: Upload foto jika ingin ditambahkan --}}
    <div class="mb-3">
    <label class="form-label">Foto Fasilitas</label>
    <input type="file" name="foto" class="form-control">
</div>


    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
