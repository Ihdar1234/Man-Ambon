<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('group_id')->constrained('group_kelas')->onDelete('cascade');
        $table->string('judul');
        $table->string('slug')->unique();
        $table->text('deskripsi')->nullable();
        $table->string('file_tugas')->nullable();
        $table->date('deadline')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
