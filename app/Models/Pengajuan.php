<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = ['layanan_id', 'user_id', 'data', 'status'];

    protected $casts = [
        'data' => 'array',
    ];

    public function getStatusLabelAttribute()
{
    return match($this->status) {
        'baru' => 'Baru',
        'diproses' => 'Diproses',
        'selesai' => 'Selesai',
        'ditolak' => 'Ditolak',
        default => '-'
    };
}

public function shouldSendEmail(): bool
{
    $layananKirim = ['Surat Keterangan','Izin Usaha'];
    return isset($this->data['email']) && in_array($this->layanan->nama, $layananKirim);
}

public function getAvatarUrlAttribute()
{
    return $this->user->avatar ?? '/default-avatar.png';
}

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
