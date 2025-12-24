<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'slug', 'drive_link'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($pdf) {
            $pdf->slug = Str::slug($pdf->judul);
        });
    }
}
