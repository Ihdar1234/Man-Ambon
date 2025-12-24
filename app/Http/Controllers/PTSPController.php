<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Pengajuan;

class PTSPController extends Controller
{
    // Halaman daftar layanan
    public function index()
    {
        $layanans = Layanan::all();
        return view('ptsp.index', compact('layanans'));
    }

    // Menyimpan pengajuan publik
   public function store(Request $request)
{ 
    $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'data' => 'required|array',
        ]);

        $data = $request->data;

        // handle file upload
        foreach ($data as $key => $value) {
            if ($request->hasFile("data.$key")) {
                $file = $request->file("data.$key");
                $path = $file->store('uploads', 'public');
                $data[$key] = $path; // simpan path di JSON
            }
        }

        Pengajuan::create([
            'layanan_id' => $request->layanan_id,
            'data' => $data,
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim!');
    }
}

