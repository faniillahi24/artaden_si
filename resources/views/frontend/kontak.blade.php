@extends('layouts.app') {{-- Pastikan layout utama Anda --}}
@section('content')

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient bg-primary text-white text-center rounded-top-4">
          <h4 class="mb-0">💬 Berikan Testimoni Anda</h4>
        </div>

        <div class="card-body px-4 py-5">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
              <label class="form-label fw-semibold">👤 Nama <span class="text-danger">*</span></label>
              <input type="text" name="nama" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">🏙️ Kota</label>
              <input type="text" name="kota" class="form-control rounded-3" placeholder="Kota asal">
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">📝 Pesan <span class="text-danger">*</span></label>
              <textarea name="pesan" rows="4" class="form-control rounded-3" placeholder="Tulis pengalaman Anda..." required></textarea>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">📷 Foto (Opsional)</label>
              <input type="file" name="foto" class="form-control rounded-3">
              <small class="text-muted d-block mt-1">Upload foto profil atau wajah Anda (jika ada)</small>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-primary btn-lg px-4 rounded-pill shadow-sm">
                <i class="fas fa-paper-plane me-1"></i> Kirim Testimoni
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection