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
                        <li><i class="fas fa-money-bill-wafe"></i> <span class="price-tag"> Rp {{ number_format($item->harga, 0, ',', '.') }}<</li>
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