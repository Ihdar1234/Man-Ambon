<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Struktur;

class StrukturOrganisasiController extends Controller
{
     public function index()
    {
        $datas = Struktur::latest()->get();
        return view('organisasi.index', compact('datas'));
    }
      
}
