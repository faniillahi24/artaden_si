@extends('layouts.app')

@section('title', 'Fasilitas - Pemandian Air Panas Artaden')

@section('content')
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Fasilitas Kami</h2>
                <p class="lead">Temukan berbagai fasilitas yang akan membuat pengalaman Anda semakin berkesan</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($fasilitas as $item)
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <!--Gambar -->
                        <div class="col-md-6">
                <img src="{{ asset('storage/fasilitas/' . $item->foto) }}" 
                     class="img-fluid w-100 h-100 object-fit-cover" 
                     style="aspect-ratio: 4/3; object-fit: cover;" 
                     alt="{{ $item->nama_fasilitas }}">
                        </div>

                         <div class="col-md-6 d-flex flex-column">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                            <i class="fas fa-star fs-2"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">{{ $item->nama_fasilitas }}</h3>
                        <p class="mb-2">{!! nl2br(e($item->deskripsi)) !!}</p>
                    </div>

                    <ul class="list-unstyled mt-2">
                        <li><i class="fas fa-tags text-primary me-2"></i> Tipe: {{ ucfirst($item->tipe_fasilitas) }}</li>
                        <li><i class="fas fa-money-bill text-primary me-2"></i> Harga: Rp {{ number_format($item->harga, 0, ',', '.') }}</li>
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