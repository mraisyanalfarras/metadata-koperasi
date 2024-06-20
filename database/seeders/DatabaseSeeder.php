<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MottoSeeder;
use Database\Seeders\SejarahSeeder;
use Database\Seeders\StrukturSeeder;
use Database\Seeders\VisiMisiSeeder;
use Database\Seeders\GeografisSeeder;
use Database\Seeders\IdentitasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GeografisSeeder::class,
            IdentitasSeeder::class,
            MottoSeeder::class,
            SejarahSeeder::class,
            StrukturSeeder::class,
            UserSeeder::class,
            VisiMisiSeeder::class,
        ]);
    }
}
