<?php

namespace Database\Seeders;

use App\Models\Identitas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $identitas = [
            [
                'id' => 1,
                'nama_desa' => 'Bukit Agung',
                'hari_kerja' => 'Senin-Jumat',
                'jam_kerja' => '08.00-15.00',
                'no_hp' => '08645737262',
                'email' => 'desa1@gmail.com',
                'link_fb' => 'https://www.facebook.com/yourpage',
                'link_twit' => 'https://twitter.com/yourpage',
                'link_ig' => 'https://www.instagram.com/yourpage',
                'logo' => '/img/logo.png',
                'maps' => 'https://maps.google.com/maps?q=lokasi_sekolah1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Identitas::insert($identitas);
    }
}
