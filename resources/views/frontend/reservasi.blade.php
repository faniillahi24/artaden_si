@extends('layouts.app')

@section('title', 'Reservasi - Artaden')

@section('content')
<style>
    :root {
        --primary: #4f46e5;
        --secondary: #10b981;
        --dark: #1e293b;
        --light: #ffffff; /* Changed to pure white */
        --card-bg: rgba(30, 41, 59, 0.8);
    }
    
    body {
        background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), 
                    url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-attachment: fixed;
        color: var(--light); /* White text */
    }
    
    .reservation-container {
        max-width: 900px;
        margin: 0 auto;
    }
    
    .card {
        background: var(--card-bg);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease;
        color: white; /* White text */
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .card-header {
        background: var(--primary) !important;
        padding: 1.5rem;
        font-size: 1.25rem;
        color: white; /* White text */
    }
    
    .form-control {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: white; /* White text */
        padding: 0.75rem 1rem;
    }
    
    .form-control::placeholder {
        color: rgba(255,255,255,0.6);
    }
    
    .form-control:focus {
        background: rgba(255,255,255,0.2);
        color: white;
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
    }
    
    .btn-primary {
        background: var(--primary);
        border: none;
        padding: 1rem 2rem;
        font-size: 1.25rem;
        transition: all 0.3s ease;
        color: white; /* White text */
    }
    
    .btn-primary:hover {
        background: #4338ca;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .total-display {
        font-size: 2rem;
        color: var(--secondary);
        font-weight: 700;
    }
    
    .payment-card {
        cursor: pointer;
        transition: all 0.3s ease;
        color: white; /* White text */
    }
    
    .payment-card:hover {
        transform: scale(1.02);
    }
    
    .payment-card.selected {
        border: 2px solid var(--secondary) !important;
    }
    
    .bank-logo {
        width: 40px;
        height: 40px;
        object-fit: contain;
    }
    
    /* Additional white text elements */
    label, .form-label, .form-check-label, .alert, .text-muted {
        color: white !important;
    }
    
    .alert-info {
        background-color: rgba(16, 185, 129, 0.2);
        border-color: rgba(16, 185, 129, 0.3);
    }
    
    .alert-success {
        background-color: rgba(16, 185, 129, 0.2);
        border-color: rgba(16, 185, 129, 0.3);
    }
    
    .badge {
        color: white;
    }
</style>

<!-- Rest of your HTML content remains exactly the same -->
<section class="container py-5 reservation-container">
    <!-- All your existing HTML content -->
    <!-- ... -->
</section>

<script>
    // Your existing JavaScript
    // ...
</script>


<section class="container py-5 reservation-container">
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">FORM RESERVASI KUNJUNGAN</h2>
        <p class="lead">Silahkan isi formulir berikut untuk melakukan reservasi</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Data Pengunjung -->
        <div class="card mb-4 shadow-lg">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-user me-2"></i>DATA PENGGUNA</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_pengunjung" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor HP/WhatsApp</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan" class="form-control" min="{{ $min_date }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Orang</label>
                        <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" min="1" value="1" required>
                        <span class="text-muted">10.000/orang</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pilihan Fasilitas -->
        <div class="card mb-4 shadow-lg">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>FASILITAS TAMBAHAN</h4>
            </div>
            <div class="card-body">
                @forelse($fasilitas as $f)
                    <div class="mb-3 p-3 rounded bg-dark">
                        <div class="form-check">
                            <input class="form-check-input fasilitas-check" type="checkbox" id="fasilitas{{ $f->id }}" name="fasilitas[]" value="{{ $f->id }}" data-harga="{{ $f->harga }}">
                            <label class="form-check-label d-flex align-items-center" for="fasilitas{{ $f->id }}">
                                <span class="badge bg-primary me-2">{{ $f->nama_fasilitas }}</span>
                                <span>Rp {{ number_format($f->harga, 0, ',', '.') }}</span>
                            </label>
                        </div>
                        <div class="mt-2 ms-4">
                            <input type="number" min="1" value="1" class="form-control jumlah-input" name="jumlah_fasilitas[{{ $f->id }}]" disabled style="max-width: 150px;">
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        Tidak ada fasilitas tambahan tersedia saat ini.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Total Biaya -->
        <div class="card mb-4 shadow-lg">
            <div class="card-header bg-success">
                <h4 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i>TOTAL PEMBAYARAN</h4>
            </div>
            <div class="card-body">
                <div class="text-center py-3">
                    <span class="d-block mb-2">Total yang harus dibayar:</span>
                    <span id="total_biaya_text" class="total-display">Rp 0</span>
                </div>
            </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="card mb-4 shadow-lg">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-credit-card me-2"></i>METODE PEMBAYARAN</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card payment-card h-100 border-primary" onclick="document.getElementById('manual_transfer').click()">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="manual_transfer" value="Manual Transfer" required>
                                    <label class="form-check-label" for="manual_transfer">
                                        <span class="d-block fw-bold mb-1">TRANSFER BANK</span>
                                        <span class="text-muted">Transfer melalui bank</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card payment-card h-100 border-success" onclick="document.getElementById('bayar_dilokasi').click()">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="bayar_dilokasi" value="Bayar di Lokasi">
                                    <label class="form-check-label" for="bayar_dilokasi">
                                        <span class="d-block fw-bold mb-1">BAYAR DI LOKASI</span>
                                        <span class="text-muted">Bayar saat kedatangan</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Rekening -->
                <div id="rekening_info" class="mt-4 p-4 rounded bg-dark" style="display: none;">
                    <h5><i class="fas fa-university me-2"></i>INFORMASI REKENING</h5>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-dark">
                                <div class="d-flex align-items-center mb-2">
                                   
                                    <span class="fw-bold">Bank BCA</span>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">No. Rek: <strong>1234567890</strong></p>
                                    <p class="mb-0">a.n. <strong>PT. Artadena</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded bg-dark">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fw-bold">Bank BRI</span>
                                </div>
                                <div class="ms-4">
                                    <p class="mb-1">No. Rek: <strong>9876543210</strong></p>
                                    <p class="mb-0">a.n. <strong>PT. Artadena</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="form-label">UPLOAD BUKTI TRANSFER</label>
                        <input type="file" name="bukti_transfer" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kirim -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg px-5">
                <i class="fas fa-paper-plane me-2"></i>KIRIM RESERVASI
            </button>
        </div>
    </form>
</section>

<script>
    const tarifDasar = 10000;

    function formatRupiah(number) {
        return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function toggleJumlahInput(checkbox) {
        const jumlahInput = checkbox.closest('.bg-dark').querySelector('.jumlah-input');
        jumlahInput.disabled = !checkbox.checked;
        if (!checkbox.checked) jumlahInput.value = 1;
    }

    function hitungTotal() {
        let total = parseInt(document.getElementById('jumlah_orang').value || 0) * tarifDasar;

        document.querySelectorAll('.fasilitas-check:checked').forEach(cb => {
            const harga = parseInt(cb.dataset.harga);
            const jumlah = parseInt(cb.closest('.bg-dark').querySelector('.jumlah-input').value) || 1;
            total += harga * jumlah;
        });
        
        document.getElementById('total_biaya_text').innerText = formatRupiah(total);
    }

    document.addEventListener('DOMContentLoaded', () => {
        hitungTotal();

        // Event listeners
        document.getElementById('jumlah_orang').addEventListener('input', hitungTotal);
        
        document.querySelectorAll('.fasilitas-check').forEach(cb => {
            cb.addEventListener('change', function() {
                toggleJumlahInput(this);
                hitungTotal();
            });
        });

        document.querySelectorAll('.jumlah-input').forEach(inp => {
            inp.addEventListener('input', hitungTotal);
        });

        // Payment method toggle
        document.querySelectorAll('input[name="metode_pembayaran"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('rekening_info').style.display = 
                    this.value === 'Manual Transfer' ? 'block' : 'none';
                
                // Highlight selected card
                document.querySelectorAll('.payment-card').forEach(card => {
                    card.classList.remove('selected');
                });
                if (this.checked) {
                    this.closest('.payment-card').classList.add('selected');
                }
            });
        });
    });
</script>
@endsection