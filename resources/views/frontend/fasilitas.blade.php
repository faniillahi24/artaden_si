@extends('layouts.app')

@section('title', 'Fasilitas - Pemandian Air Panas Artaden')

@section('content')
<style>
    /* Fasilitas Section */
    .hero-header {
        padding: 5rem 0;
        background: linear-gradient(135deg, rgba(26, 32, 44, 0.95), rgba(44, 82, 130, 0.95)), 
                    url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: white;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        position: relative;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .section-title:after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #f6ad55;
        margin: 0.5rem auto 0;
    }
    
    .section-subtitle {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.9);
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* Facility Card */
    .facility-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
    }
    
    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .facility-image {
        transition: transform 0.3s ease;
    }
    
    .facility-card:hover .facility-image {
        transform: scale(1.03);
    }
    
    .facility-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: white;
        margin: 1rem 0 0.5rem;
    }
    
    .facility-description {
        color: rgba(255,255,255,0.8);
        line-height: 1.6;
    }
    
    .icon-wrapper {
        width: 50px;
        height: 50px;
        background: rgba(246, 173, 85, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f6ad55;
    }
    
    .list-unstyled li {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        color: rgba(255,255,255,0.8);
    }
    
    .list-unstyled i {
        width: 20px;
        color: #f6ad55;
        margin-right: 0.5rem;
    }
    
    .type-badge {
        background: rgba(198, 246, 213, 0.2);
        color: #68d391;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .price-tag {
        font-weight: 600;
        color: #f6ad55;
    }
    
    /* Empty State */
    .text-muted {
        color: rgba(255,255,255,0.7) !important;
    }
    
    /* Responsive */
    @media (max-width: 767.98px) {
        .facility-card .row {
            flex-direction: column;
        }
        
        .facility-card .col-md-6 {
            width: 100%;
        }
        
        .hero-header {
            background-attachment: scroll;
            padding: 3rem 0;
        }
    }
</style>

{{-- Hero header --}}
<section class="hero-header">
    <div class="container hero-content">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Fasilitas Kami</h2>
                <p class="section-subtitle">Temukan berbagai fasilitas yang akan membuat pengalaman Anda semakin berkesan</p>
            </div>
        </div>

        {{-- Fasilitas --}}
        <div class="row g-4">
            @forelse($fasilitas as $item)
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <!-- Gambar -->
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
                                    <li><i class="fas fa-tag"></i> <span class="type-badge">{{ ucfirst($item->tipe_fasilitas) }}</span></li>
                                    <li><i class="fas fa-money-bill-wave"></i> <span class="price-tag">Rp {{ number_format($item->harga, 0, ',', '.') }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="empty-state">
                    <i class="fas fa-swimming-pool fa-3x mb-3"></i>
                    <h4>Belum ada fasilitas tersedia</h4>
                    <p>Kami sedang mempersiapkan fasilitas terbaik untuk Anda</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection