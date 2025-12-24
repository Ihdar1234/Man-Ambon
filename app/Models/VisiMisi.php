<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VisiMisi extends Model
{
    protected $fillable = ['judul', 'slug', 'image'];

    // Generate slug otomatis saat membuat
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->judul);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->judul);
        });
    }

    // Agar route model binding pakai slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

