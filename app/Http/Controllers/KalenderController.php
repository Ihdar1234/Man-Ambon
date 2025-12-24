<?php

namespace App\Http\Controllers;

use App\Models\Kalender;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KalenderController extends Controller
{
    public function index()
    {
        $kalenders = Kalender::latest()->get();
        return view('kalender.index', compact('kalenders'));
    }

    public function create()
    {
        return view('kalender.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kalender', 'public');
        }

        Kalender::create($data);

        return redirect()->route('kalender.index')->with('success', 'Kalender berhasil ditambahkan.');
    }

    public function edit(Kalender $kalender)
    {
        return view('kalender.edit', compact('kalender'));
    }

    public function update(Request $request, Kalender $kalender)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul');
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kalender', 'public');
        }

        $kalender->update($data);

        return redirect()->route('kalender.index')->with('success', 'Kalender berhasil diperbarui.');
    }

    public function destroy(Kalender $kalender)
    {
        if ($kalender->gambar && file_exists(storage_path('app/public/' . $kalender->gambar))) {
            unlink(storage_path('app/public/' . $kalender->gambar));
        }

        $kalender->delete();
        return redirect()->route('kalender.index')->with('success', 'Kalender berhasil dihapus.');
    }

    public function show($slug)
    {
        $kalender = Kalender::where('slug', $slug)->firstOrFail();
        return view('kalender.show', compact('kalender'));
    }
}
