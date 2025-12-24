<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelVoteController extends Controller
{
    public function vote(Request $request, $slug)
    {
        $request->validate([
            'vote_type' => 'required|in:like,dislike,suka',
        ]);

        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        ArtikelVote::updateOrCreate(
            ['artikel_id' => $artikel->id, 'user_id' => Auth::id()],
            ['vote_type' => $request->vote_type]
        );

        return response()->json([
            'status' => 'ok',
            'counts' => [
                'like'    => $artikel->votes()->where('vote_type', 'like')->count(),
                'dislike' => $artikel->votes()->where('vote_type', 'dislike')->count(),
                'suka'    => $artikel->votes()->where('vote_type', 'suka')->count(),
            ]
        ]);
    }
}
