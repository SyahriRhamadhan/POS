<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    public function run()
    {
        Penyakit::insert([
            ['nama_penyakit' => 'Miopi (Rabun Jauh)'],
            ['nama_penyakit' => 'Hipermetropi (Rabun Dekat)'],
            ['nama_penyakit' => 'Astigmatisme (Silinder)'],
        ]);
    }
}
