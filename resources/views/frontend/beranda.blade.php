@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative">
    <div class="container-fluid px-0">
        <div class="hero-image" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1582738412121-7a7f726b8d13?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; height: 80vh;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 text-white text-center text-lg-start">
                        <h1 class="display-3 fw-bold mb-4">Selamat Datang di Pemandian Air Panas Artaden</h1>
                        <p class="lead mb-5">Nikmati pengalaman relaksasi alami dengan air panas mineral yang menyegarkan tubuh dan pikiran Anda.</p>
                        <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3">
                            <a href="/reservasi" class="btn btn-primary btn-lg px-4">Reservasi Sekarang</a>
                            <a href="/fasilitas" class="btn btn-outline-light btn-lg px-4">Lihat Fasilitas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Informasi Umum</h2>
                <p class="lead">Temukan semua yang perlu Anda ketahui sebelum berkunjung ke Artaden</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-4">
                            <i class="fas fa-clock fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3">Jam Operasional</h3>
                        <p class="mb-0">Setiap Hari: 08.00 - 22.00 WIB</p>
                        <p class="mb-0">Libur Nasional: Tetap Buka</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-4">
                            <i class="fas fa-map-marker-alt fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3">Lokasi</h3>
                        <p class="mb-0">Jl. Raya Artaden No. 123</p>
                        <p class="mb-0">Bandung, Jawa Barat</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-4">
                            <i class="fas fa-ticket-alt fs-2"></i>
                        </div>
                        <h3 class="h4 mb-3">Harga Tiket</h3>
                        <p class="mb-0">Mulai dari Rp 25.000/orang</p>
                        <p class="mb-0">Diskon untuk rombongan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Galeri Kami</h2>
                <p class="lead">Lihat keindahan dan fasilitas yang kami tawarkan</p>
            </div>
        </div>
        
        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="gallery-item overflow-hidden rounded-3">
                    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid w-100 h-100 object-fit-cover" alt="Kolam Air Panas" style="height: 250px; transition: transform 0.5s;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="gallery-item overflow-hidden rounded-3">
                    <img src="https://images.unsplash.com/photo-1582738411706-bfc8e691d1c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid w-100 h-100 object-fit-cover" alt="Pemandian Alam" style="height: 250px; transition: transform 0.5s;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="gallery-item overflow-hidden rounded-3">
                    <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid w-100 h-100 object-fit-cover" alt="Fasilitas Spa" style="height: 250px; transition: transform 0.5s;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="gallery-item overflow-hidden rounded-3">
                    <img src="https://images.unsplash.com/photo-1602002418816-5c0aeef426aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid w-100 h-100 object-fit-cover" alt="Restoran" style="height: 250px; transition: transform 0.5s;">
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary btn-lg">Lihat Galeri Lengkap</a>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Apa Kata Pengunjung?</h2>
                <p class="lead">Testimonial dari pengunjung yang pernah merasakan pengalaman di Artaden</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-quote-left text-primary me-3"></i>
                            <p class="mb-0">Pengalaman yang sangat menyenangkan! Air panasnya alami dan fasilitasnya sangat lengkap.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                            <div>
                                <h6 class="mb-0">Sarah Wijaya</h6>
                                <small class="text-muted">Pengunjung dari Jakarta</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-quote-left text-primary me-3"></i>
                            <p class="mb-0">Tempatnya sangat bersih dan nyaman. Cocok untuk liburan keluarga.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                            <div>
                                <h6 class="mb-0">Budi Santoso</h6>
                                <small class="text-muted">Pengunjung dari Bandung</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-quote-left text-primary me-3"></i>
                            <p class="mb-0">Pelayanannya sangat ramah dan profesional. Pasti akan kembali lagi!</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="50" height="50" alt="Testimonial">
                            <div>
                                <h6 class="mb-0">Dewi Lestari</h6>
                                <small class="text-muted">Pengunjung dari Surabaya</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-4">Siap untuk Pengalaman yang Menyenangkan?</h2>
                <p class="lead mb-5">Reservasi sekarang dan dapatkan pengalaman terbaik di Pemandian Air Panas Artaden</p>
                <a href="/reservasi" class="btn btn-light btn-lg px-5">Reservasi Online</a>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        margin-top: -56px; /* Adjust for fixed navbar */
    }
    
    .gallery-item:hover img {
        transform: scale(1.1);
    }
    
    .gallery-item {
        overflow: hidden;
        cursor: pointer;
    }
</style>

<!-- Add Font Awesome -->
<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
@endsection