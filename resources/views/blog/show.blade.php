@extends('layouts.app')
@section('title', $blog->judul . ' - Omah Sinau Semar')

@push('styles')
<style>
.blog-page {
    padding-top: 80px;
    min-height: 100vh;
    background: #f8fafc;
    transition: background 0.3s;
}
.blog-main-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}
.blog-main-card .card-img-top {
    max-height: 400px;
    object-fit: cover;
    width: 100%;
}
.blog-main-card .card-body { padding: 36px; }

.blog-badge {
    background: #16a34a;
    color: white;
    padding: 5px 14px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 14px;
}
.blog-main-title {
    font-size: 1.7rem;
    font-weight: 900;
    color: #1e293b;
    line-height: 1.3;
    margin-bottom: 12px;
}
.blog-meta-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    font-size: 0.82rem;
    color: #64748b;
    margin-bottom: 20px;
    align-items: center;
}
.blog-meta-row span { display: flex; align-items: center; gap: 5px; }
.blog-full-content {
    line-height: 1.9;
    color: #334155;
    font-size: 0.97rem;
}
.blog-full-content h1,
.blog-full-content h2,
.blog-full-content h3 { color: #1e293b; font-weight: 800; margin-top: 28px; margin-bottom: 12px; }
.blog-full-content p { margin-bottom: 16px; }
.blog-full-content ul, .blog-full-content ol { padding-left: 20px; margin-bottom: 16px; }
.blog-full-content li { margin-bottom: 6px; }
.blog-full-content strong { color: #1e293b; }
.blog-full-content a { color: #16a34a; text-decoration: underline; }

.related-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
}
.related-card .card-body { padding: 24px; }
.related-title {
    font-size: 0.95rem;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.related-title i { color: #16a34a; }
.related-item {
    padding: 12px 0;
    border-bottom: 1px dashed #e2e8f0;
}
.related-item:last-child { border-bottom: none; padding-bottom: 0; }
.related-item a {
    font-size: 0.88rem;
    font-weight: 700;
    color: #1e293b;
    text-decoration: none;
    line-height: 1.4;
    display: block;
    margin-bottom: 4px;
    transition: color 0.2s;
}
.related-item a:hover { color: #16a34a; }
.related-item-date { font-size: 0.75rem; color: #94a3b8; }

.btn-back-blog {
    display: inline-flex; align-items: center; gap: 6px;
    border: 1.5px solid #16a34a; color: #16a34a; background: transparent;
    border-radius: 50px; padding: 8px 20px; font-size: 0.88rem; font-weight: 700;
    text-decoration: none; transition: all 0.2s; margin-bottom: 24px;
}
.btn-back-blog:hover { background: #16a34a; color: white; }

/* DARK MODE */
[data-theme="dark"] .blog-page { background: #0f172a; }
[data-theme="dark"] .blog-main-card { background: #1e293b; border-color: #334155; }
[data-theme="dark"] .blog-main-title { color: #f1f5f9; }
[data-theme="dark"] .blog-meta-row { color: #94a3b8; }
[data-theme="dark"] .blog-full-content { color: #cbd5e1; }
[data-theme="dark"] .blog-full-content h1,
[data-theme="dark"] .blog-full-content h2,
[data-theme="dark"] .blog-full-content h3 { color: #f1f5f9; }
[data-theme="dark"] .blog-full-content strong { color: #f1f5f9; }
[data-theme="dark"] .blog-full-content a { color: #4ade80; }
[data-theme="dark"] .related-card { background: #1e293b; border-color: #334155; }
[data-theme="dark"] .related-title { color: #f1f5f9; }
[data-theme="dark"] .related-item { border-color: #334155; }
[data-theme="dark"] .related-item a { color: #f1f5f9; }
[data-theme="dark"] .related-item a:hover { color: #4ade80; }
[data-theme="dark"] .related-item-date { color: #64748b; }
[data-theme="dark"] .btn-back-blog { border-color: #4ade80; color: #4ade80; }
[data-theme="dark"] .btn-back-blog:hover { background: #16a34a; color: white; border-color: #16a34a; }
[data-theme="dark"] hr { border-color: #334155; }
</style>
@endpush

@section('content')
<div class="blog-page">
    <div class="container py-5">
        <div class="row g-4">
            <!-- Konten Utama -->
            <div class="col-lg-8">
                <a href="{{ route('blog.index') }}" class="btn-back-blog">
                    <i class="bi bi-arrow-left"></i> Kembali ke Blog
                </a>
                <div class="blog-main-card">
                    @if($blog->thumbnail)
                        <img src="{{ $blog->thumbnail_url }}" class="card-img-top" alt="{{ $blog->judul }}">
                    @endif
                    <div class="card-body">
                        <span class="blog-badge">{{ $blog->kategori }}</span>
                        <h1 class="blog-main-title">{{ $blog->judul }}</h1>
                        <div class="blog-meta-row">
                            <span><i class="bi bi-person-fill"></i>{{ $blog->penulis }}</span>
                            <span><i class="bi bi-calendar3"></i>{{ $blog->created_at->format('d F Y') }}</span>
                            <span><i class="bi bi-eye"></i>{{ number_format($blog->views) }} views</span>
                        </div>
                        <hr>
                        <div class="blog-full-content">{!! $blog->isi !!}</div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                @if($related->count())
                <div class="related-card">
                    <div class="card-body">
                        <div class="related-title">
                            <i class="bi bi-journals"></i> Artikel Terkait
                        </div>
                        @foreach($related as $art)
                            <div class="related-item">
                                <a href="{{ route('blog.show', $art->slug) }}">{{ $art->judul }}</a>
                                <div class="related-item-date">
                                    <i class="bi bi-calendar3 me-1"></i>{{ $art->created_at->format('d M Y') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection