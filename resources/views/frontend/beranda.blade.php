@extends('layouts.app')

@section('content')

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow-x: hidden;
}

.hero-section {
    background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.4)), url('{{ asset('storage/walpaper.jpg') }}') center center / cover no-repeat;
    color: white;
    min-height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-content {
    position: relative;
    z-index: 10;
    max-width: 800px;
}

.hero-section h1 {
    font-size: 4rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    line-height: 1.2;
}

.hero-section p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.btn-hero {
    background: linear-gradient(45deg, #ff6b6b, #ffa500);
    color: white;
    border: none;
    padding: 15px 35px;
    font-size: 1.1rem;
    border-radius: 50px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(255,107,107,0.4);
    margin-right: 20px;
}

.btn-hero:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(255,107,107,0.6);
    color: white;
}

.btn-secondary {
    background: rgba(255,255,255,0.1);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
    padding: 13px 33px;
    font-size: 1.1rem;
    border-radius: 50px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-secondary:hover {
    background: rgba(255,255,255,0.2);
    color: white;
    transform: translateY(-3px);
}

.floating-cards {
    position: absolute;
    top: 50%;
    right: 100px;
    transform: translateY(-50%);
    z-index: 5;
}

.floating-card {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 15px;
    margin: 20px 0;
    width: 200px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    animation: float 6s ease-in-out infinite;
}

.floating-card:nth-child(2) {
    animation-delay: -2s;
    margin-left: 40px;
}

.floating-card:nth-child(3) {
    animation-delay: -4s;
    margin-left: 20px;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.floating-card img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.floating-card h6 {
    color: #333;
    font-weight: 600;
    margin: 0;
    font-size: 0.9rem;
}

.info-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 100px 0;
    color: white;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 40px;
    margin-top: 60px;
}

.info-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    transition: all 0.3s ease;
}

.info-card:hover {
    transform: translateY(-10px);
    background: rgba(255,255,255,0.15);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.info-card i {
    font-size: 3rem;
    margin-bottom: 20px;
    color: #ffa500;
}

.info-card h5 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-weight: 600;
}

.section-title {
    font-size: 3rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 20px;
}

.section-subtitle {
    text-align: center;
    opacity: 0.8;
    font-size: 1.1rem;
    margin-bottom: 40px;
}

.stats-section {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    padding: 100px 0;
    color: white;
    position: relative;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-top: 60px;
}

.stats-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    transition: all 0.3s ease;
}

.stats-card:hover {
    transform: scale(1.05);
    background: rgba(255,255,255,0.15);
}

.stats-card i {
    font-size: 3rem;
    margin-bottom: 20px;
}

.stats-card h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 10px 0;
}

.gallery-section {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    padding: 100px 0;
    color: white;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 60px;
}

.gallery-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.gallery-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card:hover img {
    transform: scale(1.1);
}

.gallery-card .card-body {
    padding: 20px;
    text-align: center;
}

.testimonial-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 100px 0;
    color: white;
}

.testimonial-container {
    display: flex;
    gap: 30px;
    overflow-x: auto;
    padding: 20px 0;
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.3) transparent;
}

.testimonial-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    padding: 30px;
    min-width: 300px;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    background: rgba(255,255,255,0.15);
}

.about-section {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    padding: 100px 0;
    color: white;
}

.about-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-top: 60px;
}

.about-text h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 30px;
}

.about-text p {
    font-size: 1.1rem;
    line-height: 1.8;
    opacity: 0.9;
    margin-bottom: 20px;
}

.about-features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 40px;
}

.about-feature {
    text-align: center;
    padding: 20px;
    background: rgba(255,255,255,0.1);
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.about-feature i {
    font-size: 2rem;
    color: #ffa500;
    margin-bottom: 15px;
}

.about-video {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.about-video img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.play-button {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255,255,255,0.9);
    border: none;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #333;
    cursor: pointer;
    transition: all 0.3s ease;
}

.play-button:hover {
    background: white;
    transform: translate(-50%, -50%) scale(1.1);
}

.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 100px 0;
    color: white;
    text-align: center;
}

.cta-content h2 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 40px;
}

@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 2.5rem;
    }
    
    .floating-cards {
        display: none;
    }
    
    .about-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .info-grid,
    .stats-grid,
    .gallery-grid {
        grid-template-columns: 1fr;
    }
    
    .about-features {
        grid-template-columns: 1fr;
    }
    
    .section-title {
        font-size: 2rem;
    }
}
</style>

<!-- Hero -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Selamat Datang di Wisata Kesehatan Pemandian Air Panas</h1>
            <p>Rasakan ketenangan, kesehatan, dan kehangatan alami dari alam! Nikmati pengalaman relaksasi terbaik dengan air panas alami yang menyegarkan tubuh dan pikiran.</p>
            <a href="/reservasi" class="btn-hero">Reservasi Sekarang</a>
            <a href="/fasilitas" class="btn-secondary">Lihat Fasilitas</a>
        </div>
    </div>
    
    <div class="floating-cards">
        @if(isset($galeri) && count($galeri) > 0)
            @foreach($galeri->take(3) as $index => $item)
                <div class="floating-card">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Galeri">
                    <h6>{{ $item->judul }}</h6>
                </div>
            @endforeach
        @else
            <div class="floating-card">
                <img src="{{ asset('storage/default-image.jpg') }}" alt="Pemandian Air Panas">
                <h6>Kolam Air Panas</h6>
            </div>
            <div class="floating-card">
                <img src="{{ asset('storage/default-image2.jpg') }}" alt="Fasilitas">
                <h6>Fasilitas Modern</h6>
            </div>
            <div class="floating-card">
                <img src="{{ asset('storage/default-image3.jpg') }}" alt="Pemandangan">
                <h6>Pemandangan Indah</h6>
            </div>
        @endif
    </div>
