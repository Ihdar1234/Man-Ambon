<?php

namespace App\Models;

use App\Models\Galeri;
use App\Models\User;
use App\Models\Kalender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
   // otomatis generate slug saat create / update judul
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'isi', 'penulis', 'gambar', 'galeris_id'
    ];

    // Relasi ke galeri
    public function galeris()
{
    return $this->hasMany(Galeri::class, 'artikel_id');
}
   public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
    public function kalenders()
{
    return $this->hasMany(Kalender::class, 'artikel_id');
}
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
             $artikel->user_id = auth()->id(); 
        });

        static::updating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
        });
    }
public function votes()
{
    return $this->hasMany(ArtikelVote::class);
}

 public function currentSessionVoteType()
    {
        // pastikan session aktif
        if (! session()->getId()) {
            session()->start();
        }

        $sessionId = session()->getId();
        $userId = auth()->check() ? auth()->id() : null;

        $vote = $this->votes()
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn($q) => $q->where('session_id', $sessionId))
            ->first();

        return $vote ? $vote->vote_type : null;
    }

}
