<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'nama' => 'Admin User',
                'password' => Hash::make('password'), 
                'nomor_kavling' => 'A1',
                'blok_cluster' => 'A',
                'no_hp' => '08123456789',
                'id_pelanggan_online' => '12345',
                'role' => 'admin',
            ]
        );

        // Tambahkan data pengguna lain di sini jika perlu
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'nama' => 'User Biasa',
                'password' => Hash::make('password'),
                'nomor_kavling' => 'B1',
                'blok_cluster' => 'B',
                'no_hp' => '08123456780',
                'id_pelanggan_online' => '12346',
                'role' => 'warga',
            ]
        );
    }
}
