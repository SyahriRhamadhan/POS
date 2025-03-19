<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Toko;

class TokoSeeder extends Seeder
{
    public function run()
    {
        Toko::insert([
            ['nama' => 'Toko Pusat', 'alamat' => 'Jl. Utama No.1', 'telepon' => '081234567890', 'tipe' => 'pusat'],
            ['nama' => 'Toko Cabang 1', 'alamat' => 'Jl. Raya No.10', 'telepon' => '082345678901', 'tipe' => 'cabang'],
        ]);
    }
}
