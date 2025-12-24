<?php

namespace App\Http\Controllers;

use App\Models\DokumenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenSiswaController extends Controller
{
    public function index()
    {
        // ✅ Hanya tampilkan dokumen milik user yang login
        $dokumens = DokumenSiswa::where('user_id', Auth::id())->latest()->get();
        return view('siswa.dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('siswa.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ijazah' => 'nullable|file|mimes:pdf|max:5120',
            'kk'     => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'foto'   => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'raport' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $user_id = Auth::id();

        // Jenis dokumen yang diizinkan
        $inputs = [
            'ijazah' => 'pdf',
            'kk'     => 'image',
            'foto'   => 'image',
            'raport' => 'pdf',
        ];

        foreach ($inputs as $jenis => $type) {
            if ($request->hasFile($jenis)) {
                $file = $request->file($jenis);
                $path = $file->store('dokumen_siswa', 'public');

                // Jika user sudah pernah upload jenis ini, hapus dulu yang lama
                $old = DokumenSiswa::where('user_id', $user_id)
                    ->where('jenis_dokumen', $jenis)
                    ->first();

                if ($old) {
                    if (Storage::disk('public')->exists($old->file_path)) {
                        Storage::disk('public')->delete($old->file_path);
                    }
                    $old->delete();
                }

                // Simpan dokumen baru
                DokumenSiswa::create([
                    'user_id'       => $user_id,
                    'jenis_dokumen' => $jenis,
                    'file_path'     => $path,
                    'file_type'     => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return redirect()->route('siswa.dokumen.index')->with('success', '📄 Dokumen berhasil diupload.');
    }

    public function destroy($id)
    {
        $dokumen = DokumenSiswa::findOrFail($id);

        // ✅ Pastikan hanya pemilik yang bisa hapus
        abort_if($dokumen->user_id !== Auth::id(), 403, 'Kamu tidak punya izin untuk menghapus dokumen ini.');

        // Hapus file dari storage
        if (Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        $dokumen->delete();

        return redirect()->back()->with('success', '✅ Dokumen berhasil dihapus.');
    }
}
