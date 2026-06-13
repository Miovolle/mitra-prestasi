@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="hero-bg-orbs">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <div class="container">
        <div class="row align-items-center min-vh-100 position-relative">
            <div class="col-lg-6 hero-content" data-aos="fade-right">
                <div class="hero-badge">
                    <i class="bi bi-stars me-2"></i><span>Selamat Datang</span>
                </div>
                <h1 class="hero-title">Halo, Sahabat <span class="text-gradient">Juara!</span></h1>
                <p class="hero-description">
                    Platform resmi <strong>Mitra Prestasi</strong>. Temukan informasi lomba
                    terbaru, panduan lengkap, dan raih prestasimu bersama kami.
                </p>
                <div class="hero-quote-box">
                    <div class="quote-icon">"</div>
                    <p class="hero-quote">Berjuang dalam Belajar Tanpa Batas Waktu!</p>
                </div>
                <div class="hero-cta" data-aos="fade-up" data-aos-delay="300">
                    <a href="#lomba" class="btn btn-primary btn-lg hero-button">
                        <span>Lihat Lomba</span><i class="bi bi-arrow-down-circle ms-2"></i>
                    </a>
                    <a href="#profil" class="btn btn-outline-primary btn-lg">
                        <span>Tentang Kami</span>
                    </a>
                </div>
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <div class="stat-number">{{ $stats['peserta'] ?: '500' }}+</div>
                        <div class="stat-label">Peserta Aktif</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $stats['lomba'] ?: '100' }}+</div>
                        <div class="stat-label">Lomba Tersedia</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $stats['pemenang'] ?: '50' }}+</div>
                        <div class="stat-label">Pemenang</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center hero-mascot" data-aos="fade-left">
                <div class="mascot-container">
                    <div class="mascot-glow"></div>
                    <img src="{{ asset('image/WhatsApp_Image_2026-02-16_at_14.55.36-removebg-preview.png') }}" alt="Mitra Prestasi Mascot" class="hero-image">
                    <div class="floating-elements">
                        <div class="float-item trophy"><i class="bi bi-trophy-fill"></i></div>
                        <div class="float-item star"><i class="bi bi-star-fill"></i></div>
                        <div class="float-item medal"><i class="bi bi-award-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="mouse"><div class="wheel"></div></div>
    </div>
</section>

<!-- GALERI SECTION -->
<section class="gallery-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Dokumentasi</span>
            <h2 class="section-title">Galeri Kegiatan Kami</h2>
            <p class="section-description">Momen-momen berharga dari berbagai kompetisi dan kegiatan yang telah kami selenggarakan</p>
        </div>

        {{-- Grid Foto --}}
        <div class="gallery-grid" data-aos="fade-up" data-aos-delay="150">
            @forelse($galeri as $foto)
                <div class="gallery-item" onclick="openLightbox({{ $loop->index }})" data-aos="zoom-in" data-aos-delay="{{ ($loop->index % 6) * 80 }}">
                    <img src="{{ $foto->foto_url }}" alt="{{ $foto->judul }}" loading="lazy">
                    <div class="gallery-item-overlay">
                        <div class="gallery-item-info">
                            <div class="gallery-item-icon"><i class="bi bi-zoom-in"></i></div>
                            <h5>{{ $foto->judul }}</h5>
                            @if($foto->tanggal)
                                <p><i class="bi bi-calendar3 me-1"></i>{{ $foto->tanggal->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada foto.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- LIGHTBOX --}}
<div id="lightbox" class="lightbox-overlay" onclick="closeLightbox()">
    <button class="lightbox-close" onclick="closeLightbox()"><i class="bi bi-x-lg"></i></button>
    <button class="lightbox-prev" onclick="event.stopPropagation(); prevPhoto()"><i class="bi bi-chevron-left"></i></button>
    <button class="lightbox-next" onclick="event.stopPropagation(); nextPhoto()"><i class="bi bi-chevron-right"></i></button>
    <div class="lightbox-content" onclick="event.stopPropagation()">
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-caption">
            <h5 id="lightboxTitle"></h5>
            <p id="lightboxDate"></p>
        </div>
    </div>
    <div class="lightbox-counter"><span id="lightboxCurrent">1</span> / <span id="lightboxTotal">1</span></div>
</div>

@php
$galeriJson = $galeri->map(fn($f) => [
    'src'   => $f->foto_url,
    'judul' => $f->judul,
    'tgl'   => $f->tanggal ? $f->tanggal->format('d M Y') : '',
])->values()->toJson();
@endphp

@push('scripts')
<script>
const photos = {!! $galeriJson !!};
let current = 0;

