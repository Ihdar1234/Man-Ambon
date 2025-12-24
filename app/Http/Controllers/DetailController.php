<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\DetailController;


class DetailController extends Controller
{
public function detail($slug)
{
    $galeri = Galeri::where('slug', $slug)->firstOrFail();
    return view('home.detail', compact('galeri'));
}
}
