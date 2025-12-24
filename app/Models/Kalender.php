<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kalender extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'slug', 'gambar'];

    protected static function booted()
    {
        static::creating(function ($kalender) {
            $kalender->slug = Str::slug($kalender->judul);
        });

        static::updating(function ($kalender) {
            $kalender->slug = Str::slug($kalender->judul);
        });
    }
    public function artikel()
{
    return $this->belongsTo(Artikel::class, 'artikel_id');
}
}
