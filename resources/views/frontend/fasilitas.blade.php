@extends('layouts.app')

@section('title', 'Fasilitas - Pemandian Air Panas Artaden')

@section('content')

{{-- Hero header --}}
<section class="hero-header">
    <div class="container hero-content">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Fasilitas Kami</h2>
                <p class="section-subtitle">Temukan berbagai fasilitas yang akan membuat pengalaman Anda semakin berkesan</p>
            </div>
        </div>

        {{-- Fasilitas  --}}
        <div class="row g-4">
            @forelse($fasilitas as $item)
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <!--Gambar -->
                        <div class="col-md-6">
                <img src="{{ asset('storage/fasilitas/' . $item->foto) }}" 
                     class="facility-image w-100 h-100" 
                     style="aspect-ratio: 4/3; object-fit: cover;" 
                     alt="{{ $item->nama_fasilitas }}">
                        </div>

                         <div class="col-md-6 d-flex flex-column">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-wrapper">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <h3 class="facility-title">{{ $item->nama_fasilitas }}</h3>
                        <p class="facility-description">{!! nl2br(e($item->deskripsi)) !!}</p>
                    </div>

                    <ul class="list-unstyled mt-2">
                        <li><i class="fas fa-tag"></i> <span class="type-badge"> {{ ucfirst($item->tipe_fasilitas) }}</span></li>
                        <li><i class="fas fa-money-bill-wafe"></i> <span class="price-tag"> Rp {{ number_format($item->harga, 0, ',', '.') }}</span></li>
                    </ul>
                </div>
            </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada fasilitas tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .hero-section {
        margin-top: -56px;
    }

    .facility-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .icon-wrapper {
        transition: all 0.3s ease;
    }

    .facility-card:hover .icon-wrapper {
        background-color: var(--primary) !important;
        color: white !important;
    }
</style>
@endsection

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas - Pemandian Air Panas Artaden</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #059669;
            --secondary: #374151;
            --accent: #f97316;
            --light-green: #ecfdf5;
            --light-orange: #fff7ed;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #f0fdfa 0%, #ffffff 50%, #fef7ed 100%);
            min-height: 100vh;
        }

        .hero-header {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.06)"/></svg>') repeat;
            animation: float 30s linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-20px) rotate(360deg); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: fadeInUp 1s ease-out;
        }

        .section-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.3s both;
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

        .facility-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .facility-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .facility-card:hover::before {
            transform: scaleX(1);
        }

        .facility-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(5, 150, 105, 0.2);
        }

        .facility-image {
            aspect-ratio: 4/3;
            object-fit: cover;
            transition: transform 0.4s ease;
            position: relative;
        }

        .facility-card:hover .facility-image {
            transform: scale(1.1);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(5, 150, 105, 0.2), rgba(249, 115, 22, 0.2));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .facility-card:hover .image-overlay {
            opacity: 1;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--light-green), rgba(5, 150, 105, 0.1));
            color: var(--primary);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .icon-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 50%;
        }

        .icon-wrapper i {
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .facility-card:hover .icon-wrapper::before {
            opacity: 1;
        }

        .facility-card:hover .icon-wrapper i {
            color: white;
        }

        .facility-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.75rem;
            transition: color 0.3s ease;
        }

        .facility-card:hover .facility-title {
            color: var(--primary);
        }

        .facility-description {
            color: #6b7280;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .facility-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .facility-info li {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: var(--secondary);
            transition: all 0.3s ease;
        }

        .facility-info li i {
            width: 20px;
            color: var(--primary);
            margin-right: 0.75rem;
            transition: transform 0.3s ease;
        }

        .facility-card:hover .facility-info li i {
            transform: scale(1.2);
        }

        .price-tag {
            background: linear-gradient(135deg, var(--accent), #ff8a00);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(249, 115, 22, 0.3);
        }

        .type-badge {
            background: linear-gradient(135deg, var(--primary), #047857);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: capitalize;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(5, 150, 105, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--primary);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Animations for scroll reveal */
        .facility-card {
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.6s ease forwards;
        }

        .facility-card:nth-child(2) { animation-delay: 0.1s; }
        .facility-card:nth-child(3) { animation-delay: 0.2s; }
        .facility-card:nth-child(4) { animation-delay: 0.3s; }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .section-title {
                font-size: 2.5rem;
            }
            
            .facility-card {
                margin-bottom: 2rem;
            }
            
            .hero-header {
                padding: 60px 0 40px;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #047857, #ea580c);
        }
    </style>
</head>