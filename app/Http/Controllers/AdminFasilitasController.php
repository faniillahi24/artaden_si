<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaniFasilitas;
use App\Http\Controllers\Controller;

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
        $request->validate([
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
            'tipe_fasilitas' => 'required',
            'harga' => 'nullable|integer'
        ]);

        FaniFasilitas::create($request->all());
        return redirect('/admin/fasilitas')->with('success', 'Fasilitas berhasil ditambahkan.');
 
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
        $fasilitas = FaniFasilitas::findOrFail($id);
        $fasilitas->update($request->all());
        return redirect('/admin/fasilitas')->with('success', 'Fasilitas berhasil diperbarui.');
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
