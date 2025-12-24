<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasis';
    protected $fillable = ['siswa_id', 'judul', 'pesan', 'is_read'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
