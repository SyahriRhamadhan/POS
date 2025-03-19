<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gudang;

class GudangSeeder extends Seeder
{
    public function run()
    {
        Gudang::insert([
            ['id_toko' => 1, 'id_produk' => 1, 'stock_gudang' => 50, 'lokasi_gudang' => 'pusat'],
            ['id_toko' => 2, 'id_produk' => 2, 'stock_gudang' => 30, 'lokasi_gudang' => 'cabang'],
        ]);
    }
}
