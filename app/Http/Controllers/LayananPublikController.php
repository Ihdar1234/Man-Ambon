<?php

namespace App\Http\Controllers;


use App\Models\LayananPublik;
use App\Models\LayananSurvei;
use Illuminate\Http\Request;

class LayananPublikController extends Controller
{
public function index()
{
$layanan = LayananPublik::with('survei')->get();
return view('layanan.index', compact('layanan'));
}


public function create()
{
return view('layanan.create');
}


public function store(Request $request)
{
$data = $request->validate([
'nama' => 'required|string|max:255',
'deskripsi' => 'nullable|string',
]);


LayananPublik::create($data);


return redirect()->route('layanan.index')->with('success', 'Layanan dibuat.');
}
public function edit(LayananPublik $layanan)
{
return view('layanan.edit', compact('layanan'));
}


public function update(Request $request, LayananPublik $layanan)
{
$data = $request->validate([
'nama' => 'required|string|max:255',
'deskripsi' => 'nullable|string',
]);


$layanan->update($data);


return redirect()->route('layanan.index')->with('success', 'Layanan diperbarui.');
}

public function destroy(LayananPublik $layanan)
{
$layanan->delete();
return redirect()->route('layanan.index')->with('success', 'Layanan dihapus.');
}


// Simpan hasil survei (misal form sederhana untuk input manual)
public function storeSurvei(Request $request, LayananPublik $layanan)
{
$data = $request->validate([
'aspek' => 'required|string|max:255',
'skor' => 'required|integer|min:1|max:5',
'responden' => 'required|integer|min:1',
]);


$data['layanan_id'] = $layanan->id;
LayananSurvei::create($data);


// update ringkasan
$this->recalcRingkasan($layanan);


return back()->with('success', 'Hasil survei tersimpan.');
}


protected function recalcRingkasan(LayananPublik $layanan)
{
$survei = $layanan->survei()->get();
$totalResponden = $survei->sum('responden');


if ($totalResponden === 0) {
$layanan->update(['total_responden' => 0, 'rata_kepuasan' => 0]);
return;
}
$weightedSum = $survei->sum(function ($s) {
return $s->skor * $s->responden;
});


$avgSkor = $weightedSum / $totalResponden; // 1..5
$rataKepuasanPct = (($avgSkor - 1) / 4) * 100; // 0..100


$layanan->update([
'total_responden' => $totalResponden,
'rata_kepuasan' => round($rataKepuasanPct, 2),
]);
}
public function apiGrafik()
{
$data = LayananPublik::with('survei')->get()->map(function ($l) {
// ambil rata-rata skor 1..5
$totalResponden = $l->survei->sum('responden');
$weightedSum = $l->survei->sum(function ($s) { return $s->skor * $s->responden; });
$avg = $totalResponden ? ($weightedSum / $totalResponden) : 0;
return [
'id' => $l->id,
'nama' => $l->nama,
'avg_skor' => round($avg, 2),
'rata_kepuasan_pct' => (float) $l->rata_kepuasan,
'total_responden' => $totalResponden,
];
});


return response()->json($data);
}
}