@extends('layouts.app')

@section('title', 'Cek Status Reservasi - Pemandian Air Panas Artaden')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative">
    <div class="container-fluid px-0">
        <div class="hero-image" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; height: 60vh;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 text-white text-center text-lg-start">
                        <h1 class="display-3 fw-bold mb-4">Cek Status Reservasi</h1>
                        <p class="lead mb-5">Masukkan email atau nomor handphone yang digunakan saat reservasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Check Status Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h2 class="h3 fw-bold mb-4 text-center">Cek Status Reservasi Anda</h2>
                        
                        <form method="GET" action="{{ route('reservasi.status') }}">
                            <div class="row g-3">
                                <!-- Email atau Nomor HP -->
                                <div class="col-md-12">
                                    <label for="search" class="form-label">Email atau Nomor Handphone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="search" name="search" required>
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Cek Status</button>
                                </div>
                            </div>
                        </form>
                        
                        @if(isset($reservasi))
                            <div class="mt-5">
                                <h3 class="h4 fw-bold mb-4">Detail Reservasi</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th width="30%">ID Reservasi</th>
                                                <td>{{ $reservasi->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pengunjung</th>
                                                <td>{{ $reservasi->nama_pengunjung }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $reservasi->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Handphone</th>
                                                <td>{{ $reservasi->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Kunjungan</th>
                                                <td>{{ \Carbon\Carbon::parse($reservasi->tanggal_kunjungan)->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Orang</th>
                                                <td>{{ $reservasi->jumlah_orang }} orang</td>
                                            </tr>
                                            <tr>
                                                <th>Total Biaya</th>
                                                <td>Rp {{ number_format($reservasi->total_biaya, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    @if($reservasi->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                                    @elseif($reservasi->status == 'confirmed')
                                                        <span class="badge bg-success">Terkonfirmasi</span>
                                                    @elseif($reservasi->status == 'canceled')
                                                        <span class="badge bg-danger">Dibatalkan</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $reservasi->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if($reservasi->status == 'pending')
                                    <div class="alert alert-info mt-4">
                                        <p class="mb-0">Reservasi Anda sedang dalam proses verifikasi. Silakan tunggu konfirmasi melalui email atau WhatsApp.</p>
                                    </div>
                                @endif
                            </div>
                        @elseif(request()->has('search'))
                            <div class="alert alert-warning mt-4">
                                <p class="mb-0">Tidak ditemukan reservasi dengan email/nomor handphone tersebut.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        margin-top: -56px;
    }
    
    .card {
        border-radius: 15px;
    }
    
    .table th {
        background-color: #f8f9fa;
    }
    
    .badge {
        font-size: 0.9rem;
        padding: 0.5em 0.75em;
    }
</style>
@endsection