@extends('layouts.admin')

@section('content')
<div class="container" style="max-width:500px;">
  <h2 class="mb-3">Edit Galeri</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <form action="{{ route('admin.galeri.update', $galeri->id) }}"
        method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
      <label class="form-label">Judul (opsional)</label>
      <input type="text" name="judul" class="form-control"
             value="{{ old('judul', $galeri->judul) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Ganti Gambar (biarkan kosong bila tidak ganti)</label>
      <input type="file" name="gambar" class="form-control">
      <small class="text-muted">Gambar sekarang:</small><br>
      <img src="{{ asset('storage/'.$galeri->gambar) }}" class="rounded mt-2"
           style="max-width:150px; height:auto;">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection