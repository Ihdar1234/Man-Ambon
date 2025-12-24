<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(5);
        return view('artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
            'penulis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis']);

        // upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/artikel'), $fileName);
            $data['gambar'] = 'uploads/artikel/'.$fileName;
        }

        // slug & user_id otomatis dari Model boot()
        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat');
    }



    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }



    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required',
            'penulis' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'penulis']);

        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
                unlink(public_path($artikel->gambar));
            }

            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/artikel'), $fileName);
            $data['gambar'] = 'uploads/artikel/'.$fileName;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }



    public function destroy(Artikel $artikel)
    {
        // hapus gambar lama
        if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
            unlink(public_path($artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
