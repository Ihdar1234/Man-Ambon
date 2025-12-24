<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Struktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'image',
    ];

    // Generate slug otomatis jika belum ada
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($struktur) {
            if (empty($struktur->slug)) {
                $struktur->slug = Str::slug($struktur->judul);
            }
        });
    }
}
