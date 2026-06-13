@extends('layouts.app')
@section('title', 'Blog - Mitra Prestasi')
@section('content')
<div style="padding-top:80px;min-height:100vh;background:#f8fafc;">
<div class="container py-5">
    <div class="section-header text-center mb-5">
        <span class="section-subtitle">Tips & Artikel</span>
        <h2 class="section-title">Blog Mitra Prestasi</h2>
    </div>
    <div class="row g-4">
        @forelse($blogs as $artikel)
            <div class="col-lg-4 col-md-6">
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
                            <span><i class="bi bi-eye me-1"></i> {{ number_format($artikel->views) }}</span>
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
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-journal-x" style="font-size:3rem;color:#ccc;"></i>
                <p class="mt-3 text-muted">Belum ada artikel.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-4 d-flex justify-content-center">{{ $blogs->links() }}</div>
</div>
</div>
@endsection
