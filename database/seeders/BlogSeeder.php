<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // ── TK ──────────────────────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Mewarnai & Kreativitas untuk TK',
                'slug'        => 'contoh-soal-mewarnai-kreativitas-tk',
                'kategori'    => 'TK - Mewarnai',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => false,
                'views'       => 320,
                'isi'         => '
<p>Berikut ini adalah contoh panduan dan kriteria penilaian lomba mewarnai untuk jenjang TK dalam Olimpiade Mitra Prestasi.</p>

<h4>📌 Ketentuan Umum</h4>
<ul>
  <li>Peserta membawa krayon atau pensil warna sendiri</li>
  <li>Gambar disediakan oleh panitia (tema: hewan dan alam)</li>
  <li>Waktu pengerjaan: <strong>45 menit</strong></li>
</ul>

<h4>🎨 Kriteria Penilaian</h4>
<ul>
  <li><strong>Kerapian (40%)</strong> — Tidak keluar garis, warna merata</li>
  <li><strong>Kreativitas (35%)</strong> — Kombinasi warna menarik dan unik</li>
  <li><strong>Kebersihan (25%)</strong> — Kertas bersih, tidak kusut</li>
</ul>

<h4>🖍️ Contoh Tema Gambar</h4>
<p>Tema yang biasa digunakan:</p>
<ul>
  <li>Pemandangan gunung dan sawah</li>
  <li>Hewan peliharaan (kucing, kelinci, ikan)</li>
  <li>Bunga dan taman bermain</li>
</ul>

<h4>💡 Tips untuk Orang Tua</h4>
<ul>
  <li>Latihkan anak mewarnai dalam garis setiap hari minimal 10 menit</li>
  <li>Kenalkan kombinasi warna dasar (merah+kuning=oranye, dll)</li>
  <li>Beri semangat, bukan tekanan — yang penting anak senang!</li>
</ul>',
            ],

            // ── SD - MATEMATIKA ─────────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Matematika SD – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-matematika-sd-olimpiade',
                'kategori'    => 'SD - Matematika',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => true,
                'views'       => 1540,
                'isi'         => '
<p>Berikut contoh soal Matematika untuk siswa SD yang sering muncul dalam olimpiade tingkat dasar.</p>

<h4>📝 Soal Pilihan Ganda</h4>

<p><strong>1.</strong> Hasil dari 125 × 8 = ...</p>
<p>a) 900 &nbsp; b) 1.000 &nbsp; c) 1.100 &nbsp; <strong>d) 1.000 ✓</strong></p>

<p><strong>2.</strong> Sebuah persegi panjang memiliki panjang 12 cm dan lebar 7 cm. Berapa kelilingnya?</p>
<p>a) 84 cm &nbsp; b) 28 cm &nbsp; <strong>c) 38 cm ✓</strong> &nbsp; d) 42 cm</p>

<p><strong>3.</strong> Bilangan prima antara 10 dan 20 adalah ...</p>
<p>a) 11, 13, 15, 17 &nbsp; <strong>b) 11, 13, 17, 19 ✓</strong> &nbsp; c) 12, 14, 16, 18 &nbsp; d) 11, 15, 17, 19</p>

<h4>📝 Soal Isian Singkat</h4>

<p><strong>4.</strong> KPK dari 6 dan 8 adalah <strong>24</strong></p>
<p><strong>5.</strong> FPB dari 24 dan 36 adalah <strong>12</strong></p>
<p><strong>6.</strong> 3/4 + 1/2 = <strong>5/4 atau 1¼</strong></p>

<h4>📝 Soal Cerita</h4>
<p><strong>7.</strong> Ibu membeli 3 lusin telur. Sudah dipakai 15 butir. Sisa telur ibu ada berberapa butir?</p>
<p><em>Jawaban: 3 × 12 = 36 butir. 36 − 15 = <strong>21 butir</strong></em></p>

<p><strong>8.</strong> Jarak rumah Andi ke sekolah 2,5 km. Jika Andi pergi dan pulang sekolah setiap hari, berapa km jarak yang ditempuh dalam 5 hari?</p>
<p><em>Jawaban: 2,5 × 2 × 5 = <strong>25 km</strong></em></p>

