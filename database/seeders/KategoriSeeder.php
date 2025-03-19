<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        Kategori::insert([
            ['name' => 'Kacamata'],
            ['name' => 'Lensa'],
            ['name' => 'Aksesoris'],
        ]);
    }
}
