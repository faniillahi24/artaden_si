@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.95)), 
                    url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }
    .testimonial-container {
        perspective: 1000px;
    }
    .testimonial-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 18px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        transform-style: preserve-3d;
        transition: all 0.5s ease;
        border: none;
        overflow: hidden;
    }
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 45px rgba(0,0,0,0.2);
    }
    .card-header {
        background: linear-gradient(135deg, #4338ca);
        color: white;
        padding: 1.75rem;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }
    .card-header::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        transform: rotate(30deg);
    }
    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 18px;
        transition: all 0.3s;
        background-color: rgba(255,255,255,0.9);
        font-size: 1rem;
    }
    .form-control:focus {
        border-color: #4338ca;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }
    .submit-btn {
        background: linear-gradient(135deg, #4338ca);
        border: none;
        padding: 14px 36px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .submit-btn::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(to right, transparent 20%, rgba(255,255,255,0.2) 50%, transparent 80%);
        transform: rotate(30deg) translate(-20%, -50%);
        transition: all 0.5s;
    }
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    }
    .submit-btn:hover::after {
        transform: rotate(30deg) translate(100%, -50%);
    }
    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    .emoji-label {
        margin-right: 12px;
        font-size: 1.2em;
    }
    .alert-success {
        background-color: rgba(16, 185, 129, 0.15);
        border-left: 4px solid #10b981;
        color: #065f46;
        border-radius: 8px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-6 testimonial-container">
            <div class="testimonial-card mb-5">
                <div class="card-header text-center">
                    <h4 class="mb-0 fw-semibold">💬 Berikan Testimoni Anda</h4>
                    <p class="mt-2 mb-0 opacity-90">Bagikan pengalaman Anda dengan kami</p>
                </div>

                <div class="card-body p-4 p-lg-5">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-3"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">
                                <span class="emoji-label">👤</span> Nama <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama lengkap Anda" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <span class="emoji-label">🏙️</span> Kota Asal
                            </label>
                            <input type="text" name="kota" class="form-control" placeholder="Kota tempat tinggal Anda">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <span class="emoji-label">📝</span> Ulasan <span class="text-danger">*</span>
                            </label>
                            <textarea name="pesan" rows="5" class="form-control" placeholder="Ceritakan pengalaman Anda..." required></textarea>
                        </div>

                        {{-- <div class="mb-4">
                            <label class="form-label">
                                <span class="emoji-label">📷</span> Foto Profil (Opsional)
                            </label>
                            <input type="file" name="foto" class="form-control">
                            <small class="text-muted mt-2 d-block">Format: JPG/PNG (maks. 2MB)</small>
                        </div> --}}

                        <div class="text-center mt-5">
                            <button type="submit" class="btn submit-btn text-white">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Testimoni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection