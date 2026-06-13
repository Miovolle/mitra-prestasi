<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Seeder;

class LombaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // TK - Mewarnai
            [
                'nama'            => 'OLIMPIADE MEWARNAI - JENJANG TK',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi mewarnai untuk anak TK. Peserta akan diberikan gambar bertema alam dan hewan, kemudian mewarnai dengan krayon atau pensil warna. Dinilai dari kerapian, kreativitas, dan kesesuaian warna.',
                'kategori'        => 'seni',
                'tingkat'         => 'tk',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => true,
            ],
            // SD - Matematika
            [
                'nama'            => 'OLIMPIADE MATEMATIKA - JENJANG SD',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Matematika untuk siswa SD. Materi meliputi bilangan, operasi hitung, geometri dasar, dan soal cerita. Soal berbentuk pilihan ganda dan isian singkat.',
                'kategori'        => 'akademik',
                'tingkat'         => 'sd',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => true,
            ],
            // SD - Bahasa Inggris
            [
                'nama'            => 'OLIMPIADE BAHASA INGGRIS - JENJANG SD',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Bahasa Inggris untuk siswa SD. Materi meliputi vocabulary, simple grammar, reading comprehension, dan listening dasar.',
                'kategori'        => 'akademik',
                'tingkat'         => 'sd',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => false,
            ],
            // SD - Sains
            [
                'nama'            => 'OLIMPIADE SAINS - JENJANG SD',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Sains untuk siswa SD. Materi meliputi IPA dasar: makhluk hidup, lingkungan, cuaca, dan gejala alam. Soal berbentuk pilihan ganda.',
                'kategori'        => 'akademik',
                'tingkat'         => 'sd',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => false,
            ],
            // SMP - Matematika
            [
                'nama'            => 'OLIMPIADE MATEMATIKA - JENJANG SMP',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Matematika untuk siswa SMP. Materi meliputi aljabar, bilangan bulat, geometri, statistika dasar, dan pemecahan masalah.',
                'kategori'        => 'akademik',
                'tingkat'         => 'smp',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => true,
            ],
            // SMP - Bahasa Inggris
            [
                'nama'            => 'OLIMPIADE BAHASA INGGRIS - JENJANG SMP',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Bahasa Inggris untuk siswa SMP. Materi meliputi grammar, reading, writing, dan vocabulary tingkat menengah.',
                'kategori'        => 'akademik',
                'tingkat'         => 'smp',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => false,
            ],
            // SMP - Sains
            [
                'nama'            => 'OLIMPIADE SAINS - JENJANG SMP',
                'penyelenggara'   => 'Mitra Prestasi',
                'deskripsi'       => 'Kompetisi Sains untuk siswa SMP. Materi meliputi IPA terpadu: Fisika, Kimia dasar, dan Biologi tingkat SMP.',
                'kategori'        => 'akademik',
                'tingkat'         => 'smp',
                'status'          => 'open',
                'tanggal_mulai'   => '2026-07-15',
                'tanggal_selesai' => '2026-07-15',
                'lokasi'          => 'Jember',
                'hadiah'          => 'Trofi + Sertifikat + Uang Pembinaan',
                'is_featured'     => false,
            ],
        ];

        foreach ($data as $item) {
            Lomba::create($item);
        }
    }
}
