<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\ArtikelController;

class BeritaController extends Controller
{
      public function index()
    {
        // ambil semua artikel dari database, urutkan terbaru
        $artikels = Artikel::latest()->get();

        // kirim ke view
        return view('berita.index', compact('artikels'));
    }
    public function show($slug)
{
    $artikel = Artikel::where('slug', $slug)->firstOrFail();
    return view('berita.show', compact('artikel'));
}
}
