@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:500px;">
  <h2 class="mb-3">Tambah Gambar Galeri</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Judul (opsional)</label>
      <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Pilih Gambar <span class="text-danger">*</span></label>
      <input type="file" name="gambar" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection