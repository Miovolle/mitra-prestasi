@extends('layouts.app')
@section('title', $blog->judul . ' - Mitra Prestasi')
@section('content')
<div style="padding-top:80px;min-height:100vh;background:#f8fafc;">
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-primary mb-4">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Blog
            </a>
            <div class="card border-0 shadow-sm rounded-4">
                @if($blog->thumbnail)
                    <img src="{{ $blog->thumbnail_url }}" class="card-img-top rounded-top-4" style="max-height:400px;object-fit:cover;" alt="{{ $blog->judul }}">
                @endif
                <div class="card-body p-4 p-lg-5">
                    <span class="badge bg-primary mb-3">{{ $blog->kategori }}</span>
                    <h1 class="fw-bold fs-3 mb-3">{{ $blog->judul }}</h1>
                    <div class="d-flex gap-3 text-muted mb-4 small">
                        <span><i class="bi bi-person me-1"></i>{{ $blog->penulis }}</span>
                        <span><i class="bi bi-calendar3 me-1"></i>{{ $blog->created_at->format('d F Y') }}</span>
                        <span><i class="bi bi-eye me-1"></i>{{ number_format($blog->views) }} views</span>
                    </div>
                    <hr>
                    <div class="blog-full-content" style="line-height:1.9;">{!! $blog->isi !!}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            @if($related->count())
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Artikel Terkait</h5>
                    @foreach($related as $art)
                        <div class="d-flex gap-3 mb-3 pb-3 border-bottom">
                            <div>
                                <a href="{{ route('blog.show', $art->slug) }}" class="fw-semibold text-dark text-decoration-none small">{{ $art->judul }}</a>
                                <div class="text-muted" style="font-size:.75rem;">{{ $art->created_at->format('d M Y') }}</div>
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
