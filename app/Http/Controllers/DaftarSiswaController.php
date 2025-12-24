<?php

namespace App\Http\Controllers;

use App\Models\DaftarSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DaftarSiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data siswa milik user yang sedang login (opsional)
       $siswas = DaftarSiswa::where('user_id', auth()->id())->paginate(10);


        return view('siswa.daftar.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.daftar.create');
    }

public function store(Request $request)
{
 

   $validated = $request->validate([
    'province_id' => 'required|exists:indonesia_provinces,code',
    'city_id'     => 'required|exists:indonesia_cities,code',
    'district_id' => 'required|exists:indonesia_districts,code',
    'village_id'  => 'required|exists:indonesia_villages,code',

    'nisn' => 'required|digits:10|unique:daftar_siswas,nisn',
    'nik'  => 'nullable|digits:16',

    'nama_lengkap' => 'required|string|max:255',
    'tempat_lahir' => 'required|string|max:100',
    'tanggal_lahir'=> 'required|date',
    'jenis_kelamin'=> 'required|in:L,P',

    'rt' => 'nullable|string|max:5',
    'rw' => 'nullable|string|max:5',
    'detail_alamat' => 'nullable|string',

    'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

    // Upload foto
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('foto_siswa', 'public');
    }

    $validated['user_id'] = Auth::id();
    $validated['status']  = 'belum_verifikasi';

    DaftarSiswa::create($validated);
    

    return redirect()
        ->route('siswa.daftar.index')
        ->with('success', 'Pendaftaran siswa berhasil disimpan.');
}

    public function show(DaftarSiswa $daftar)
    {
        return view('siswa.daftar.show', compact('daftar'));
    }

    public function edit(DaftarSiswa $daftar)
    {
        return view('siswa.daftar.edit', compact('daftar'));
    }

    public function update(Request $request, DaftarSiswa $daftar)
    {
        $data = $request->validate([
            'nisn' => 'required|string|unique:daftar_siswas,nisn,' . $daftar->id,
            'nik' => 'nullable|string',
            'nama_lengkap' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'nullable|string',
            'alamat' => 'nullable|string',
            'asal_sekolah' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'nama_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'pekerjaan_ayah' => 'nullable|string',
            'pekerjaan_ibu' => 'nullable|string',
            'penghasilan_ortu' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'status' => 'required|in:belum_verifikasi,verifikasi,ditolak'
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($daftar->foto) {
                Storage::disk('public')->delete($daftar->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $daftar->update($data);

        return redirect()->route('siswa.daftar.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(DaftarSiswa $daftar)
    {
        if ($daftar->foto) {
            Storage::disk('public')->delete($daftar->foto);
        }

        $daftar->delete();

        // 🔧 perbaikan route name (sebelumnya salah)
        return redirect()->route('siswa.daftar.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
