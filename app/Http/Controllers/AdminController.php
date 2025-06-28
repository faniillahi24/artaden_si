<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
use App\Models\FaniReservasi;
use Carbon\Carbon; // Tambahkan ini untuk menggunakan Carbon

class AdminController extends Controller
{
    /**
     * Constructor untuk menerapkan middleware
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('admin');
    // }

    /**
     * Menampilkan dashboard admin dengan statistik
     */
    public function dashboard()
    {
        $jumlahReservasi = FaniReservasi::count();
        $pengunjungHariIni = FaniReservasi::whereDate('tanggal_kunjungan', Carbon::today())->sum('jumlah_orang');
        
        // Query untuk tenda disewa - pastikan relasi 'fasilitas' ada di model FaniReservasi
        $tendaDisewa = FaniReservasi::whereHas('fasilitas', function($query) {
            $query->where('tipe_fasilitas', 'sewa');
        })->count();

        return view('admin.dashboard', compact('jumlahReservasi', 'pengunjungHariIni', 'tendaDisewa'));
    }

    /**
     * Menampilkan laporan bulanan
     */
    public function laporan()
    {
        $data = FaniReservasi::with(['fasilitas', 'user'])
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Hitung total pendapatan jika ada kolom harga
        $totalPendapatan = $data->sum('total_harga');

        return view('admin.laporan', [
            'data' => $data,
            'totalPendapatan' => $totalPendapatan,
            'bulan' => Carbon::now()->translatedFormat('F Y') // Format bulan tahun
        ]);
    }
}