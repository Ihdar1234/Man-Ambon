<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['name'];

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class);
    }

    public function siswas()
    {
        return $this->hasMany(DaftarSiswa::class);
    }
}
