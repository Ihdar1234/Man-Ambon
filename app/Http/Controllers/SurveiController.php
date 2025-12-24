<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveiController extends Controller
{
    // Menampilkan form survei (frontend)
    public function index()
    {
        return view('frontend.survei.index');
    }

    // Menyimpan data survei
    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan' => 'required',
            'nama' => 'required',
            'email' => 'nullable|email',
            'jawaban' => 'required|array',
            'saran' => 'nullable|string',
        ]);

        Survei::create([
            'layanan' => $validated['layanan'],
            'nama' => $validated['nama'],
            'email' => $validated['email'] ?? null,
            'jawaban' => json_encode($validated['jawaban']),
            'saran' => $validated['saran'] ?? null,
        ]);

        return response()->json(['success' => true]);
    }

    // Grafik survei di dashboard
    public function dashboard()
    {
        $data = Survei::select('layanan', DB::raw('AVG(JSON_EXTRACT(jawaban, "$[*]")) as rata'))
            ->groupBy('layanan')
            ->get();

        return view('backend.survei.grafik', [
            'labels' => $data->pluck('layanan'),
            'values' => $data->pluck('rata'),
        ]);
    }
}
