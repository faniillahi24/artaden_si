@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="text-white text-center text-lg-start d-flex align-items-center" style="height: 80vh; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1582738412121-7a7f726b8d13?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;">
  <div class="container">
    <h1 class="display-3 fw-bold">Selamat Datang di Artaden</h1>
    <p class="lead mb-4">Nikmati relaksasi alami dengan air panas mineral yang menyegarkan tubuh dan pikiran Anda.</p>
    <a href="/reservasi" class="btn btn-primary btn-lg me-2">Reservasi Sekarang</a>
    <a href="/fasilitas" class="btn btn-outline-light btn-lg">Lihat Fasilitas</a>
  </div>
</section>

<!-- Info -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Informasi Umum</h2>
    <div class="row g-4">
      @php
        $infos = [
          ['icon' => 'clock', 'title' => 'Jam Operasional', 'desc' => ['08.00 - 22.00 WIB', 'Libur Nasional: Buka']],
          ['icon' => 'map-marker-alt', 'title' => 'Lokasi', 'desc' => ['Jl. Raya Artaden No. 123', 'Bandung']],
          ['icon' => 'ticket-alt', 'title' => 'Harga Tiket', 'desc' => ['Mulai dari Rp 25.000', 'Diskon rombongan']],
        ];
      @endphp
      @foreach ($infos as $info)
        <div class="col-md-4">
          <div class="p-4 bg-white shadow-sm rounded h-100">
            <i class="fas fa-{{ $info['icon'] }} fa-2x text-primary mb-3"></i>
            <h5 class="fw-bold">{{ $info['title'] }}</h5>
            @foreach ($info['desc'] as $line)
              <p class="mb-0">{{ $line }}</p>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Galeri -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Galeri Artaden</h2>
        <div class="row g-3">
            @forelse($galeri as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm border-0">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Galeri" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h6 class="mb-0 text-truncate">{{ $item->judul }}</h6>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center">Belum ada foto galeri tersedia.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('galeri.lengkap') }}" class="btn btn-outline-primary">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Apa Kata Pengunjung?</h2>
    <div class="row g-4">
      @php
        $reviews = [
          ['name' => 'Sarah Wijaya', 'city' => 'Jakarta', 'text' => 'Air panas alami dan fasilitas lengkap.', 'img' => 'women/32.jpg'],
          ['name' => 'Budi Santoso', 'city' => 'Bandung', 'text' => 'Tempat bersih dan nyaman.', 'img' => 'men/75.jpg'],
          ['name' => 'Dewi Lestari', 'city' => 'Surabaya', 'text' => 'Pelayanan ramah dan profesional.', 'img' => 'women/68.jpg'],
        ];
      @endphp
      @foreach ($reviews as $r)
        <div class="col-md-4">
          <div class="bg-white shadow-sm p-4 h-100 rounded">
            <p><i class="fas fa-quote-left text-primary me-2"></i>{{ $r['text'] }}</p>
            <div class="d-flex align-items-center mt-3">
              <img src="https://randomuser.me/api/portraits/{{ $r['img'] }}" class="rounded-circle me-3" width="50" height="50">
              <div class="text-start">
                <strong>{{ $r['name'] }}</strong><br>
                <small class="text-muted">{{ $r['city'] }}</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-white text-center" style="background-color: var(--primary);">
  <div class="container">
    <h2 class="fw-bold mb-3">Siap untuk Pengalaman yang Menyenangkan?</h2>
    <p class="mb-4">Reservasi sekarang dan nikmati pengalaman terbaik di Artaden</p>
    <a href="/reservasi" class="btn btn-light btn-lg">Reservasi Online</a>
  </div>
</section>

@endsection