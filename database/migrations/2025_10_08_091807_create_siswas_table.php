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
        Schema::create('siswas', function (Blueprint $table) {
      
       $table->id();

            $table->foreignId('siswas_id')->constrained('siswas')->onDelete('cascade'); // pastikan tabel siswa = siswas
             $table->foreignId('group_kelas_id')->constrained('group_kelas')->onDelete('cascade');
            $table->unique(['group_kelas_id', 'siswas_id']); 
            $table->timestamps();

            
    });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
