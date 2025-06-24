<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniReservasi;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
     public function dashboard() {
        $jumlahReservasi = FaniReservasi::count();
        $pengunjungHariIni = FaniReservasi::where('tanggal_kunjungan', Carbon::today())->sum('jumlah_orang');
        $tendaDisewa = FaniReservasi::with('fasilitas')->get()->pluck('fasilitas')->flatten()->where('tipe_fasilitas', 'sewa')->count();
        return view('admin.dashboard', compact('jumlahReservasi', 'pengunjungHariIni', 'tendaDisewa'));
    }

    public function laporan() {
        $data = FaniReservasi::with('fasilitas')->whereMonth('created_at', Carbon::now()->month)->get();
        return view('admin.laporan', compact('data'));
    }
}