</section>

<!-- Info -->
<section class="info-section">
    <div class="container">
        <h2 class="section-title">Informasi Umum</h2>
        <p class="section-subtitle">Semua yang perlu Anda ketahui tentang wisata kami</p>
        
        <div class="info-grid">
            @php
                $infos = [
                    ['icon' => 'clock', 'title' => 'Jam Operasional', 'desc' => ['05.00 - 23.00 WIB', 'Libur Nasional: Buka']],
                    ['icon' => 'map-marker-alt', 'title' => 'Lokasi', 'desc' => ['Jl. Jambu Aia Angek, Jorong, Nagari Koto Sani, Kec. X Koto Singkarak, Kabupaten Solok, Sumatera Barat']],
                    ['icon' => 'ticket-alt', 'title' => 'Harga Tiket', 'desc' => ['Mulai dari Rp 10.000']],
                ];
            @endphp
            @foreach ($infos as $info)
                <div class="info-card">
                    <i class="fas fa-{{ $info['icon'] }}"></i>
                    <h5>{{ $info['title'] }}</h5>
                    @foreach ($info['desc'] as $line)
                        <p>{{ $line }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistik -->
<section class="stats-section">
    <div class="container">
        <h2 class="section-title">Statistik Pengunjung</h2>
        <p class="section-subtitle">Kepercayaan ribuan pengunjung yang puas</p>
        
        <div class="stats-grid">
            <div class="stats-card">
                <i class="fas fa-file-alt" style="color: #ffa500;"></i>
                <h5>Total Reservasi</h5>
                <h2>{{ $jumlahReservasi }}</h2>
            </div>
            <div class="stats-card">
                <i class="fas fa-user-check" style="color: #2ecc71;"></i>
                <h5>Pengunjung Hari Ini</h5>
                <h2>{{ $pengunjungHariIni }}</h2>
            </div>
            <div class="stats-card">
                <i class="fas fa-campground" style="color: #e74c3c;"></i>
                <h5>Tenda Disewa</h5>
                <h2>{{ $tendaDisewa }}</h2>
            </div>
        </div>
    </div>
</section>

<!-- Galeri -->
<section class="gallery-section">
    <div class="container">
        <h2 class="section-title">Galeri Aia Angek</h2>
        <p class="section-subtitle">Lihat keindahan dan fasilitas yang tersedia</p>
        
        <div class="gallery-grid">
            @forelse($galeri as $item)
                <div class="gallery-card">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Galeri">
                    <div class="card-body">
                        <h6>{{ $item->judul }}</h6>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada foto galeri tersedia.</p>
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('galeri.lengkap') }}" class="btn-hero">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">Apa Kata Pengunjung?</h2>
        <p class="section-subtitle">Testimonial dari para pengunjung yang puas</p>
        
        <div class="testimonial-container">
            @foreach ($testimonis as $t)
                <div class="testimonial-card">
                    <p><i class="fas fa-quote-left" style="color: #ffa500; margin-right: 10px;"></i>{{ $t->pesan }}</p>
                    <div class="d-flex align-items-center mt-3">
                        <img src="{{ asset('storage/' . ($t->foto ?? 'testimoni/image.png')) }}" 
                             style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; margin-right: 15px;">
                        <div>
                            <strong>{{ $t->nama }}</strong><br>
                            <small style="opacity: 0.8;">Pengunjung</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h3>Tentang Kami</h3>
                <p>Kami adalah destinasi wisata kesehatan yang menawarkan pengalaman relaksasi terbaik dengan air panas alami. Terletak di lokasi yang strategis dan mudah diakses.</p>
                <p>Dengan fasilitas modern dan pelayanan terbaik, kami berkomitmen memberikan pengalaman yang tak terlupakan untuk setiap pengunjung.</p>
                
                <div class="about-features">
                    <div class="about-feature">
                        <i class="fas fa-shield-alt"></i>
                        <h6>Keamanan</h6>
                        <p>Terjamin aman</p>
                    </div>
                    <div class="about-feature">
                        <i class="fas fa-headset"></i>
                        <h6>Pelayanan</h6>
                        <p>24/7 Support</p>
                    </div>
                    <div class="about-feature">
                        <i class="fas fa-gem"></i>
                        <h6>Kualitas</h6>
                        <p>Terbaik</p>
                    </div>
                </div>
            </div>
            
            <div class="about-video">
                <img src="{{ asset('storage/walpaper.jpg') }}" alt="Video Thumbnail">
                
                    <i class="fas fa-play"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Siap untuk Pengalaman yang Menyenangkan?</h2>
            <p>Reservasi sekarang dan nikmati pengalaman terbaik di Aia Angek Pabel</p>
            <a href="/reservasi" class="btn-hero">Reservasi Online</a>
        </div>
    </div>
</section>

@endsection