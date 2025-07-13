@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="hero-section">
  <div class="container">
    <h1 class="display-3 fw-bold">Selamat Datang di Wisata Kesehatan Pemandian Air Panas</h1>
    <p class="lead mb-4">Rasakan ketenangan, kesehatan, dan kehangatan alami dari alam!
Nikmati pengalaman relaksasi terbaik dengan air panas alami yang menyegarkan tubuh dan pikiran.</p>
    <a href="/reservasi" class="btn-primary">Reservasi Sekarang</a>
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

<!-- Statistik Pengunjung -->
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Statistik Pengunjung</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="bg-light rounded p-4 shadow-sm">
          <i class="fas fa-file-alt fa-2x text-primary mb-2"></i>
          <h5>Total Reservasi</h5>
          <h3>{{ $jumlahReservasi }}</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-light rounded p-4 shadow-sm">
          <i class="fas fa-user-check fa-2x text-success mb-2"></i>
          <h5>Pengunjung Hari Ini</h5>
          <h3>{{ $pengunjungHariIni }}</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="bg-light rounded p-4 shadow-sm">
          <i class="fas fa-campground fa-2x text-warning mb-2"></i>
          <h5>Tenda Disewa</h5>
          <h3>{{ $tendaDisewa }}</h3>
        </div>
      </div>
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
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Apa Kata Pengunjung?</h2>

    <div class="d-flex overflow-auto gap-3 pb-2 px-1">
      @foreach ($testimonis as $t)
        <div class="card flex-shrink-0 shadow-sm border-0" style="width: 300px; min-width: 300px;">
          <div class="card-body">
            <p class="fst-italic"><i class="fas fa-quote-left text-primary me-2"></i>{{ $t->pesan }}</p>
            <div class="d-flex align-items-center mt-3">
              <img src="{{ asset('storage/' . ($t->foto ?? 'testimoni/image.png')) }}" class="rounded-circle me-3" width="50" height="50" style="object-fit: cover;">
              <div>
                <strong>{{ $t->nama }}</strong><br>
                <small class="text-muted">Pengunjung</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

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