<h4>💡 Materi yang Perlu Dikuasai</h4>
<ul>
  <li>Operasi hitung campuran (×, ÷, +, −)</li>
  <li>KPK dan FPB</li>
  <li>Pecahan dan desimal</li>
  <li>Keliling dan luas bangun datar</li>
  <li>Soal cerita kontekstual</li>
</ul>',
            ],

            // ── SD - BAHASA INGGRIS ─────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Bahasa Inggris SD – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-bahasa-inggris-sd-olimpiade',
                'kategori'    => 'SD - Bahasa Inggris',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => false,
                'views'       => 980,
                'isi'         => '
<p>Latihan soal Bahasa Inggris SD untuk persiapan Olimpiade Mitra Prestasi. Materi mencakup vocabulary, grammar dasar, dan reading.</p>

<h4>📝 Vocabulary – Choose the correct answer!</h4>

<p><strong>1.</strong> The opposite of "hot" is ...</p>
<p>a) warm &nbsp; <strong>b) cold ✓</strong> &nbsp; c) cool &nbsp; d) wet</p>

<p><strong>2.</strong> "Butterfly" in Indonesian means ...</p>
<p>a) Lebah &nbsp; b) Capung &nbsp; <strong>c) Kupu-kupu ✓</strong> &nbsp; d) Ulat</p>

<p><strong>3.</strong> Which one is a fruit?</p>
<p>a) Carrot &nbsp; b) Spinach &nbsp; <strong>c) Mango ✓</strong> &nbsp; d) Potato</p>

<h4>📝 Grammar – Fill in the blank!</h4>

<p><strong>4.</strong> She ___ a student. → <strong>is</strong></p>
<p><strong>5.</strong> They ___ playing football now. → <strong>are</strong></p>
<p><strong>6.</strong> I ___ my homework yesterday. → <strong>did</strong></p>

<h4>📝 Reading Comprehension</h4>
<p><em>Read the text below:</em></p>
<blockquote style="background:#f0f4ff;border-left:4px solid #3b82f6;padding:1rem;border-radius:4px;">
Budi is a student. He is 10 years old. He goes to school every day. His favourite subject is Mathematics. He has two brothers and one sister.
</blockquote>

<p><strong>7.</strong> How old is Budi? → <strong>He is 10 years old.</strong></p>
<p><strong>8.</strong> What is his favourite subject? → <strong>Mathematics.</strong></p>
<p><strong>9.</strong> How many siblings does he have? → <strong>Three (2 brothers and 1 sister).</strong></p>

<h4>💡 Tips Belajar</h4>
<ul>
  <li>Hafalkan 5 kosakata baru setiap hari</li>
  <li>Latihan membaca teks pendek dan menjawab pertanyaannya</li>
  <li>Perhatikan penggunaan is/am/are dan was/were</li>
</ul>',
            ],

            // ── SD - SAINS ──────────────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Sains SD – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-sains-sd-olimpiade',
                'kategori'    => 'SD - Sains',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => false,
                'views'       => 760,
                'isi'         => '
<p>Contoh soal Sains (IPA) untuk siswa SD dalam rangka persiapan Olimpiade Mitra Prestasi.</p>

<h4>📝 Soal Pilihan Ganda</h4>

<p><strong>1.</strong> Proses tumbuhan membuat makanan sendiri dengan bantuan cahaya matahari disebut ...</p>
<p>a) Respirasi &nbsp; <strong>b) Fotosintesis ✓</strong> &nbsp; c) Evaporasi &nbsp; d) Reproduksi</p>

<p><strong>2.</strong> Hewan berikut yang termasuk mamalia adalah ...</p>
<p>a) Ular &nbsp; b) Katak &nbsp; <strong>c) Lumba-lumba ✓</strong> &nbsp; d) Buaya</p>

<p><strong>3.</strong> Benda yang dapat menghantarkan listrik disebut ...</p>
<p><strong>a) Konduktor ✓</strong> &nbsp; b) Isolator &nbsp; c) Semikonduktor &nbsp; d) Reaktor</p>

<p><strong>4.</strong> Planet yang paling dekat dengan Matahari adalah ...</p>
<p><strong>a) Merkurius ✓</strong> &nbsp; b) Venus &nbsp; c) Bumi &nbsp; d) Mars</p>

