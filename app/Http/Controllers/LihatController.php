<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\ArtikelController;

class LihatController extends Controller
{
  public function lihat($slug)
    {
        // contoh: ambil data artikel berdasarkan slug
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        return view('home.artikel.lihat', compact('artikel'));
    }
}
