<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        Transaksi::insert([
            ['id_costumer' => 1, 'id_discount' => 1, 'id_keranjang' => 1, 'id_user' => 1, 'id_toko' => 1],
            ['id_costumer' => 2, 'id_discount' => 2, 'id_keranjang' => 2, 'id_user' => 2, 'id_toko' => 2],
        ]);
    }
}
