<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    // Tampilkan semua Visi/Misi
    public function index()
    {
        $data = VisiMisi::latest()->paginate(6); // ambil data
        return view('visi_misi.index', compact('data')); // kirim ke Blade
    }

    // Form tambah data
    public function create()
    {
        return view('visi_misi.create'); // tidak perlu $visiMisi
    }

    // Form edit data
    public function edit(VisiMisi $visiMisi)
    {
        return view('visi_misi.edit', compact('visiMisi')); // kirim $visiMisi ke Blade
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:4096'
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('visi_misi', 'public');
        }

        \App\Models\VisiMisi::create([
            'judul' => $request->judul,
            'image' => $path
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Update data
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:4096'
        ]);

        $path = $visiMisi->image;
        if ($request->hasFile('image')) {
            if ($visiMisi->image) {
                Storage::disk('public')->delete($visiMisi->image);
            }
            $path = $request->file('image')->store('visi_misi', 'public');
        }

        $visiMisi->update([
            'judul' => $request->judul,
            'image' => $path
        ]);

        return redirect()->route('visi-misi.index')->with('success', 'Data berhasil diperbarui!');
    }
    public function show(VisiMisi $visiMisi)
{
 
}

    // Hapus data
    public function destroy(VisiMisi $visiMisi)
    {
        if ($visiMisi->image) {
            Storage::disk('public')->delete($visiMisi->image);
        }
        $visiMisi->delete();

        return redirect()->route('visi-misi.index')->with('success', 'Data berhasil dihapus!');
    }
}


