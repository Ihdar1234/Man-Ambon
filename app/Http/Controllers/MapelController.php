<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Mapel::query();

    // Filter pencarian
    if ($search = $request->input('q')) {
        $query->where('nama', 'like', "%{$search}%");
    }

    // Pagination 10 per halaman
    $mapel = $query->latest()->paginate(10);

    return view('mapel.index', compact('mapel'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:mapel,nama',
        ]);

        Mapel::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:mapel,nama,' . $mapel->id,
        ]);

        $mapel->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil dihapus');
    }
    /**
 * Mass delete mapel
 */
public function massDestroy(Request $request)
{
    $request->validate([
        'ids' => 'required'
    ]);

    // ids dikirim sebagai JSON string
    $ids = json_decode($request->input('ids'), true);
    if (!is_array($ids)) {
        return back()->with('error', 'Format data tidak valid.');
    }

    Mapel::whereIn('id', $ids)->delete();

    return back()->with('success', count($ids) . ' data berhasil dihapus.');
}

}
