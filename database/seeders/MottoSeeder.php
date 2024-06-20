<?php

namespace Database\Seeders;

use App\Models\Motto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MottoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motto = [
            [
                'id' => 1,
                'judul' => 'Motto Desa',
                'deskripsi' => 'Ini adalah Motto Desa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Motto::insert($motto);
    }
}
