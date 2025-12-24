<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = ['kecamatan_id', 'name'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function siswas()
    {
        return $this->hasMany(DaftarSiswa::class);
    }
}
