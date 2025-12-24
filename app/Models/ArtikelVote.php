<?php

// App/Models/ArtikelVote.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelVote extends Model
{
    protected $fillable = ['artikel_id', 'session_id', 'vote_type'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}

