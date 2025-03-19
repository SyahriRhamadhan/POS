<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Costumer;

class CostumerSeeder extends Seeder
{
    public function run()
    {
        Costumer::insert([
            ['name' => 'John Doe', 'alamat' => 'Jl. Mawar No.5', 'no_telp' => '081111111111'],
            ['name' => 'Jane Doe', 'alamat' => 'Jl. Melati No.7', 'no_telp' => '082222222222'],
        ]);
    }
}
