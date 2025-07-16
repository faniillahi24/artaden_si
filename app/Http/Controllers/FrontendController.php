<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
use App\Models\FaniReservasi;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function beranda() {
         $fasilitas = FaniFasilitas::where('tipe_fasilitas', 'sewa')->get();
          $galeri = Galeri::latest()->take(8)->get(); // Ambil 6 data terbaru
          $testimonis = \App\Models\Testimoni::latest()->take(4)->get(); // ambil 3 testimoni
         
          // Tambahkan statistik
    $jumlahReservasi = FaniReservasi::count();
    $pengunjungHariIni = FaniReservasi::whereDate('created_at', Carbon::today())->count();
    $tendaDisewa = FaniReservasi::whereHas('fasilitas', function ($q) {
        $q->where('nama_fasilitas', 'like', '%tenda%');
    })->count();

          return view('frontend.beranda', compact(
            'fasilitas','galeri','testimonis','jumlahReservasi',
        'pengunjungHariIni',
        'tendaDisewa'));
    }

    public function fasilitas() {
        $fasilitas = FaniFasilitas::all();
        return view('frontend.fasilitas', compact('fasilitas'));
    }

    public function harga() {
        $tiketMasuk = 15000;
        $fasilitas = FaniFasilitas::where('tipe_fasilitas', 'sewa')->get();
        return view('frontend.harga', compact('tiketMasuk', 'fasilitas'));
    }

    public function formReservasi() {
        $fasilitas = FaniFasilitas::where('tipe_fasilitas', 'sewa')->get();
        return view('frontend.reservasi', compact('fasilitas'));
    }

    public function simpanReservasi(Request $request) {
        $request->validate([
            'nama_pengunjung' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1',
        ]);

        $total = 15000 * $request->jumlah_orang;

        $reservasi = FaniReservasi::create([
            'nama_pengunjung' => $request->nama_pengunjung,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jumlah_orang' => $request->jumlah_orang,
            'total_biaya' => 0,
            'status' => 'pending',
        ]);

        if ($request->fasilitas) {
            foreach ($request->fasilitas as $i => $fasilitas_id) {
                $jumlah = $request->jumlah_fasilitas[$i];
                $fasilitas = FaniFasilitas::find($fasilitas_id);
                $subtotal = $fasilitas->harga * $jumlah;

                $reservasi->fasilitas()->attach($fasilitas_id, [
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }
        }

        $reservasi->update(['total_biaya' => $total]);
        return redirect()->route('cek_status')->with('success', 'Reservasi berhasil. Kode: ' . $reservasi->id);
    }

    public function cekStatus(Request $request) {
        $data = null;
        if ($request->kode) {
            $data = FaniReservasi::with('fasilitas')->find($request->kode);
        }
        return view('frontend.cek_status', compact('data'));
    }

    public function kontak() {
        return view('frontend.kontak');
    }

    public function kirimUlasan(Request $request) {
        // Bisa disimpan ke tabel ulasan
    }
    public function reservasi()
{
    $reservasi = FaniReservasi::all(); // Ambil semua data reservasi dari database
    return view('frontend.reservasi', compact('reservasi'));
}
public function semuaGaleri()
{
    $galeri = Galeri::latest()->paginate(12);
    return view('frontend.semua_galeri', compact('galeri'));
}

}
