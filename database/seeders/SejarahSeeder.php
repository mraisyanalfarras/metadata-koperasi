<?php

namespace Database\Seeders;

use App\Models\Sejarah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SejarahSeeder extends Seeder
{
    public function run(): void
    {
        $sejarah = [
            [
                'id' => 1,
                'judul' => 'sejarah Desa',
                'foto' => '/img/logo.png',
                'deskripsi' => 'Ini adalah sejarah Desa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Sejarah::insert($sejarah);
    }
}
