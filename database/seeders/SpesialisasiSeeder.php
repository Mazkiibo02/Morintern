<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('spesialisasi')->truncate();

        DB::table('spesialisasi')->insert([
            ['id' => 1, 'nama_spesialisasi' => 'Back End', 'deskripsi' => 'Backend Development'],
            ['id' => 2, 'nama_spesialisasi' => 'Front End', 'deskripsi' => 'Frontend Development'],
            ['id' => 3, 'nama_spesialisasi' => 'System Analyst', 'deskripsi' => 'System Analysis'],
            ['id' => 4, 'nama_spesialisasi' => 'Quality Assurance', 'deskripsi' => 'QA Testing'],
        ]);
    }
}
