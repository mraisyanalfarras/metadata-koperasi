<?php

namespace Database\Seeders;

use App\Models\Geografis;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GeografisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $geografis = [
            [
                'id' => 1,
                'judul' => 'geografis Desa',
                'foto' => '/img/logo.png',
                'deskripsi' => 'Ini adalah geografis Desa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Geografis::insert($geografis);
    }
}
