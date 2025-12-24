<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',     // tambahkan ini
        'deskripsi', // tambahkan jika kamu juga isi deskripsi
        'gambar',    // tambahkan jika ada upload gambar
        // tambahkan field lain sesuai tabel
    ];
     protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
        });

        static::updating(function ($galeri) {
            $galeri->slug = Str::slug($galeri->judul);
        });
    }

    // Cari berdasarkan slug bukan id
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function artikel()
{
    return $this->belongsTo(Artikel::class, 'artikel_id');
}
}
