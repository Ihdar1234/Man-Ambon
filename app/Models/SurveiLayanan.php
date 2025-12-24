<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveiLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'layanan',
        'jawaban',
        'saran',
    ];

    protected $casts = [
        'jawaban' => 'array', // supaya json otomatis jadi array
    ];
}
