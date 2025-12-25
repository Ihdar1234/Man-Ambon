<?php

namespace App\Http\Controllers;

use App\Models\DaftarSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;

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

        // Alamat (Laravolt code → string)
        'province_id' => 'nullable|string',
        'city_id'     => 'nullable|string',
        'district_id' => 'nullable|string',
        'village_id'  => 'nullable|string',

        'rt' => 'nullable|string|max:5',
        'rw' => 'nullable|string|max:5',
        'detail_alamat' => 'nullable|string',

        // Data siswa
        'nisn' => 'required|digits:10|unique:daftar_siswas,nisn',
        'nik'  => 'nullable|digits:16',

        'nama_lengkap'  => 'required|string|max:255',
        'tempat_lahir'  => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',

        'agama' => 'nullable|string|max:50',
        'asal_sekolah' => 'nullable|string|max:255',
        'no_hp' => 'nullable|string|max:20',

        // Orang tua
        'nama_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'pekerjaan_ayah' => 'nullable|string|max:255',
        'pekerjaan_ibu' => 'nullable|string|max:255',
        'penghasilan_ortu' => 'nullable|string|max:100',

        // Foto
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // ✅ 2. UPLOAD FOTO (BARU ADA $validated)
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')
            ->store('foto_siswa', 'public');
    }

    // ✅ 3. TAMBAHAN DATA
    $validated['user_id'] = auth()->id();
    $validated['status']  = 'belum_verifikasi';

    // ✅ 4. SIMPAN KE DATABASE
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
      
   $provinces = Province::all();
    return view('siswa.daftar.edit', compact('daftar', 'provinces'));
    }

   public function update(Request $request, DaftarSiswa $daftar)
{
    $data = $request->validate([

        // ================= ALAMAT (LARAVOLT CODE) =================
        'province_id' => 'nullable|string',
        'city_id'     => 'nullable|string',
        'district_id' => 'nullable|string',
        'village_id'  => 'nullable|string',

        'rt' => 'nullable|string|max:5',
        'rw' => 'nullable|string|max:5',
        'detail_alamat' => 'nullable|string',

        // ================= DATA SISWA =================
        'nisn' => 'required|digits:10|unique:daftar_siswas,nisn,' . $daftar->id,
        'nik'  => 'nullable|digits_between:15,16',

        'nama_lengkap'  => 'required|string|max:255',
        'tempat_lahir'  => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',

        'agama' => 'nullable|string|max:50',
        'asal_sekolah' => 'nullable|string|max:255',
        'no_hp' => 'nullable|string|max:20',

        // ================= DATA ORANG TUA =================
        'nama_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'pekerjaan_ayah' => 'nullable|string|max:255',
        'pekerjaan_ibu' => 'nullable|string|max:255',
        'penghasilan_ortu' => 'nullable|string|max:100',

        // ================= FOTO =================
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        // ================= STATUS =================
       
    ]);

    // ================= UPLOAD FOTO BARU =================
    if ($request->hasFile('foto')) {
        if ($daftar->foto) {
            Storage::disk('public')->delete($daftar->foto);
        }

        $data['foto'] = $request->file('foto')
            ->store('foto_siswa', 'public');
    }

    // ================= UPDATE DATA =================
    $daftar->update($data);

    return redirect()
        ->route('siswa.daftar.index')
        ->with('success', 'Data siswa berhasil diperbarui.');
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
