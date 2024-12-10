<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        // Isi tabel dengan data
        DB::table('kelas')->insert([
            [
                'nama' => 'Ahmad Fauzan',
                'kelas' => 'XII IPA 1',
                'alamat' => 'Jl. Merdeka No. 10',
                'tanggal_lahir' => '2005-03-21',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aisyah',
                'kelas' => 'XII IPS 2',
                'alamat' => 'Jl. Sudirman No. 23',
                'tanggal_lahir' => '2006-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'kelas' => 'XII IPA 3',
                'alamat' => 'Jl. Pahlawan No. 45',
                'tanggal_lahir' => '2004-12-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
