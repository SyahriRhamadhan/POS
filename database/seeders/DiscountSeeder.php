<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        Discount::insert([
            ['discount' => 10, 'deskrpsi' => 'Diskon Awal Tahun', 'status' => 'on', 'tgl_mulai' => now(), 'tgl_selesai' => now()->addDays(30)],
            ['discount' => 15, 'deskrpsi' => 'Diskon Spesial Member', 'status' => 'off', 'tgl_mulai' => now(), 'tgl_selesai' => now()->addDays(45)],
        ]);
    }
}
