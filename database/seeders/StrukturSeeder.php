<?php

namespace Database\Seeders;

use App\Models\Struktur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $struktur = [
            [
                'id' => 1,
                'judul' => 'struktur Desa',
                'foto' => '/img/logo.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Struktur::insert($struktur);
    }
}
