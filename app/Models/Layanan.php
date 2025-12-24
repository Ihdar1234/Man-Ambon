<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
  protected $fillable = ['nama', 'kategori', 'fields'];

    protected $casts = [
        'fields' => 'array', // simpan field form dalam JSON
    ];

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
