<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'nomor_kavling' => 'A1',
            'blok_cluster' => 'A',
            'no_hp' => '08123456789',
            'id_pelanggan_online' => '12345',
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'nomor_kavling' => 'B1',
            'blok_cluster' => 'B',
            'no_hp' => '08123456780',
            'id_pelanggan_online' => '67890',
            'role' => 'warga',
        ]);
    }
}
