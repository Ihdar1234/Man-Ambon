<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\Kalender;
use App\Models\ArtikelVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
   
         public function index()
    {
        // Ambil data galeri & artikel terbaru
        $galeris = Galeri::latest()->take(6)->get(); // 6 galeri terbaru
    $artikels = Artikel::with('galeris')->latest()->take(5)->get(); // 5 artikel terbaru beserta galeri-nya
    $kalenders = Kalender::latest()->take(5)->get(); // ambil 5 data kalender terbaru

    return view('welcome', compact('galeris', 'artikels', 'kalenders'));
    }
    
    public function vote(Request $request, $slug)
    {
        // pastikan session aktif
        if (! session()->getId()) session()->start();
        $sessionId = session()->getId();

        $voteType = $request->vote_type; // like / dislike / suka

        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        DB::beginTransaction();
        try {
            $existing = ArtikelVote::where('session_id', $sessionId)
                ->where('artikel_id', $artikel->id)
                ->first();

            if ($existing) {
                if ($existing->vote_type === $voteType) {
                    $existing->delete(); // klik lagi = batal
                } else {
                    $existing->update(['vote_type' => $voteType]); // ubah vote
                }
            } else {
                ArtikelVote::create([
                    'session_id' => $sessionId,
                    'artikel_id' => $artikel->id,
                    'vote_type' => $voteType,
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'ok',
                'counts' => [
                    'like' => $artikel->votes()->where('vote_type', 'like')->count(),
                    'dislike' => $artikel->votes()->where('vote_type', 'dislike')->count(),
                    'suka' => $artikel->votes()->where('vote_type', 'suka')->count(),
                ],
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['status' => 'error'], 500);
        }
    }
   
}
