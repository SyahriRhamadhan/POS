<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosis;

class DiagnosisSeeder extends Seeder
{
    public function run()
    {
        Diagnosis::insert([
            ['harga_paket' => 150000, 'penyakit_id' => 1], // Miopi
            ['harga_paket' => 200000, 'penyakit_id' => 2], // Hipermetropi
            ['harga_paket' => 180000, 'penyakit_id' => 3], // Astigmatisme
        ]);
    }
}
