<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'mapel_id', 'judul', 'deskripsi', 'file', 'deadline', 'slug'];

    protected static function booted()
    {
        static::creating(function ($tugas) {
            $tugas->slug = Str::slug($tugas->judul . '-' . Str::random(5));
        });
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function group()
    {
        return $this->belongsTo(GroupKelas::class);
    }
}
