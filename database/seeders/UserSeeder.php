<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('123'),
                'role' => 'superadmin',
                'id_toko' => 1,
            ],
            [
                'name' => 'Admin Cabang',
                'email' => 'admin@example.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'id_toko' => 2,
            ],
        ]);
    }
}
