@extends('layouts.app')

@section('title', 'Cek Status Reservasi - Pemandian Air Panas Artaden')

@section('content')
<style>
    body {
        background: #0f172a;
        color: #fff;
    }

    .hero-section {
        background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.7)),
                    url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
    }

    .card {
        background: rgba(30, 41, 59, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        color: #fff;
    }

    .form-label, .form-control, .table-custom th, .table-custom td, p, h2, h5,  .alert {
        color: #fff;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .btn-primary {
        background: #4f46e5;
        border: none;
        padding: 10px 24px;
        font-weight: 500;
        color: #fff;
    }

    .btn-primary:hover {
        background: #4338ca;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 500;
        color: #fff;
    }

    .badge-pending {
        background: #f59e0b;
    }

    .badge-disetujui,
    .badge-confirmed {
        background: #10b981;
    }

    .badge-canceled {
        background: #ef4444;
    }

    .total-box {
        background: rgba(15, 23, 42, 0.6);
        border-radius: 10px;
        padding: 20px;
        color: #fff;
    }

    .table-custom {
        width: 100%;
        border-collapse: collapse;
        color: #fff;
    }

    .table-custom th, .table-custom td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .table-custom th {
        font-weight: 600;
    }

    .alert-warning {
        background-color: rgba(255, 193, 7, 0.2);
        border: 1px solid rgba(255, 193, 7, 0.4);
        color: #fff;
    }
</style>


<!-- Hero Section -->
<section class="hero-section text-center text-white">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3">Cek Status Reservasi</h1>
        <p class="lead">Masukkan email atau nomor handphone yang Anda gunakan saat reservasi</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Search Form -->
                <div class="card p-4 mb-4">
                    <h2 class="text-center mb-4">Cari Reservasi Anda</h2>
                    <form method="GET" action="{{ route('reservasi.status') }}">
                        <div class="mb-3">
                            <label class="form-label">Email / Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="search" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cari Reservasi</button>
                    </form>
                </div>

                @if(isset($reservasi))
                <!-- Reservation Details -->
                <div class="card p-4">
                    <h2 class="mb-4">Detail Reservasi</h2>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h5 class="fw-semibold mb-3">Informasi Pengunjung</h5>
                            <p><strong>ID:</strong> {{ $reservasi->id }}</p>
                            <p><strong>Nama:</strong> {{ $reservasi->nama_pengunjung }}</p>
                            <p><strong>Email:</strong> {{ $reservasi->email }}</p>
                            <p><strong>No. HP:</strong> {{ $reservasi->no_hp }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-semibold mb-3">Detail Kunjungan</h5>
                            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($reservasi->tanggal_kunjungan)->format('d F Y') }}</p>
                            <p><strong>Jumlah Orang:</strong> {{ $reservasi->jumlah_orang }}</p>
                            <p><strong>Status:</strong> 
                                <span class="badge badge-{{ $reservasi->status }}">
                                    {{ ucfirst($reservasi->status) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    @if($reservasi->fasilitas->count())
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3">Fasilitas Tambahan</h5>
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th>Fasilitas</th>
                                    <th class="text-end">Jumlah</th>
                                    <th class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservasi->fasilitas as $f)
                                <tr>
                                    <td>{{ $f->nama_fasilitas }}</td>
                                    <td class="text-end">{{ $f->pivot->jumlah }}</td>
                                    <td class="text-end">Rp {{ number_format($f->pivot->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    <div class="total-box mb-4">
                        <h5 class="fw-semibold mb-2">Total Pembayaran</h5>
                        <p class="h4 fw-bold">Rp {{ number_format($reservasi->total_biaya, 0, ',', '.') }}</p>
                        <small">Termasuk tiket masuk dan fasilitas tambahan</small>
                    </div>

                    @if($reservasi->status === 'disetujui')
                    <div class="text-center">
                        <a href="{{ route('cetak.tiket', $reservasi->id) }}" 
                           target="_blank" 
                           class="btn btn-primary">
                           Cetak Tiket Masuk
                        </a>
                    </div>
                    @endif
                </div>
                @elseif(request()->has('search'))
                <div class="alert alert-warning text-center p-4 rounded">
                    <h4 class="fw-semibold">Reservasi Tidak Ditemukan</h4>
                    <p class="mb-0">Kami tidak dapat menemukan reservasi dengan email/nomor handphone tersebut.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection