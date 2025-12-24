<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['kelas_id', 'nama', 'email', 'password', 'slug'];

    protected static function booted()
    {
        static::creating(function ($siswa) {
            $siswa->slug = Str::slug($siswa->nama . '-' . Str::random(5));
        });
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function notifikasis()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
