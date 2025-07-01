@extends('layouts.app')

@section('title', 'Reservasi - Artaden')

@section('content')
<section class="container py-5" style="padding-top: 90px;">
    <h2 class="mb-4 text-center">Form Reservasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reservasi.store') }}" method="POST" id="form-reservasi" class="mx-auto" style="max-width: 720px;">
        @csrf

        <!-- Data Pengunjung -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-3">Data Pengunjung</h5>
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
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan" class="form-control" min="{{ $min_date }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Orang</label>
                        <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" min="1" value="1" required>
                        <small class="text-muted d-block mt-1">Tarif dasar Rp 25.000 / orang</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pilihan Fasilitas -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-3">Pilih Fasilitas Tambahan</h5>

                @forelse($fasilitas as $f)
                    <div class="border rounded p-3 mb-2">
                        <div class="form-check">
                            <input class="form-check-input fasilitas-check" type="checkbox" id="fasilitas{{ $f->id }}" name="fasilitas[]" value="{{ $f->id }}" data-harga="{{ $f->harga }}">
                            <label class="form-check-label fw-semibold" for="fasilitas{{ $f->id }}">
                                {{ $f->nama_fasilitas }} - Rp {{ number_format($f->harga, 0, ',', '.') }} / unit
                            </label>
                        </div>
                        <div class="mt-2 ms-4" style="max-width:300px;">
                            <label class="form-label mb-1">Jumlah untuk fasilitas: <strong>{{ $f->nama_fasilitas }}</strong></label>
                            <input type="number" min="1" value="1" class="form-control jumlah-input" name="jumlah_fasilitas[{{ $f->id }}]" disabled>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada fasilitas tambahan tersedia.</p>
                @endforelse
            </div>
        </div>

        <!-- Total Biaya -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <h5 class="mb-3">Ringkasan Biaya</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <span>Total yang harus dibayar:</span>
                    <strong id="total_biaya_text">Rp 0</strong>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Kirim Reservasi</button>
        </div>
    </form>
</section>
@endsection

@push('scripts')
<script>
    const tarifDasar = 25000; // Rp per orang

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    function toggleJumlahInput(checkbox) {
        const jumlahInput = checkbox.closest('.border').querySelector('.jumlah-input');
        jumlahInput.disabled = !checkbox.checked;
    }

    function hitungTotal() {
        const jumlahOrang = parseInt(document.getElementById('jumlah_orang').value) || 0;
        let total = jumlahOrang * tarifDasar;

        document.querySelectorAll('.fasilitas-check').forEach(cb => {
            if (cb.checked) {
                const harga = parseInt(cb.dataset.harga);
                const jumlah = parseInt(cb.closest('.border').querySelector('.jumlah-input').value) || 1;
                total += harga * jumlah;
            }
        });
        document.getElementById('total_biaya_text').innerText = formatRupiah(total);
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Inisialisasi
        hitungTotal();

        // Event input jumlah orang
        document.getElementById('jumlah_orang').addEventListener('input', hitungTotal);

        // Event checkbox fasilitas + jumlah
        document.querySelectorAll('.fasilitas-check').forEach(cb => {
            cb.addEventListener('change', e => {
                toggleJumlahInput(cb);
                hitungTotal();
            });
        });

        document.querySelectorAll('.jumlah-input').forEach(inp => {
            inp.addEventListener('input', hitungTotal);
        });
    });
</script>
@endpush
