<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $query = Siswa::query();

    // search by nama/nisn
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nisn', 'like', '%' . $request->search . '%')
              ->orWhere('hoby', 'like', '%' . $request->search . '%')
              ->orWhere('mapel', 'like', '%' . $request->search . '%');
    }

    // per_page (default 10)
    $perPage = $request->get('per_page', 10);

    $siswas = $query->latest()->paginate($perPage)->withQueryString();

    return view('siswa.index', compact('siswas'));
}

    public function create()
    {
         $mapels = ['Matematika', 'IPA', 'IPS', 'Bahasa Indonesia', 'Bahasa Inggris'];
        $hobies = ['Membaca', 'Olahraga', 'Musik', 'Menulis', 'Traveling'];
        $jks = ['L' => 'Laki-laki', 'P' => 'Perempuan'];

        return view('siswa.create', compact('mapels', 'hobies', 'jks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string',
            'hoby' => 'required|string',
            'jk' => 'required|string',
            'nisn' => 'required|numeric|unique:siswas',
            'no_hp' => 'required|numeric',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        $mapels = ['Matematika', 'IPA', 'IPS', 'Bahasa Indonesia', 'Bahasa Inggris'];
        $hobies = ['Membaca', 'Olahraga', 'Musik', 'Menulis', 'Traveling'];
        $jks = ['L' => 'Laki-laki', 'P' => 'Perempuan'];

        return view('siswa.edit', compact('siswa', 'mapels', 'hobies', 'jks'));
    }

    public function update(Request $request, Siswa $siswa)
    {
       
        $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string',
            'hoby' => 'required|string',
            'jk' => 'required|string',
            'nisn' => 'required|numeric|unique:siswas,nisn,' . $siswa->id,
            'no_hp' => 'required|numeric',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
