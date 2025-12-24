<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(10);
        return view('gambar.index', compact('galeris'));
    }

    public function create()
    {
        return view('gambar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/gambar'), $fileName);
            $data['gambar'] = 'uploads/gambar/'.$fileName;
        }

        Galeri::create($data);

        return redirect()->route('gambar.index')->with('success', 'Data Gambar berhasil ditambahkan');
    }

    public function show(Galeri $galeri)
    {
        return view('gambar.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('gambar.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['judul', 'deskripsi']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
                unlink(public_path($galeri->gambar));
            }
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $request->gambar->move(public_path('uploads/gambar'), $fileName);
            $data['gambar'] = 'uploads/gambar/'.$fileName;
        }

        $galeri->update($data);

        return redirect()->route('gambar.index')->with('success', 'Data Gambar berhasil diperbarui');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && file_exists(public_path($galeri->gambar))) {
            unlink(public_path($galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('gambar.index')->with('success', 'Data Gambar berhasil dihapus');
    }
}
