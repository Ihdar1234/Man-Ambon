<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        // Ambil semua data terbaru
        $items = VisiMisi::latest()->get();

        // kirim ke view visi/index.blade.php
        return view('visi.index', compact('items'));
    }

    // Menampilkan satu data berdasarkan slug
    public function show($slug)
    {
        $item = VisiMisi::where('slug', $slug)->firstOrFail();

        // kirim ke view visi/show.blade.php
        return view('visi.show', compact('item'));
    }
}
