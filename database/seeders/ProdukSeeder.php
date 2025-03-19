<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        Produk::insert([
            ['nama' => 'Kacamata UV', 'id_kategori' => 1, 'harga' => 250000, 'lokasi' => 'gudang', 'id_toko' => 1, 'qr_code' => 'QRCODE123'],
            ['nama' => 'Lensa Blue Light', 'id_kategori' => 1, 'harga' => 300000, 'lokasi' => 'estalase', 'id_toko' => 2, 'qr_code' => 'QRCODE456'],
        ]);
    }
}
