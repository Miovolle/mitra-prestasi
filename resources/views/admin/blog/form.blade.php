@extends('admin.layouts.app')
@section('title', isset($blog) ? 'Edit Artikel' : 'Tambah Artikel')
@section('page-title', isset($blog) ? 'Edit Artikel' : 'Tambah Artikel')
@section('content')
<div class="card shadow-sm" style="max-width:900px;">
    <div class="card-body p-4">
        <form action="{{ isset($blog) ? route('admin.blog.update', $blog) : route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($blog)) @method('PUT') @endif

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label fw-semibold">Judul Artikel *</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $blog->judul ?? '') }}" placeholder="Masukkan judul artikel" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                        value="{{ old('kategori', $blog->kategori ?? '') }}" placeholder="Tips & Trik, Panduan, dll">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="penulis" class="form-control"
                        value="{{ old('penulis', $blog->penulis ?? 'Admin Mitra Prestasi') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                    @if(isset($blog) && $blog->thumbnail)
                        <img src="{{ $blog->thumbnail_url }}" class="mt-2 rounded" style="height:60px;object-fit:cover;">
                    @endif
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Isi Artikel *</label>
                    <textarea name="isi" id="isiArtikel" class="form-control @error('isi') is-invalid @enderror"
                        rows="12">{{ old('isi', $blog->isi ?? '') }}</textarea>
                    <small class="text-muted">Bisa menggunakan HTML tag seperti &lt;p&gt;, &lt;b&gt;, &lt;ul&gt;, &lt;li&gt; dll.</small>
                    @error('isi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input type="hidden" name="is_featured" value="0">
                        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featured"
                            {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold" for="featured">
                            <i class="bi bi-star-fill text-warning me-1"></i>Jadikan Featured Post
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
