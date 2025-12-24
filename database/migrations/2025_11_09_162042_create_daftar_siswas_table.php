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
     Schema::create('daftar_siswas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        // ✅ SIMPAN CODE LARAVOLT (STRING)
        $table->string('province_id', 10)->nullable();
        $table->string('city_id', 10)->nullable();
        $table->string('district_id', 10)->nullable();
        $table->string('village_id', 15)->nullable();

        $table->string('rt')->nullable();
        $table->string('rw')->nullable();
        $table->string('detail_alamat')->nullable();

        $table->string('nisn')->unique();
        $table->string('nik')->nullable();
        $table->string('nama_lengkap');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('agama')->nullable();
        $table->string('asal_sekolah')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('nama_ayah')->nullable();
        $table->string('nama_ibu')->nullable();
        $table->string('pekerjaan_ayah')->nullable();
        $table->string('pekerjaan_ibu')->nullable();
        $table->string('penghasilan_ortu')->nullable();
        $table->string('foto')->nullable();

        $table->enum('status', ['belum_verifikasi', 'verifikasi', 'ditolak'])
              ->default('belum_verifikasi');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_siswas');
    }
};
