<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'aji',
            'kelas' => '11',
            'alamat' => 'kp pendeuy ',
            'tanggal lahir' =>'20-02-2008'
        ]);
    }
}
