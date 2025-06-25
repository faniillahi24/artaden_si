<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniReservasi;
use App\Models\Fasilitas; // Tambahkan jika menggunakan fasilitas
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; // Untuk manipulasi tanggal

class ReservasiController extends Controller
{
    /**
     * Menampilkan form reservasi
     */
    public function create()
    {
        // Jika perlu menampilkan daftar fasilitas
        $fasilitas = Fasilitas::where('status', 'tersedia')->get();
        
        return view('reservasi', [
            'fasilitas' => $fasilitas,
            'min_date' => Carbon::today()->format('Y-m-d') // Untuk validasi HTML5
        ]);
    }

    /**
     * Menyimpan data reservasi
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengunjung' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'no_hp' => 'required|string|max:20|regex:/^[0-9]+$/',
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'jumlah_orang' => 'required|integer|min:1|max:20',
            'fasilitas' => 'nullable|array',
            'fasilitas.*' => 'exists:fasilitas,id',
            'catatan' => 'nullable|string|max:500'
        ]);

        // Hitung total biaya jika belum dihitung di frontend
        $totalBiaya = $this->hitungTotalBiaya($request->fasilitas, $request->jumlah_orang);

        $reservasi = FaniReservasi::create([
            'nama_pengunjung' => $validated['nama_pengunjung'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'jumlah_orang' => $validated['jumlah_orang'],
            'total_biaya' => $totalBiaya,
            'catatan' => $validated['catatan'] ?? null,
            'status' => 'pending',
        ]);

        // Jika ada fasilitas, simpan ke tabel pivot
        if (!empty($validated['fasilitas'])) {
            $reservasi->fasilitas()->attach($validated['fasilitas']);
        }

        // Kirim email notifikasi
        // $this->kirimEmailKonfirmasi($reservasi);

        return redirect()->route('reservasi.status', ['id' => $reservasi->id])
            ->with('success', 'Reservasi berhasil dibuat. ID Reservasi Anda: ' . $reservasi->id);
    }

    /**
     * Menampilkan form cek status
     */
    public function checkStatusForm()
    {
        return view('cek-status');
    }

    /**
     * Mengecek status reservasi
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:100'
        ]);

        $search = $request->input('search');
        
        $reservasi = FaniReservasi::with('fasilitas')
            ->where('id', $search)
            ->orWhere('email', $search)
            ->orWhere('no_hp', $search)
            ->first();

        if (!$reservasi) {
            return back()->with('error', 'Reservasi tidak ditemukan. Silakan cek kembali ID/email/nomor HP Anda.');
        }

        return view('cek-status-result', [
            'reservasi' => $reservasi,
            'search' => $search
        ]);
    }

    /**
     * Menampilkan detail reservasi
     */
    public function show($id)
    {
        $reservasi = FaniReservasi::with('fasilitas')->findOrFail($id);
        return view('reservasi-detail', compact('reservasi'));
    }

    /**
     * Helper function untuk menghitung total biaya
     */
    private function hitungTotalBiaya($fasilitasIds, $jumlahOrang)
    {
        if (empty($fasilitasIds)) {
            return 0;
        }

        $total = Fasilitas::whereIn('id', $fasilitasIds)
            ->sum('harga');

        return $total * $jumlahOrang;
    }

    /**
     * Helper function untuk mengirim email konfirmasi
     */
    private function kirimEmailKonfirmasi($reservasi)
    {
        // Implementasi pengiriman email
        // Mail::to($reservasi->email)->send(new ReservasiConfirmation($reservasi));
    }
}