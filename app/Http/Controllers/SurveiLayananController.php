<?php

namespace App\Http\Controllers;

use App\Models\SurveiLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveiLayananController extends Controller
{
    public function index()
    {
        // Tampilkan form survei utama
        return view('survei.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'layanan' => 'required|string',
            'jawaban' => 'required|array',
            'saran' => 'nullable|string',
        ]);

        SurveiLayanan::create($validated);

        return response()->json(['success' => true]);
    }

    // Grafik hasil survei
    public function grafik()
    {
        $data = SurveiLayanan::select('layanan', 'jawaban')->get();

        // Hitung rata-rata nilai per layanan
        $layanan = ['Administrasi', 'Fasilitas', 'Kebersihan', 'Guru dan Pengajaran'];
        $hasil = [];

        foreach ($layanan as $l) {
            $records = $data->where('layanan', $l);

            if ($records->count() > 0) {
                $nilai = collect($records)->flatMap(fn($r) => $r->jawaban)->avg();
                $hasil[$l] = round($nilai, 2);
            } else {
                $hasil[$l] = 0;
            }
        }

        return view('survei.grafik', [
            'labels' => array_keys($hasil),
            'values' => array_values($hasil),
        ]);
    }
}
