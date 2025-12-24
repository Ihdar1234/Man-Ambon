<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;
protected $table = surveis;
    protected $fillable = [
        'nama',
        'email',
        'layanan',
        'nilai',
        'saran'
    ];
  public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
