<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keranjang;

class KeranjangSeeder extends Seeder
{
    public function run()
    {
        Keranjang::insert([
            ['id_gudang' => 1, 'jumlah' => 2, 'id_diagnosis' => 1, 'id_toko' => 1],
            ['id_gudang' => 2, 'jumlah' => 1, 'id_diagnosis' => 2, 'id_toko' => 2],
        ]);
    }
}
