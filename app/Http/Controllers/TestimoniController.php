<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kota' => 'nullable|string|max:100',
            'pesan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $fotoPath = null;

    // Jika user upload foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $fotoName = time().'_'.$foto->getClientOriginalName();
        $foto->move(public_path('uploads/testimoni'), $fotoName);
        $fotoPath = 'uploads/testimoni/' . $fotoName;
    } else {
        // Jika tidak upload, beri default
        $fotoPath = 'testimoni/image.png'; // path ke foto default
    }

         // Simpan ke database
    Testimoni::create([
        'nama' => $request->nama,
        'kota' => $request->kota,
        'pesan' => $request->pesan,
        'foto' => $fotoPath,
    ]);

        return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda!');
    }
}
