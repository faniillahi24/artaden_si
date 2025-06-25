@extends('layouts.app')

@section('title', 'Reservasi Online - Pemandian Air Panas Artaden')

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative">
    <div class="container-fluid px-0">
        <div class="hero-image" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; height: 60vh;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-8 text-white text-center text-lg-start">
                        <h1 class="display-3 fw-bold mb-4">Reservasi Online</h1>
                        <p class="lead mb-5">Isi form berikut untuk melakukan reservasi kunjungan ke Pemandian Air Panas Artaden</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reservation Form Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h2 class="h3 fw-bold mb-4 text-center">Form Reservasi</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('reservasi.store') }}">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Nama Pengunjung -->
                                <div class="col-md-12">
                                    <label for="nama_pengunjung" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_pengunjung') is-invalid @enderror" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" required>
                                    @error('nama_pengunjung')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Nomor HP -->
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">Nomor Handphone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Tanggal Kunjungan -->
                                <div class="col-md-6">
                                    <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_kunjungan') is-invalid @enderror" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}" min="{{ date('Y-m-d') }}" required>
                                    @error('tanggal_kunjungan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Jumlah Orang -->
                                <div class="col-md-6">
                                    <label for="jumlah_orang" class="form-label">Jumlah Orang <span class="text-danger">*</span></label>
                                    <select class="form-select @error('jumlah_orang') is-invalid @enderror" id="jumlah_orang" name="jumlah_orang" required>
                                        <option value="" selected disabled>Pilih jumlah</option>
                                        @for($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ old('jumlah_orang') == $i ? 'selected' : '' }}>{{ $i }} orang</option>
                                        @endfor
                                        <option value="11" {{ old('jumlah_orang') == 11 ? 'selected' : '' }}>Lebih dari 10 orang (hubungi kami)</option>
                                    </select>
                                    @error('jumlah_orang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Catatan Tambahan -->
                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                                    <small class="text-muted">Kosongkan jika tidak ada</small>
                                </div>
                                
                                <!-- Total Biaya (akan dihitung otomatis) -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                        <span class="fw-bold">Perkiraan Total Biaya:</span>
                                        <span id="total-biaya" class="h5 mb-0">Rp 0</span>
                                    </div>
                                    <input type="hidden" id="total_biaya" name="total_biaya" value="0">
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Reservasi Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-muted">Sudah melakukan reservasi? <a href="/cek-status">Cek Status Reservasi</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Harga tiket per orang
    const HARGA_TIKET = 25000;
    
    // Hitung total biaya saat jumlah orang berubah
    document.getElementById('jumlah_orang').addEventListener('change', function() {
        const jumlahOrang = parseInt(this.value);
        let totalBiaya = 0;
        
        if (jumlahOrang <= 10) {
            totalBiaya = jumlahOrang * HARGA_TIKET;
        }
        
        // Format ke Rupiah
        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        
        document.getElementById('total-biaya').textContent = formatter.format(totalBiaya);
        document.getElementById('total_biaya').value = totalBiaya;
    });
</script>

<style>
    .hero-section {
        margin-top: -56px; /* Adjust for fixed navbar */
    }
    
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .form-control, .form-select {
        padding: 10px 15px;
        border-radius: 8px;
    }
    
    label {
        font-weight: 500;
    }
</style>
@endsection