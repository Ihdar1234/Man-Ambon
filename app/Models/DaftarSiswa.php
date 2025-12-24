<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Regency;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class DaftarSiswa extends Model
{
    use HasFactory;

    protected $table = 'daftar_siswas';

    protected $fillable = [
        'user_id',
        'nisn',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'asal_sekolah',
        'no_hp',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'penghasilan_ortu',
        'foto',
        'status',

        // ✔ sesuai MIGRASI
        'province_id',
        'city_id',
        'district_id',
        'village_id',

        'rt',
        'rw',
        'detail_alamat'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Laravolt Indonesia
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'code');
    }

    public function city()
    {
        return $this->belongsTo(Regency::class, 'city_id', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'code');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'code');
    }

}
