<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function artikels()
{
    return $this->hasMany(Artikel::class, 'user_id');
}
public function survei()
{
    return $this->hasMany(Survei::class, 'user_id');
}

public function avatar()
{
    return $this->hasOne(\App\Models\UserAvatar::class);
}

/**
 * Mengambil URL avatar user.
 * Jika belum ada avatar → pakai default.
 */
public function getAvatarUrlAttribute()
{
    if ($this->avatar && $this->avatar->path) {
        return asset($this->avatar->path); // path avatar di tabel user_avatars
    }

    return asset('default-avatar.png'); // fallback default
}

}
