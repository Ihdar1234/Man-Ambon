<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class GroupKelas extends Model
{
   use HasFactory;

    protected $fillable = ['guru_id', 'kelas_id', 'mapel_id', 'nama_group', 'slug'];

    protected static function booted()
    {
        static::creating(function ($group) {
            $group->slug = Str::slug($group->nama_group);
        });
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
