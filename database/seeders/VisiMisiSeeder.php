<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visimisi = [
            [
                'id' => 1,
                'judul' => 'Sejarah Pertama',
                'deskripsi' => 'Deskripsi Sejarah Pertama.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        VisiMisi::insert($visimisi);
    }
}
