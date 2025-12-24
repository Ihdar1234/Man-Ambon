<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jalankan seeder bawaan Laravolt
        $this->call(\Laravolt\Indonesia\Seeds\IndonesiaSeeder::class);
    }
}
