<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
 // Tambahkan jika menggunakan fasilitas
use App\Models\FaniReservasi;
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
        $fasilitas = FaniFasilitas::all();
        
        return view('frontend.reservasi', [
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
        'email' => 'required|email',
        'no_hp' => 'required|string',
        'tanggal_kunjungan' => 'required|date|after_or_equal:today',
        'jumlah_orang' => 'required|integer|min:1',
        'fasilitas' => 'nullable|array',
        'fasilitas.*' => 'exists:fani_fasilitas,id',
        'jumlah_fasilitas' => 'nullable|array',
         'metode_pembayaran' => 'required|in:Manual Transfer,Bayar di Lokasi',
         'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $bukti = null;

    // Jika metode pembayaran manual & ada file bukti
    if ($request->metode_pembayaran === 'Manual Transfer' && $request->hasFile('bukti_transfer')) {
        $bukti = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
    }

    // Simpan data reservasi dulu
    $reservasi = FaniReservasi::create([
        'nama_pengunjung' => $validated['nama_pengunjung'],
        'email' => $validated['email'],
        'no_hp' => $validated['no_hp'],
        'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
        'jumlah_orang' => $validated['jumlah_orang'],
        'catatan' => $request->catatan,
        'status' => 'pending',
        'total_biaya' => 0, // akan dihitung di bawah
        'metode_pembayaran' => $validated['metode_pembayaran'],
        'bukti_transfer' => $bukti,
    ]);

    $totalBiaya = $reservasi->jumlah_orang * 10000;

    // Simpan fasilitas jika ada
    if (!empty($request->fasilitas)) {
        foreach ($request->fasilitas as $fasilitasId) {
            $jumlah = $request->jumlah_fasilitas[$fasilitasId] ?? 1;
            $fasilitas = FaniFasilitas::find($fasilitasId);

            $subtotal = $fasilitas->harga * $jumlah;
            $totalBiaya += $subtotal;

            $reservasi->fasilitas()->attach($fasilitasId, [
                'jumlah' => $jumlah,
                'subtotal' => $subtotal,
            ]);
        }
    }

    // Update total biaya
    $reservasi->update([
        'total_biaya' => $totalBiaya,
    ]);

    return redirect()->route('reservasi.status', ['id' => $reservasi->id])
        ->with('success', 'Reservasi berhasil dikirim.');
}

    /**
     * Menampilkan form cek status
     */
    public function checkStatusForm()
    {
        return view('frontend.cek_status');
    }

    /**
     * Mengecek status reservasi
     */
    public function checkStatus(Request $request)
    {
         $search = $request->input('search');

    // Cari berdasarkan email atau no_hp
    $reservasi = FaniReservasi::with('fasilitas')
        ->where('email', $search)
        ->orWhere('no_hp', $search)
        ->latest()
        ->first();

    return view('frontend.cek_status', compact('reservasi'));
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
        $tarifDasar = 25000;

    $totalFasilitas = 0;
    if (!empty($fasilitasIds)) {
        $totalFasilitas = FaniFasilitas::whereIn('id', $fasilitasIds)->sum('harga');
    }

    return ($tarifDasar + $totalFasilitas) * $jumlahOrang;
    }

    /**
     * Helper function untuk mengirim email konfirmasi
     */
    private function kirimEmailKonfirmasi($reservasi)
    {
        // Implementasi pengiriman email
        // Mail::to($reservasi->email)->send(new ReservasiConfirmation($reservasi));
    }

    public function cetakTiket($id)
{
    $reservasi = FaniReservasi::with('fasilitas')->findOrFail($id);

    if ($reservasi->status !== 'disetujui') {
        return redirect()->back()->with('error', 'Tiket hanya bisa dicetak jika sudah dikonfirmasi.');
    }

    return view('frontend.tiket', compact('reservasi'));
}

}