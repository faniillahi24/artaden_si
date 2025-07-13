<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
use App\Models\FaniReservasi;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $pengunjungHariIni = FaniReservasi::whereDate('created_at', Carbon::today())->count();
        
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
        $data = FaniReservasi::with(['fasilitas'])
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Hitung total pendapatan jika ada kolom harga
        $totalPendapatan = $data->sum('total_biaya');

        return view('admin.laporan', [
            'data' => $data,
            'totalPendapatan' => $totalPendapatan,
            'bulan' => Carbon::now()->translatedFormat('F Y') // Format bulan tahun
        ]);
    }
    public function unduhLaporan()
{
    $data = FaniReservasi::with('fasilitas')
                ->whereMonth('created_at', Carbon::now()->month)
                ->orderBy('created_at', 'desc')
                ->get();

    $totalPendapatan = $data->sum('total_biaya');

    $pdf = Pdf::loadView('admin.laporan_pdf', [
        'data' => $data,
        'totalPendapatan' => $totalPendapatan,
        'bulan' => Carbon::now()->translatedFormat('F Y')
    ]);

    return $pdf->download('laporan-reservasi-' . Carbon::now()->format('F-Y') . '.pdf');
}
}