@extends('admin.layouts.app')
@section('title', 'Kelola Blog')
@section('page-title', 'Kelola Blog')
@section('content')
<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Artikel
    </a>
</div>
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr><th>#</th><th>Judul</th><th>Kategori</th><th>Penulis</th><th>Views</th><th>Featured</th><th>Tanggal</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($blogs as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="fw-semibold">{{ Str::limit($b->judul, 50) }}</div>
                        <div class="text-muted small">{{ $b->slug }}</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $b->kategori ?? '-' }}</span></td>
                    <td class="small">{{ $b->penulis }}</td>
                    <td class="small">{{ number_format($b->views) }}</td>
                    <td>
                        @if($b->is_featured)
                            <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i>Ya</span>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="small text-muted">{{ $b->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.blog.edit', $b) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.blog.destroy', $b) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted py-4">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($blogs->hasPages())
    <div class="card-footer bg-white">{{ $blogs->links() }}</div>
    @endif
</div>
@endsection
