<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'  => 'nullable|string|max:100',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // simpan file
        $path = $request->file('gambar')->store('galeri', 'public');
        $data['gambar'] = $path;                     // contoh: galeri/namafile.jpg

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')
               ->with('success','Gambar galeri ditambahkan.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/'.$galeri->gambar);
        $galeri->delete();

        return back()->with('success','Gambar dihapus.');
    }
    
}
