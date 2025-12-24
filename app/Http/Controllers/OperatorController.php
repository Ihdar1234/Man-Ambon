<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusPengajuanMail;
use App\Mail\KirimFileMail;

class OperatorController extends Controller
{
   public function dashboard(Request $request)
{
    $layanans = Layanan::all();
    $selected = $request->layanan_id;

    // Query dasar
    $query = Pengajuan::with('layanan');
    if($selected){
        $query->where('layanan_id', $selected);
    }

    // Ambil semua pengajuan untuk ditampilkan
    $pengajuan = $query->latest()->get();

    // Hitung statistik sekaligus via query
    $statusCounts = Pengajuan::selectRaw("status, COUNT(*) as total")
        ->when($selected, fn($q) => $q->where('layanan_id', $selected))
        ->groupBy('status')
        ->pluck('total','status'); // ['baru' => 10, 'proses' => 5, ...]

    $baru = $statusCounts->get('baru', 0);
    $proses = $statusCounts->get('proses', 0);
    $selesai = $statusCounts->get('selesai', 0);
    $ditolak = $statusCounts->get('ditolak', 0);

    return view('dashboard.operator.home.index', compact(
        'pengajuan','layanans','selected','baru','proses','selesai','ditolak'
    ));
}


    public function pengajuan()
    {
        $data = Pengajuan::with(['user', 'layanan'])
                         ->latest()
                         ->paginate(10);

        return view('dashboard.operator.pengajuan.index', compact('data'));
    }

    public function detail($id)
    {
        $pengajuan = Pengajuan::with(['user', 'layanan'])->findOrFail($id);
        return view('dashboard.operator.pengajuan.show', compact('pengajuan'));
    }
public function updateStatus(Request $request, $id)
{
    $pengajuan = Pengajuan::with('layanan')->findOrFail($id);

    // Validasi input sesuai ENUM
    $request->validate([
        'status' => 'required|in:baru,proses,selesai,ditolak',
    ]);

    // Pastikan value bersih (lowercase + trim)
    $newStatus = strtolower(trim($request->status));

    // Simpan jika berbeda
    if ($pengajuan->status !== $newStatus) {
        $pengajuan->status = $newStatus;
        $pengajuan->save();
    }

    // Kirim email hanya untuk layanan tertentu
    $layananKirim = ['Surat Keterangan','Izin Usaha']; 
    $layanan = $pengajuan->layanan->nama;

    if (isset($pengajuan->data['email']) && in_array($layanan, $layananKirim)) {
        Mail::to($pengajuan->data['email'])->send(new StatusPengajuanMail($pengajuan));
    }

    return back()->with('success', 'Status berhasil diperbarui & email terkirim jika sesuai layanan.');
}

    public function kirimFile(Request $request, $id)
    {
        $pengajuan = Pengajuan::with('layanan')->findOrFail($id);

        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,png|max:5120',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('pengajuan_files');

        if(isset($pengajuan->data['email'])){
            Mail::to($pengajuan->data['email'])->send(new KirimFileMail($pengajuan, $filePath));
        }

        return back()->with('success', 'File berhasil dikirim ke pemohon.');
    }


    public function destroy($id)
{
    $pengajuan = Pengajuan::findOrFail($id);
    $pengajuan->delete();

    return redirect()->route('dashboard.operator.home.index')
                     ->with('success', 'Pengajuan berhasil dihapus.');
}
}
