<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survei_layanans', function (Blueprint $table) {
            $table->id();
               $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // relasi ke users
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('layanan');
            $table->json('jawaban'); // simpan array nilai
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survei_layanans');
    }
};
