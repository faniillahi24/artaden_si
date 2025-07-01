<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = FaniFasilitas::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ VALIDASI & AMBIL DATA
    $data = $request->validate([
        'nama_fasilitas'  => 'required',
        'deskripsi'       => 'required',
        'tipe_fasilitas'  => 'required|in:umum,sewa',
        'harga'           => 'nullable|integer',
        'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // ✅ SIMPAN FOTO (jika ada)
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('fasilitas', 'public'); // hasil: fasilitas/namafile.png
        $data['foto'] = basename($data['foto']); // simpan hanya nama filenya
    }

    // ✅ BUAT RECORD
    FaniFasilitas::create($data);

    return redirect()->route('admin.fasilitas.index')
           ->with('success', 'Fasilitas berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fasilitas = FaniFasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fasilitas = FaniFasilitas::findOrFail($id);           // ✅ ambil data lama

    $data = $request->validate([
        'nama_fasilitas'  => 'required',
        'deskripsi'       => 'required',
        'tipe_fasilitas'  => 'required|in:umum,sewa',
        'harga'           => 'nullable|integer',
        'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // ✅ Ganti foto kalau ada upload baru
    if ($request->hasFile('foto')) {
        if ($fasilitas->foto) {
            Storage::delete('public/fasilitas/' . $fasilitas->foto); // hapus lama
        }
        $data['foto'] = $request->file('foto')->store('fasilitas', 'public');
        $data['foto'] = basename($data['foto']);
    }

    $fasilitas->update($data);

    return redirect()->route('admin.fasilitas.index')
           ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FaniFasilitas::destroy($id);
        return redirect('/admin/fasilitas')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