function openLightbox(index) {
    current = index;
    updateLightbox();
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}
function prevPhoto() {
    current = (current - 1 + photos.length) % photos.length;
    updateLightbox();
}
function nextPhoto() {
    current = (current + 1) % photos.length;
    updateLightbox();
}
function updateLightbox() {
    const p = photos[current];
    const img = document.getElementById('lightboxImg');
    img.style.opacity = 0;
    setTimeout(() => {
        img.src = p.src;
        img.onload = () => { img.style.opacity = 1; };
    }, 150);
    document.getElementById('lightboxTitle').textContent = p.judul;
    document.getElementById('lightboxDate').textContent = p.tgl;
    document.getElementById('lightboxCurrent').textContent = current + 1;
    document.getElementById('lightboxTotal').textContent = photos.length;
}
document.addEventListener('keydown', e => {
    if (!document.getElementById('lightbox').classList.contains('active')) return;
    if (e.key === 'ArrowLeft')  prevPhoto();
    if (e.key === 'ArrowRight') nextPhoto();
    if (e.key === 'Escape')     closeLightbox();
});
</script>
@endpush

<!-- COMPETITION SECTION -->
<section class="competition-section" id="lomba">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Lomba Terbaru</span>
            <h2 class="section-title">Daftar Kompetisi</h2>
            <p class="section-description">Pilih kompetisi yang sesuai dengan minat dan bakatmu.</p>
        </div>
        <div class="competition-filters" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-btn active" data-filter="all"><i class="bi bi-grid-3x3-gap-fill me-2"></i>Semua</button>
            <button class="filter-btn" data-filter="open"><i class="bi bi-unlock-fill me-2"></i>Terbuka</button>
            <button class="filter-btn" data-filter="closed"><i class="bi bi-lock-fill me-2"></i>Ditutup</button>
            <button class="filter-btn" data-filter="coming"><i class="bi bi-clock-fill me-2"></i>Segera</button>
            <button class="filter-btn" data-filter="coming"><i class="bi bi-clock-fill me-2"></i>Segera</button>
        </div>
        <div class="row g-4 mt-4" id="competitionGrid">
            @forelse($lomba as $item)
                <div class="col-lg-4 col-md-6 competition-item" data-status="{{ $item->tingkat }}" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                    <div class="competition-card">
                        <div class="competition-header">
                            <div class="competition-pattern"></div>
                            <h3 class="competition-brand">{{ Str::upper($item->penyelenggara) }}</h3>
                        </div>
                        <div class="competition-body">
                            <h4 class="competition-title">{{ $item->nama }}</h4>
                            <p class="competition-category">
                                <i class="bi bi-tag-fill me-2"></i>{{ ucfirst($item->kategori ?? 'Umum') }}
                            </p>
                            <div class="competition-meta">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-event"></i>
                                    <span>{{ $item->tanggal_format }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>{{ $item->lokasi ?? 'Online' }}</span>
                                </div>
                            </div>
                            <div class="competition-footer">
                                <div class="status-badge {{ $item->status_class }}">
                                    <i class="bi bi-check-circle-fill me-2"></i>{{ $item->status_label }}
                                </div>
                                <a href="{{ route('lomba.show', $item) }}" class="btn-detail">
                                    Detail <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-trophy" style="font-size:3rem;color:#ccc;"></i>
                    <p class="mt-3 text-muted">Belum ada lomba yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- BLOG SECTION -->
<section class="blog-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-subtitle">Tips & Artikel</span>
            <h2 class="section-title">Blog Mitra Prestasi</h2>
            <p class="section-description">Tips, trik, dan panduan untuk membantu kamu sukses dalam kompetisi</p>
        </div>
        <div class="row g-4 mt-5">
            @foreach($blog as $artikel)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}">
                    <article class="blog-card {{ $artikel->is_featured ? 'featured-post' : '' }}">
                        <div class="blog-image">
                            <img src="{{ $artikel->thumbnail_url }}" alt="{{ $artikel->judul }}">
                            <div class="blog-category">{{ $artikel->kategori }}</div>
                            @if($artikel->is_featured)
                                <div class="featured-badge"><i class="bi bi-star-fill"></i> Featured</div>
                            @endif
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="bi bi-calendar3 me-1"></i> {{ $artikel->created_at->format('d M Y') }}</span>
                                <span><i class="bi bi-eye me-1"></i> {{ number_format($artikel->views) }} views</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="{{ route('blog.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                            </h3>
                            <p class="blog-excerpt">{{ $artikel->excerpt }}</p>
                            <a href="{{ route('blog.show', $artikel->slug) }}" class="blog-read-more">
                                Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-journal-text me-2"></i>Lihat Semua Artikel
            </a>
        </div>
    </div>
</section>

