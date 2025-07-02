@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artaden - Pemandian Air Panas Alami</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --accent: #f59e0b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .hero-section {
            height: 80vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('https://images.unsplash.com/photo-1582738412121-7a7f726b8d13?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(37, 99, 235, 0.3), rgba(245, 158, 11, 0.3));
            animation: gradientShift 10s ease-in-out infinite alternate;
        }

        @keyframes gradientShift {
            0% { background: linear-gradient(45deg, rgba(37, 99, 235, 0.3), rgba(245, 158, 11, 0.3)); }
            100% { background: linear-gradient(45deg, rgba(245, 158, 11, 0.3), rgba(37, 99, 235, 0.3)); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .hero-buttons {
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-outline-light {
            border: 2px solid white;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-2px);
        }

        .info-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .info-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .gallery-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .gallery-image {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-image {
            transform: scale(1.05);
        }

        .testimonial-card {
            background: white;
            border: none;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            min-width: 300px;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .testimonial-scroll {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding: 1rem 0;
            scrollbar-width: thin;
            scrollbar-color: var(--primary) transparent;
        }

        .testimonial-scroll::-webkit-scrollbar {
            height: 8px;
        }

        .testimonial-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .testimonial-scroll::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--secondary);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        .quote-icon {
            font-size: 1.5rem;
            color: var(--accent);
            margin-right: 0.5rem;
        }

        .testimonial-author {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 3px solid var(--primary);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>


<!-- Hero -->
<section class="hero-section">
  <div class="container hero-content">
    <h1 class="display-4 fw-bold mb-3">Selamat Datang di Artadena</h1>
    <p class="lead mb-4">Nikmati relaksasi alami dengan air panas mineral yang menyegarkan tubuh dan pikiran Anda.</p>
    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
      <a href="/reservasi" class="btn btn-primary btn-lg">Reservasi Sekarang</a>
      <a href="/fasilitas" class="btn btn-outline-light btn-lg">Lihat Fasilitas</a>
    </div>
  </div>
</section>

    <!-- Informasi Umum -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Informasi Umum</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="info-card text-center">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Jam Operasional</h5>
                        <p class="mb-1">08.00 - 22.00 WIB</p>
                        <p class="mb-0 text-success">Libur Nasional: Buka</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card text-center">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Lokasi</h5>
                        <p class="mb-1">Jl. Raya Artaden No. 123</p>
                        <p class="mb-0">Bandung</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card text-center">
                        <div class="info-icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Harga Tiket</h5>
                        <p class="mb-1 text-primary fw-bold">Mulai dari Rp 25.000</p>
                        <p class="mb-0 text-success">Diskon rombongan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Galeri -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Galeri Artaden</h2>
        <div class="row g-3">
            @forelse($galeri as $item)
                <div class="col-md-4 col-lg-3">
                    <div class="gallery-card">
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
    <h2 class="section-title text-center">Apa Kata Pengunjung?</h2>

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
</section>


<!-- CTA -->
<section class="cta-section py-5 text-white text-center">
  <div class="container position-relative">
    <h2 class="fw-bold mb-3">Siap untuk Pengalaman yang Menyenangkan?</h2>
    <p class="mb-4">Reservasi sekarang dan nikmati pengalaman terbaik di Artaden</p>
    <a href="/reservasi" class="btn btn-light btn-lg">Reservasi Online</a>
  </div>
</section>

@endsection