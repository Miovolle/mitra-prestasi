@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="stat-icon" style="background:#eff6ff;color:#3b82f6;"><i class="bi bi-trophy-fill"></i></div>
                <span class="badge bg-primary">{{ $stats['lomba_aktif'] }} aktif</span>
            </div>
            <div class="fs-2 fw-bold">{{ $stats['total_lomba'] }}</div>
            <div class="text-muted small">Total Lomba</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="stat-icon" style="background:#f0fdf4;color:#22c55e;"><i class="bi bi-people-fill"></i></div>
                <span class="badge bg-warning text-dark">{{ $stats['menunggu'] }} pending</span>
            </div>
            <div class="fs-2 fw-bold">{{ $stats['total_pendaftar'] }}</div>
            <div class="text-muted small">Total Pendaftar</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="stat-icon" style="background:#fdf4ff;color:#a855f7;"><i class="bi bi-journal-richtext"></i></div>
            </div>
            <div class="fs-2 fw-bold">{{ $stats['total_blog'] }}</div>
            <div class="text-muted small">Artikel Blog</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="stat-icon" style="background:#fff7ed;color:#f97316;"><i class="bi bi-images"></i></div>
            </div>
            <div class="fs-2 fw-bold">{{ $stats['total_galeri'] }}</div>
            <div class="text-muted small">Foto Galeri</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">Lomba Terbaru</h6>
                <a href="{{ route('admin.lomba.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Nama</th><th>Status</th></tr></thead>
                    <tbody>
                        @foreach($lomba_terbaru as $l)
                        <tr>
                            <td>
                                <div class="fw-semibold small">{{ Str::limit($l->nama, 40) }}</div>
                                <div class="text-muted" style="font-size:.75rem;">{{ $l->lokasi ?? '-' }}</div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $l->status === 'open' ? 'success' : ($l->status === 'coming' ? 'warning text-dark' : 'secondary') }}">
                                    {{ $l->status_label }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">Pendaftar Terbaru</h6>
                <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead><tr><th>Peserta</th><th>Lomba</th><th>Status</th></tr></thead>
                    <tbody>
                        @foreach($pendaftar_terbaru as $p)
                        <tr>
                            <td>
                                <div class="fw-semibold small">{{ $p->nama_peserta }}</div>
                                <div class="text-muted" style="font-size:.75rem;">{{ $p->asal_sekolah }}</div>
                            </td>
                            <td class="small">{{ Str::limit($p->lomba->nama ?? '-', 25) }}</td>
                            <td>
                                <span class="badge bg-{{ $p->status_class }}">{{ $p->status_label }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
