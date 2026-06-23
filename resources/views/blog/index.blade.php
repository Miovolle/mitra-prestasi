@extends('layouts.app')
@section('title', 'Blog - Omah Sinau Semar')

@push('styles')
<style>
.blog-index-page {
    padding-top: 80px;
    min-height: 100vh;
    background: #f8fafc;
    transition: background 0.3s;
}
.blog-index-header {
    background: linear-gradient(135deg, #f0fdf4 0%, #fefce8 100%);
    padding: 60px 0 40px;
    text-align: center;
    border-bottom: 1px solid #e2e8f0;
}
.blog-index-subtitle {
    display: inline-block;
    background: #f0fdf4;
    color: #16a34a;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 6px 16px;
    border-radius: 50px;
    margin-bottom: 12px;
    border: 1px solid #bbf7d0;
}
.blog-index-title {
    font-size: 2rem;
    font-weight: 900;
    color: #1e293b;
    margin: 0;
}

.blog-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    border: 1.5px solid #e2e8f0;
    transition: all 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.blog-card:hover { transform: translateY(-4px); box-shadow: 0 8px 32px rgba(22,163,74,0.15); border-color: #16a34a; }
.blog-card.featured-post { border-color: #f59e0b; }
.blog-image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #f0fdf4;
}
.blog-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s; display: block; }
.blog-card:hover .blog-image img { transform: scale(1.05); }
.blog-category {
    position: absolute; top: 14px; left: 14px;
    background: #16a34a; color: white;
    padding: 4px 12px; border-radius: 50px;
    font-size: 0.72rem; font-weight: 700;
}
.featured-badge {
    position: absolute; top: 14px; right: 14px;
    background: #f59e0b; color: white;
    padding: 4px 12px; border-radius: 50px;
    font-size: 0.72rem; font-weight: 700;
}
.blog-content { padding: 20px; flex: 1; display: flex; flex-direction: column; }
.blog-meta {
    display: flex; gap: 14px;
    font-size: 0.78rem; color: #64748b;
    margin-bottom: 10px; flex-wrap: wrap;
}
.blog-title { font-size: 1rem; font-weight: 800; line-height: 1.4; margin-bottom: 10px; }
.blog-title a { color: #1e293b; text-decoration: none; transition: color 0.2s; }
.blog-title a:hover { color: #16a34a; }
.blog-excerpt { color: #64748b; font-size: 0.88rem; line-height: 1.6; margin-bottom: 16px; flex: 1; }
.blog-read-more {
    display: inline-flex; align-items: center; gap: 6px;
    color: #16a34a; font-size: 0.85rem; font-weight: 700;
    text-decoration: none; margin-top: auto; transition: gap 0.2s;
}
.blog-read-more:hover { gap: 10px; }

/* Pagination */
.pagination { gap: 4px; }
.page-link {
    border-radius: 8px !important;
    border: 1.5px solid #e2e8f0;
    color: #16a34a;
    font-weight: 600;
    padding: 8px 14px;
    transition: all 0.2s;
}
.page-link:hover { background: #f0fdf4; border-color: #16a34a; color: #16a34a; }
.page-item.active .page-link { background: #16a34a; border-color: #16a34a; color: white; }
.page-item.disabled .page-link { color: #cbd5e1; border-color: #e2e8f0; }

/* DARK MODE */
[data-theme="dark"] .blog-index-page { background: #0f172a; }
[data-theme="dark"] .blog-index-header { background: linear-gradient(135deg, #0f172a, #1e293b); border-color: #334155; }
[data-theme="dark"] .blog-index-subtitle { background: rgba(22,163,74,0.15); border-color: #334155; }
[data-theme="dark"] .blog-index-title { color: #f1f5f9; }
[data-theme="dark"] .blog-card { background: #1e293b; border-color: #334155; }
[data-theme="dark"] .blog-card:hover { border-color: #16a34a; box-shadow: 0 8px 32px rgba(22,163,74,0.2); }
[data-theme="dark"] .blog-card.featured-post { border-color: #d97706; }
[data-theme="dark"] .blog-image { background: #0f172a; }
[data-theme="dark"] .blog-title a { color: #f1f5f9; }
[data-theme="dark"] .blog-excerpt { color: #94a3b8; }
[data-theme="dark"] .blog-meta { color: #64748b; }
[data-theme="dark"] .page-link { background: #1e293b; border-color: #334155; color: #4ade80; }
[data-theme="dark"] .page-link:hover { background: rgba(22,163,74,0.15); border-color: #16a34a; }
[data-theme="dark"] .page-item.active .page-link { background: #16a34a; border-color: #16a34a; color: white; }
[data-theme="dark"] .page-item.disabled .page-link { color: #334155; border-color: #1e293b; background: #1e293b; }
</style>
@endpush

@section('content')
<div class="blog-index-page">
    <div class="blog-index-header">
        <span class="blog-index-subtitle">Tips & Artikel</span>
        <h2 class="blog-index-title">Blog Omah Sinau Semar</h2>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            @forelse($blogs as $artikel)
                <div class="col-lg-4 col-md-6">
                    <article class="blog-card {{ $artikel->is_featured ? 'featured-post' : '' }}">
                        <div class="blog-image">
                            <img src="{{ $artikel->thumbnail_url }}" alt="{{ $artikel->judul }}"
                                 onerror="this.src='https://placehold.co/400x200/f0fdf4/16a34a?text=Omah+Sinau+Semar'">
                            <div class="blog-category">{{ $artikel->kategori }}</div>
                            @if($artikel->is_featured)
                                <div class="featured-badge"><i class="bi bi-star-fill"></i> Featured</div>
                            @endif
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $artikel->created_at->format('d M Y') }}</span>
                                <span><i class="bi bi-eye"></i> {{ number_format($artikel->views) }}</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="{{ route('blog.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                            </h3>
                            <p class="blog-excerpt">{{ $artikel->excerpt }}</p>
                            <a href="{{ route('blog.show', $artikel->slug) }}" class="blog-read-more">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-x" style="font-size:3rem;color:#bbf7d0;"></i>
                    <p class="mt-3" style="color:#94a3b8;">Belum ada artikel.</p>
                </div>
            @endforelse
        </div>

        @if($blogs->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection