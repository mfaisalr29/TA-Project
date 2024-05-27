<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalSampah;

class JadwalSampahSeeder extends Seeder
{
    public function run()
    {
        JadwalSampah::create(['hari' => 'Senin', 'waktu' => '08:00']);
        JadwalSampah::create(['hari' => 'Rabu', 'waktu' => '08:00']);
        JadwalSampah::create(['hari' => 'Jumat', 'waktu' => '08:00']);
    }
}
