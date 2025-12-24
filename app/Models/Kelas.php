<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'slug'];

    // Generate slug otomatis
    protected static function booted()
    {
        static::creating(function ($kelas) {
            $kelas->slug = Str::slug($kelas->nama_kelas);
        });
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function groups()
    {
        return $this->hasMany(GroupKelas::class);
    }
}
