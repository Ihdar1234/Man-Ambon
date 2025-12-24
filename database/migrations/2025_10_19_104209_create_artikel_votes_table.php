<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('artikel_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artikel_id')->constrained('artikels')->onDelete('cascade');
            $table->string('session_id')->index(); // Bisa diganti 'user_id' kalau pakai login
            $table->enum('vote_type', ['like', 'dislike', 'suka']);
            $table->timestamps();// 1 user hanya boleh 1 vote per artikel
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel_votes');
    }
};