<h4>📝 Soal Isian Singkat</h4>
<p><strong>5.</strong> Bagian tumbuhan yang berfungsi menyerap air dan mineral dari tanah adalah <strong>akar</strong></p>
<p><strong>6.</strong> Perubahan air menjadi uap air karena panas disebut <strong>penguapan / evaporasi</strong></p>
<p><strong>7.</strong> Hewan yang mengalami metamorfosis sempurna contohnya adalah <strong>kupu-kupu / katak</strong></p>

<h4>💡 Materi Penting yang Harus Dikuasai</h4>
<ul>
  <li>Bagian-bagian tumbuhan dan fungsinya</li>
  <li>Rantai makanan dan ekosistem</li>
  <li>Sifat benda (padat, cair, gas)</li>
  <li>Tata surya dan planet</li>
  <li>Energi dan perubahannya</li>
</ul>',
            ],

            // ── SMP - MATEMATIKA ────────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Matematika SMP – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-matematika-smp-olimpiade',
                'kategori'    => 'SMP - Matematika',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => true,
                'views'       => 2100,
                'isi'         => '
<p>Kumpulan contoh soal Matematika SMP untuk persiapan olimpiade. Materi mencakup aljabar, geometri, dan statistika.</p>

<h4>📝 Aljabar</h4>

<p><strong>1.</strong> Jika 3x − 7 = 14, maka nilai x adalah ...</p>
<p><em>Penyelesaian: 3x = 21 → x = <strong>7</strong></em></p>

<p><strong>2.</strong> Hasil dari (2x + 3)(x − 5) = ...</p>
<p><em>Penyelesaian: 2x² − 10x + 3x − 15 = <strong>2x² − 7x − 15</strong></em></p>

<p><strong>3.</strong> Himpunan penyelesaian dari 2x + 1 > 9 untuk x bilangan bulat adalah ...</p>
<p><em>Jawaban: 2x > 8 → x > 4 → HP = <strong>{5, 6, 7, ...}</strong></em></p>

<h4>📝 Geometri</h4>

<p><strong>4.</strong> Sebuah lingkaran memiliki jari-jari 14 cm. Luas lingkaran tersebut adalah ... (π = 22/7)</p>
<p><em>Jawaban: π × r² = 22/7 × 196 = <strong>616 cm²</strong></em></p>

<p><strong>5.</strong> Sebuah tabung memiliki jari-jari 7 cm dan tinggi 10 cm. Volume tabung adalah ...</p>
<p><em>Jawaban: π × r² × t = 22/7 × 49 × 10 = <strong>1.540 cm³</strong></em></p>

<h4>📝 Statistika</h4>

<p><strong>6.</strong> Data nilai ulangan: 70, 80, 75, 90, 65, 80, 85. Hitunglah mean, median, dan modus!</p>
<ul>
  <li>Mean: (70+80+75+90+65+80+85) / 7 = 545/7 = <strong>77,86</strong></li>
  <li>Data urut: 65, 70, 75, 80, 80, 85, 90 → Median = <strong>80</strong></li>
  <li>Modus = <strong>80</strong> (muncul 2 kali)</li>
</ul>

<h4>💡 Strategi Mengerjakan Soal Olimpiade</h4>
<ul>
  <li>Kerjakan soal yang paling mudah terlebih dahulu</li>
  <li>Tulis langkah-langkah penyelesaian dengan rapi</li>
  <li>Cek kembali jawaban sebelum waktu habis</li>
  <li>Latihan soal OSN tahun-tahun sebelumnya</li>
</ul>',
            ],

            // ── SMP - BAHASA INGGRIS ────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Bahasa Inggris SMP – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-bahasa-inggris-smp-olimpiade',
                'kategori'    => 'SMP - Bahasa Inggris',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => false,
                'views'       => 1350,
                'isi'         => '
<p>Latihan soal Bahasa Inggris tingkat SMP untuk persiapan olimpiade. Mencakup grammar, reading, dan writing.</p>

<h4>📝 Grammar</h4>

<p><strong>1.</strong> She has been studying English ___ three years.</p>
<p>a) since &nbsp; <strong>b) for ✓</strong> &nbsp; c) during &nbsp; d) while</p>

<p><strong>2.</strong> If it ___ tomorrow, we will cancel the trip.</p>
<p><strong>a) rains ✓</strong> &nbsp; b) rained &nbsp; c) will rain &nbsp; d) is raining</p>

<p><strong>3.</strong> The book ___ on the table belongs to my sister.</p>
<p>a) lie &nbsp; b) lain &nbsp; <strong>c) lying ✓</strong> &nbsp; d) laid</p>

