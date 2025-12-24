<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['guru_id', 'nama_mapel', 'slug'];

    protected static function booted()
    {
        static::creating(function ($mapel) {
            $mapel->slug = Str::slug($mapel->nama_mapel);
        });
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
