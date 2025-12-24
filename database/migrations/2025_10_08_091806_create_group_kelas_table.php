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
        Schema::create('group_kelas', function (Blueprint $table) {
       $table->id();
              $table->string('nama_group');
            $table->string('slug')->unique();
            $table->string('kode_join')->unique(); // untuk siswa join

            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('mapels_id')->constrained('mapels')->onDelete('cascade');
            $table->foreignId('gurus_id')->constrained('gurus')->onDelete('cascade'); // pastikan nama tabel guru 'gurus'
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_kelas');
    }
};
