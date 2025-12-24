<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guru extends Model
{
    use HasFactory;

  protected $fillable = [
        'nip',
        'nama',
        'mata_pelajaran',
        'no_hp',
        'jenis_kelamin',
        'password', // PENTING: Tambahkan kolom password
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika Anda ingin menggunakan NIP sebagai username/email untuk login
    public function getAuthIdentifierName()
    {
        return 'nip'; // Menggunakan NIP sebagai ID untuk Auth
    }

    protected static function booted()
    {
        static::creating(function ($guru) {
            $guru->slug = Str::slug($guru->nama . '-' . Str::random(5));
        });
    }

    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }

    public function groups()
    {
        return $this->hasMany(GroupKelas::class);
    }
}

