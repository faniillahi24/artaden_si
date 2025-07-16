<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniReservasi;

class AdminReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = FaniReservasi::with('fasilitas')->get();
        return view('admin.reservasi.index', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data input dari user
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'no_telp' => 'required|string|max:20',
        'fasilitas_id' => 'required|exists:fasilitas,id', // jika ada relasi
        'metode_pembayaran' => 'required|in:transfer,cod',
        // Tambahkan field lain sesuai kolom tabel FaniReservasi
    ]);

    // Set status default
    $data['status'] = 'pending';

    // Simpan ke database
    FaniReservasi::create($data);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Reservasi berhasil dikirim!');
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = FaniReservasi::with('fasilitas')->findOrFail($id);
        return view('admin.reservasi.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $reservasi = FaniReservasi::findOrFail($id);
        return view('admin.reservasi.edit', compact('reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservasi = FaniReservasi::findOrFail($id);
        $reservasi->update([
            'status' => $request->status ]);
        return redirect('/admin/reservasi')->with('success', 'Status reservasi diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FaniReservasi::destroy($id);
        return redirect('/admin/reservasi')->with('success', 'Reservasi dihapus.');
    }
}
