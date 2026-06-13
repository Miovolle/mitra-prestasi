<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $fotoAsli = [
            'WhatsApp Image 2026-02-14 at 13.41.11 (1).jpeg',
            'WhatsApp Image 2026-02-14 at 13.41.11 (2).jpeg',
            'WhatsApp Image 2026-02-14 at 13.41.11.jpeg',
            'WhatsApp Image 2026-02-14 at 13.41.12 (1).jpeg',
            'WhatsApp Image 2026-02-14 at 13.41.12 (2).jpeg',
            'WhatsApp Image 2026-02-14 at 13.41.12.jpeg',
        ];

        $judul = [
            'National Coding Challenge',
            'Workshop UI/UX Design',
            'Penyerahan Hadiah Juara',
            'Science Olympiad 2025',
            'Seminar Kewirausahaan',
            'Tim Panitia Kompetisi',
        ];

        $tanggal = [
            '2026-01-15', '2025-12-10', '2025-11-20',
            '2025-10-05', '2025-09-12', '2025-08-01',
        ];

        foreach ($fotoAsli as $i => $foto) {
            Galeri::create([
                'judul'     => $judul[$i],
                'foto'      => $foto,
                'keterangan'=> $judul[$i],
                'tanggal'   => $tanggal[$i],
                'is_active' => true,
            ]);
        }
    }
}
