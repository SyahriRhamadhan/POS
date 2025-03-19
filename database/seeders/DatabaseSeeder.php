<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TokoSeeder::class,
            UserSeeder::class,
            CostumerSeeder::class,
            DiscountSeeder::class,
            KategoriSeeder::class, 
            PenyakitSeeder::class,  
            DiagnosisSeeder::class, 
            ProdukSeeder::class,
            GudangSeeder::class,
            KeranjangSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}
