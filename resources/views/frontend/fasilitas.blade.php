@extends('layouts.app')

@section('title', 'Fasilitas - Pemandian Air Panas Artaden')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative">
    <div class="container-fluid px-0">
        <div class="hero-image" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; height: 60vh;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 text-white text-center text-lg-start">
                        <h1 class="display-3 fw-bold mb-4">Fasilitas Artaden</h1>
                        <p class="lead mb-5">Nikmati berbagai fasilitas premium kami yang dirancang untuk kenyamanan dan kesehatan Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Fasilitas Unggulan Kami</h2>
                <p class="lead">Temukan berbagai fasilitas yang akan membuat pengalaman Anda semakin berkesan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Facility 1 -->
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid h-100 w-100 object-fit-cover" alt="Kolam Air Panas Alami">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="fas fa-water fs-2"></i>
                                </div>
                                <h3 class="h4 mb-3">Kolam Air Panas Alami</h3>
                                <p class="mb-0">Nikmati air panas alami yang kaya mineral dengan suhu 38-42°C yang baik untuk kesehatan kulit dan persendian.</p>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check text-primary me-2"></i> 5 kolam dengan variasi suhu</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Pemandangan alam yang menakjubkan</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Kapasitas terbatas untuk kenyamanan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Facility 2 -->
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid h-100 w-100 object-fit-cover" alt="Spa & Pijat">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="fas fa-spa fs-2"></i>
                                </div>
                                <h3 class="h4 mb-3">Spa & Pijat Profesional</h3>
                                <p class="mb-0">Relaksasi total dengan berbagai perawatan spa dan pijat tradisional oleh terapis berpengalaman.</p>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check text-primary me-2"></i> Pijat tradisional dan modern</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Aromaterapi pilihan</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Ruang VIP tersedia</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Facility 3 -->
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1602002418816-5c0aeef426aa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid h-100 w-100 object-fit-cover" alt="Restoran">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="fas fa-utensils fs-2"></i>
                                </div>
                                <h3 class="h4 mb-3">Restoran Sehat</h3>
                                <p class="mb-0">Hidangan sehat dengan bahan-bahan organik lokal yang menyegarkan setelah berendam air panas.</p>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check text-primary me-2"></i> Menu tradisional dan internasional</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Minuman herbal khas</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Tema makan al fresco</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Facility 4 -->
            <div class="col-lg-6">
                <div class="card facility-card h-100 border-0 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="https://images.unsplash.com/photo-1582719471386-2d1e61ccd68f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid h-100 w-100 object-fit-cover" alt="Penginapan">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3">
                                    <i class="fas fa-hotel fs-2"></i>
                                </div>
                                <h3 class="h4 mb-3">Penginapan Nyaman</h3>
                                <p class="mb-0">Menginap dengan fasilitas lengkap dan pemandangan langsung ke area pemandian air panas.</p>
                                <ul class="list-unstyled mt-3">
                                    <li><i class="fas fa-check text-primary me-2"></i> Kamar standar hingga suite</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Akses 24 jam ke kolam air panas</li>
                                    <li><i class="fas fa-check text-primary me-2"></i> Paket menginap dengan diskon</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Facilities Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 fw-bold mb-3">Fasilitas Pendukung Lainnya</h2>
                <p class="lead">Berbagai fasilitas tambahan untuk melengkapi kenyamanan Anda</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-lockers fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">Loker Penyimpanan</h3>
                        <p class="mb-0">Loker aman dengan sistem kunci elektronik untuk menyimpan barang berharga Anda.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-wheelchair fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">Akses Disabilitas</h3>
                        <p class="mb-0">Fasilitas ramah disabilitas dengan jalur khusus dan toilet khusus.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-child fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">Area Bermain Anak</h3>
                        <p class="mb-0">Zona khusus anak dengan kolam dangkal dan permainan edukatif.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-wifi fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">WiFi Gratis</h3>
                        <p class="mb-0">Akses internet cepat di seluruh area dengan bandwidth tinggi.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-parking fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">Parkir Luas</h3>
                        <p class="mb-0">Area parkir yang luas dan aman dengan penjaga 24 jam.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle p-3 d-inline-flex mb-3 mx-auto">
                            <i class="fas fa-first-aid fs-2"></i>
                        </div>
                        <h3 class="h5 mb-3">P3K & Klinik</h3>
                        <p class="mb-0">Tenaga medis standby dan klinik kecil untuk keadaan darurat.</p>
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
                <h2 class="display-5 fw-bold mb-4">Tertarik Mengalami Fasilitas Kami?</h2>
                <p class="lead mb-5">Reservasi sekarang dan dapatkan pengalaman terbaik di Pemandian Air Panas Artaden</p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="/reservasi" class="btn btn-light btn-lg px-5">Reservasi Online</a>
                    <a href="/harga" class="btn btn-outline-light btn-lg px-5">Lihat Harga</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        margin-top: -56px; /* Adjust for fixed navbar */
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