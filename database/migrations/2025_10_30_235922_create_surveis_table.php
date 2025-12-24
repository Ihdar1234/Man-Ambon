<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surveis', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('layanan');
            $table->string('nama');
            $table->string('email')->nullable();
            $table->json('jawaban'); // Simpan array jawaban
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveis');
    }
};
