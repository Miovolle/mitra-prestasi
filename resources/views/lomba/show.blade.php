@extends('layouts.app')
@section('title', $lomba->nama . ' - Mitra Prestasi')
@section('content')
<div style="padding-top:80px;min-height:100vh;background:#f8fafc;">
<div class="container py-5">
    <a href="{{ url('/') }}#lomba" class="btn btn-outline-primary mb-4">
        <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                @if($lomba->poster)
                    <img src="{{ $lomba->poster_url }}" class="card-img-top rounded-top-4" style="max-height:350px;object-fit:cover;" alt="{{ $lomba->nama }}">
                @endif
                <div class="card-body p-4">
                    <span class="badge bg-primary mb-2">{{ ucfirst($lomba->kategori ?? 'Umum') }}</span>
                    <span class="badge bg-{{ $lomba->status === 'open' ? 'success' : ($lomba->status === 'coming' ? 'warning' : 'secondary') }} mb-2 ms-1">
                        {{ $lomba->status_label }}
                    </span>
                    <h1 class="fw-bold fs-4 mt-2">{{ $lomba->nama }}</h1>
                    <p class="text-muted">Oleh <strong>{{ $lomba->penyelenggara }}</strong></p>
                    @if($lomba->deskripsi)
                        <hr>
                        <div>{!! nl2br(e($lomba->deskripsi)) !!}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-info-circle-fill me-2 text-primary"></i>Detail Lomba</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="bi bi-calendar-event text-primary me-2"></i><strong>Tanggal:</strong><br><span class="ms-4">{{ $lomba->tanggal_format }}</span></li>
                        <li class="mb-3"><i class="bi bi-geo-alt-fill text-primary me-2"></i><strong>Lokasi:</strong><br><span class="ms-4">{{ $lomba->lokasi ?? '-' }}</span></li>
                        <li class="mb-3"><i class="bi bi-people-fill text-primary me-2"></i><strong>Tingkat:</strong><br><span class="ms-4">{{ strtoupper($lomba->tingkat ?? '-') }}</span></li>
                        @if($lomba->hadiah)
                        <li class="mb-3"><i class="bi bi-cash-stack text-primary me-2"></i><strong>Hadiah:</strong><br><span class="ms-4">{{ $lomba->hadiah }}</span></li>
                        @endif
                    </ul>
                    @if($lomba->link_daftar)
                        <a href="{{ $lomba->link_daftar }}" target="_blank" class="btn btn-primary w-100">
                            <i class="bi bi-box-arrow-up-right me-2"></i>Daftar via Link Resmi
                        </a>
                    @endif
                </div>
            </div>

            @if($lomba->status === 'open')
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-pencil-square me-2 text-primary"></i>Form Pendaftaran</h5>
                    <form action="{{ route('lomba.daftar', $lomba) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Peserta *</label>
                            <input type="text" name="nama_peserta" class="form-control @error('nama_peserta') is-invalid @enderror" value="{{ old('nama_peserta') }}" placeholder="Nama lengkap">
                            @error('nama_peserta')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Asal Sekolah *</label>
                            <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" value="{{ old('asal_sekolah') }}" placeholder="Nama sekolah">
                            @error('asal_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" placeholder="Contoh: 8A">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@sekolah.com">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">No HP *</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                            @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Guru Pembimbing</label>
                            <input type="text" name="nama_guru_pembimbing" class="form-control" value="{{ old('nama_guru_pembimbing') }}" placeholder="Nama guru (opsional)">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send-fill me-2"></i>Kirim Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
