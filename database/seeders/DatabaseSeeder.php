<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name'  => 'Admin Mitra Prestasi',
            'email' => 'admin@mitraprestasi.com',
        ]);

        $this->call([
            LombaSeeder::class,
            BlogSeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