<!-- PROFIL SECTION -->
<section class="profil-section" id="profil">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="profil-image-wrapper">
                    <div class="profil-image-bg"></div>
                    <img src="{{ asset('image/WhatsApp Image 2026-02-16 at 14.55.36 (1).jpeg') }}" alt="Founder" class="profil-image">
                    <div class="profil-pattern"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="section-subtitle" data-aos="fade-up">Tentang Kami</span>
                <h2 class="section-title mb-4" data-aos="fade-up" data-aos-delay="100">Profil Mitra Prestasi</h2>
                <p class="profil-text">
                    Mitra Prestasi merupakan platform penyelenggara kompetisi edukatif
                    yang berkomitmen untuk mendukung generasi muda Indonesia dalam
                    mengembangkan potensi dan meraih prestasi terbaiknya.
                </p>
                <p class="profil-text">
                    Kami percaya bahwa setiap individu memiliki bakat unik yang perlu
                    diasah melalui kompetisi yang berkualitas dan berstandar tinggi.
                </p>
                <div class="legal-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="legal-icon-wrapper"><i class="bi bi-file-earmark-text-fill"></i></div>
                    <div class="legal-content">
                        <div class="legal-label">Nomor Legalitas</div>
                        <div class="legal-number">AHU-0002273.AH.01.04 Tahun 2026</div>
                    </div>
                    <div class="verified-badge"><i class="bi bi-patch-check-fill"></i></div>
                </div>
                <div class="profil-mission" data-aos="fade-up" data-aos-delay="300">
                    <h4>Visi & Misi</h4>
                    <ul>
                        <li><i class="bi bi-check-circle-fill me-2"></i>Menjadi platform kompetisi edukatif terdepan di Indonesia</li>
                        <li><i class="bi bi-check-circle-fill me-2"></i>Memfasilitasi generasi muda untuk berkembang dan berprestasi</li>
                        <li><i class="bi bi-check-circle-fill me-2"></i>Menciptakan ekosistem kompetisi yang fair dan transparan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KONTAK SECTION -->
<section class="kontak-section" id="kontak">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-subtitle">Get In Touch</span>
                <h2 class="section-title mb-4">Kontak Kami</h2>
                <p class="kontak-description">Punya pertanyaan atau ingin berkolaborasi? Jangan ragu untuk menghubungi kami.</p>
                <div class="contact-info">
                    <div class="contact-item" data-aos="fade-right">
                        <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="contact-detail">
                            <div class="contact-label">Alamat</div>
                            <div class="contact-value">Jl. Kalisetail Genteng Banyuwangi</div>
                        </div>
                    </div>
                    <div class="contact-item" data-aos="fade-right">
                        <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div class="contact-detail">
                            <div class="contact-label">Email</div>
                            <div class="contact-value">info@mitraprestasi.com</div>
                        </div>
                    </div>
                    <div class="contact-item" data-aos="fade-right">
                        <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div class="contact-detail">
                            <div class="contact-label">Telepon</div>
                            <div class="contact-value">+62 812-3456-7890</div>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" class="social-link whatsapp"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="social-link instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-link youtube"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-link email"><i class="bi bi-envelope-fill"></i></a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-form-wrapper" data-aos="fade-left">
                    <form class="contact-form">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="nama@email.com">
                        </div>
                        <div class="form-group">
                            <label>Subjek</label>
                            <input type="text" class="form-control" placeholder="Topik pesan Anda">
                        </div>
                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send-fill me-2"></i>Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand" data-aos="fade-up">

                    <i class="bi bi-trophy-fill" style="font-size:2rem;color:var(--primary-color);"></i>
                    <h3>Mitra Prestasi</h3>
                </div>
                <p class="footer-description">
                    Platform kompetisi edukatif terpercaya untuk generasi muda Indonesia.
                </p>
            </div>
            <div class="col-lg-2 col-md-4">
                <h4 class="footer-title">Menu</h4>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#lomba">Lomba</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="#profil">Profil</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h4 class="footer-title">Kategori Lomba</h4>
                <ul class="footer-links">
                    <li><a href="#">Akademik</a></li>
                    <li><a href="#">Seni & Budaya</a></li>
                    <li><a href="#">Olahraga</a></li>
                    <li><a href="#">Teknologi</a></li>
                </ul>
            </div>

        </div>
        <hr class="footer-divider">
        <div class="footer-bottom">
            <p class="copyright">© {{ date('Y') }} Mitra Prestasi. All Rights Reserved.</p>
        </div>
    </div>
</footer>

@endsection

@push('scripts')
<script>
    // Competition Filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.competition-item').forEach(item => {
                if (filter === 'all' || item.getAttribute('data-status') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
