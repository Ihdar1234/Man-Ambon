<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $strukturs = Struktur::latest()->get();
        return view('struktur.index', compact('strukturs'));
    }

    public function create()
    {
        return view('struktur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('struktur', 'public');
        }

        Struktur::create($data);

        return redirect()->route('struktur.index')->with('success', 'Data struktur berhasil ditambahkan!');
    }

    public function edit(Struktur $struktur)
    {
        return view('struktur.edit', compact('struktur'));
    }

    public function update(Request $request, Struktur $struktur)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('image')) {
            if ($struktur->image) {
                Storage::disk('public')->delete($struktur->image);
            }
            $data['image'] = $request->file('image')->store('struktur', 'public');
        }

        $struktur->update($data);

        return redirect()->route('struktur.index')->with('success', 'Data struktur berhasil diperbarui!');
    }

    public function destroy(Struktur $struktur)
    {
        if ($struktur->image) {
            Storage::disk('public')->delete($struktur->image);
        }
        $struktur->delete();

        return redirect()->route('struktur.index')->with('success', 'Data struktur berhasil dihapus!');
    }

    public function show(Struktur $struktur)
    {
        return view('struktur.show', compact('struktur'));
    }
}
