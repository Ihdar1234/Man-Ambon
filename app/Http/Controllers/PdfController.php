<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pdf;
use Illuminate\Support\Str;

class PdfController extends Controller
{
    // Tampilkan semua PDF
    public function index()
    {
        $pdfs = Pdf::latest()->get();
        return view('pdfs.index', compact('pdfs'));
    }

    // Form create PDF
    public function create()
    {
        return view('pdfs.create');
    }

    // Simpan PDF baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'drive_link' => 'required|url',
        ]);

        Pdf::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'drive_link' => $request->drive_link,
        ]);

        return redirect()->route('pdfs.index')->with('success', 'PDF berhasil ditambahkan.');
    }

    // Form edit PDF
    public function edit($id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('pdfs.edit', compact('pdf'));
    }

    // Update PDF
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'drive_link' => 'required|url',
        ]);

        $pdf = Pdf::findOrFail($id);
        $pdf->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'drive_link' => $request->drive_link,
        ]);

        return redirect()->route('pdfs.index')->with('success', 'PDF berhasil diupdate.');
    }

    // Hapus PDF
    public function destroy($id)
    {
        $pdf = Pdf::findOrFail($id);
        $pdf->delete();
        return redirect()->route('pdfs.index')->with('success', 'PDF berhasil dihapus.');
    }

    // Redirect ke Google Drive
    public function openDrive($slug)
    {
        $pdf = Pdf::where('slug', $slug)->firstOrFail();
        return redirect()->away($pdf->drive_link);
    }
}
