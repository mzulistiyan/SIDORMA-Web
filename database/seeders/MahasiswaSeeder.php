<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            'name' => 'Rizky Fauzan',
            'nim' => '1234567890',
            'fakultas' => 'Fakultas Teknik',
            'prodi' => 'Teknik Informatika',
            'alamat' => 'Jl. Raya Cibaduyut',
            'no_hp' => '08123456789',
            'id_gedung' => '1',
        ]);
    }
}