<h4>📝 Reading Comprehension</h4>
<blockquote style="background:#f0f4ff;border-left:4px solid #3b82f6;padding:1rem;border-radius:4px;">
<strong>Deforestation</strong><br>
Deforestation is one of the biggest environmental problems in the world. Every year, millions of hectares of forests are cut down for farming, logging, and urban development. This causes many animals to lose their habitats and contributes to global warming. Scientists warn that if this continues, many species will become extinct within the next century.
</blockquote>

<p><strong>4.</strong> What is the main idea of the text?</p>
<p><em>→ <strong>Deforestation is a serious environmental problem that causes habitat loss and global warming.</strong></em></p>

<p><strong>5.</strong> What are the causes of deforestation mentioned in the text?</p>
<p><em>→ <strong>Farming, logging, and urban development.</strong></em></p>

<h4>📝 Vocabulary in Context</h4>
<p><strong>6.</strong> The word "extinct" (paragraph 1) is closest in meaning to ...</p>
<p>a) endangered &nbsp; <strong>b) no longer existing ✓</strong> &nbsp; c) protected &nbsp; d) discovered</p>

<h4>💡 Tips Sukses</h4>
<ul>
  <li>Baca teks dengan cermat sebelum menjawab pertanyaan</li>
  <li>Kuasai tenses (Simple, Continuous, Perfect)</li>
  <li>Perbanyak kosakata akademik setiap hari</li>
</ul>',
            ],

            // ── SMP - SAINS ─────────────────────────────────────────────────
            [
                'judul'       => 'Contoh Soal Sains SMP – Olimpiade Mitra Prestasi',
                'slug'        => 'contoh-soal-sains-smp-olimpiade',
                'kategori'    => 'SMP - Sains',
                'penulis'     => 'Admin Mitra Prestasi',
                'is_featured' => false,
                'views'       => 890,
                'isi'         => '
<p>Contoh soal IPA terpadu (Fisika, Kimia, Biologi) untuk siswa SMP dalam persiapan olimpiade.</p>

<h4>📝 Biologi</h4>

<p><strong>1.</strong> Organel sel yang berfungsi sebagai pusat pengendali seluruh kegiatan sel adalah ...</p>
<p>a) Mitokondria &nbsp; <strong>b) Nukleus ✓</strong> &nbsp; c) Ribosom &nbsp; d) Vakuola</p>

<p><strong>2.</strong> Proses pencernaan protein dimulai di organ ...</p>
<p>a) Mulut &nbsp; <strong>b) Lambung ✓</strong> &nbsp; c) Usus halus &nbsp; d) Usus besar</p>

<h4>📝 Fisika</h4>

<p><strong>3.</strong> Sebuah benda bermassa 5 kg dikenai gaya sebesar 20 N. Berapa percepatan benda tersebut?</p>
<p><em>Penyelesaian: F = m × a → a = F/m = 20/5 = <strong>4 m/s²</strong></em></p>

<p><strong>4.</strong> Sebuah lampu memiliki daya 60 W dan digunakan selama 4 jam. Berapa energi listrik yang terpakai?</p>
<p><em>Jawaban: W = P × t = 60 × 4 = <strong>240 Wh = 0,24 kWh</strong></em></p>

<h4>📝 Kimia</h4>

<p><strong>5.</strong> Zat berikut yang termasuk campuran homogen adalah ...</p>
<p>a) Pasir dan air &nbsp; <strong>b) Larutan gula ✓</strong> &nbsp; c) Minyak dan air &nbsp; d) Tanah</p>

<p><strong>6.</strong> Perubahan berikut yang termasuk perubahan kimia adalah ...</p>
<p>a) Es mencair &nbsp; b) Kayu dipotong &nbsp; <strong>c) Besi berkarat ✓</strong> &nbsp; d) Air mendidih</p>

<h4>💡 Strategi Belajar Sains</h4>
<ul>
  <li>Pahami konsep, jangan hanya hafal rumus</li>
  <li>Latihan menghitung dengan satuan yang benar</li>
  <li>Pelajari diagram/gambar struktur sel, organ, dll</li>
  <li>Kerjakan soal dari berbagai sumber olimpiade</li>
</ul>',
            ],
        ];

        foreach ($data as $item) {
            Blog::create($item);
        }
    }
}
