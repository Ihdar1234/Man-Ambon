<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $gurus = Guru::latest()->get();
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus',
            'alamat' => 'required',
            'no_hp' => 'required',
            'mapel' => 'required'
        ]);
        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success','Guru berhasil ditambahkan');
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:gurus,nip,'.$guru->id,
            'alamat' => 'required',
            'no_hp' => 'required',
            'mapel' => 'required'
        ]);
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success','Guru berhasil diupdate');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success','Guru berhasil dihapus');
    }
}
