@extends('layouts.app')
@section('title', $lomba->nama . ' - Mitra Prestasi')

@push('styles')
<style>
.show-page {
    padding-top: 80px;
    min-height: 100vh;
    background: #f8fafc;
    transition: background 0.3s;
}
.detail-card {
    background: #ffffff;
    border: 1.5px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}
.detail-card .card-body { padding: 28px; }
.detail-card .card-img-top {
    max-height: 350px;
    object-fit: cover;
    width: 100%;
}
.badge-kategori {
    background: #16a34a;
    color: white;
    padding: 5px 14px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    margin-right: 6px;
}
.badge-status-open   { background: #dcfce7; color: #15803d; padding: 5px 14px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; }
.badge-status-closed { background: #fee2e2; color: #dc2626; padding: 5px 14px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; }
.badge-status-coming { background: #fef9c3; color: #a16207; padding: 5px 14px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; }

.lomba-title { font-size: 1.6rem; font-weight: 900; color: #1e293b; margin: 12px 0 4px; }
.lomba-by { color: #64748b; font-size: 0.9rem; margin-bottom: 0; }
.lomba-desc { color: #475569; line-height: 1.75; font-size: 0.95rem; }

.info-section-title {
    font-size: 1rem; font-weight: 800; color: #1e293b;
    margin-bottom: 20px; display: flex; align-items: center; gap: 8px;
}
.info-section-title i { color: #16a34a; }
.info-item { display: flex; flex-direction: column; gap: 2px; margin-bottom: 18px; }
.info-item-label {
    display: flex; align-items: center; gap: 6px;
    font-size: 0.78rem; font-weight: 700; color: #64748b;
    text-transform: uppercase; letter-spacing: 0.5px;
}
.info-item-label i { color: #16a34a; }
.info-item-value { font-size: 0.95rem; font-weight: 600; color: #1e293b; padding-left: 22px; }

.btn-daftar-link {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    background: #16a34a; color: white; border: none;
    border-radius: 50px; padding: 12px 24px;
    font-weight: 700; font-size: 0.95rem; text-decoration: none;
    transition: all 0.2s; width: 100%;
    box-shadow: 0 4px 14px rgba(22,163,74,0.35);
}
.btn-daftar-link:hover { background: #15803d; color: white; transform: translateY(-2px); }

.form-section-title {
    font-size: 1rem; font-weight: 800; color: #1e293b;
    margin-bottom: 20px; display: flex; align-items: center; gap: 8px;
}
.form-section-title i { color: #16a34a; }
.form-label { font-size: 0.85rem; font-weight: 700; color: #1e293b; margin-bottom: 6px; }
.form-control {
    border: 1.5px solid #e2e8f0; border-radius: 10px;
    padding: 11px 14px; font-size: 0.9rem; color: #1e293b;
    transition: border-color 0.2s; background: #ffffff;
}
.form-control:focus { border-color: #16a34a; box-shadow: 0 0 0 3px rgba(22,163,74,0.12); outline: none; }
.form-control.is-invalid { border-color: #dc2626; }
.invalid-feedback { font-size: 0.8rem; color: #dc2626; }

.btn-submit {
    width: 100%; background: #16a34a; color: white; border: none;
    border-radius: 50px; padding: 13px; font-size: 0.97rem; font-weight: 700;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    gap: 8px; transition: all 0.2s; box-shadow: 0 4px 14px rgba(22,163,74,0.35);
}
.btn-submit:hover { background: #15803d; transform: translateY(-2px); }

.btn-back {
    display: inline-flex; align-items: center; gap: 6px;
    border: 1.5px solid #16a34a; color: #16a34a; background: transparent;
    border-radius: 50px; padding: 8px 20px; font-size: 0.88rem; font-weight: 700;
    text-decoration: none; transition: all 0.2s; margin-bottom: 24px;
}
.btn-back:hover { background: #16a34a; color: white; }

.alert-success-box {
    background: #dcfce7; color: #15803d; border: 1.5px solid #86efac;
    border-radius: 12px; padding: 14px 18px; margin-bottom: 20px;
    display: flex; align-items: center; gap: 8px; font-weight: 600;
}

/* DARK MODE */
[data-theme="dark"] .show-page { background: #0f172a; }
[data-theme="dark"] .detail-card { background: #1e293b; border-color: #334155; }
[data-theme="dark"] .lomba-title { color: #f1f5f9; }
[data-theme="dark"] .lomba-by { color: #94a3b8; }
[data-theme="dark"] .lomba-desc { color: #94a3b8; }
[data-theme="dark"] .info-section-title { color: #f1f5f9; }
[data-theme="dark"] .info-item-label { color: #94a3b8; }
[data-theme="dark"] .info-item-value { color: #f1f5f9; }
[data-theme="dark"] .form-section-title { color: #f1f5f9; }
[data-theme="dark"] .form-label { color: #f1f5f9; }
[data-theme="dark"] .form-control { background: #0f172a; border-color: #334155; color: #f1f5f9; }
[data-theme="dark"] .form-control::placeholder { color: #64748b; }
[data-theme="dark"] .form-control:focus { border-color: #16a34a; background: #0f172a; }
[data-theme="dark"] .btn-back { border-color: #4ade80; color: #4ade80; }
[data-theme="dark"] .btn-back:hover { background: #16a34a; color: white; border-color: #16a34a; }
[data-theme="dark"] hr { border-color: #334155; }
</style>
@endpush

@section('content')
<div class="show-page">
    <div class="container py-5">

        <a href="{{ url('/') }}#lomba" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        @if(session('success'))
            <div class="alert-success-box">
                <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
            </div>
        @endif

        <div class="row g-4">
            <!-- Kiri: Info Lomba -->
            <div class="col-lg-8">
                <div class="detail-card">
                    @if($lomba->poster)
                        <img src="{{ $lomba->poster_url }}" class="card-img-top" alt="{{ $lomba->nama }}">
                    @endif
                    <div class="card-body">
                        <div>
                            <span class="badge-kategori">{{ ucfirst($lomba->kategori ?? 'Umum') }}</span>
                            <span class="badge-status-{{ $lomba->status }}">{{ $lomba->status_label }}</span>
                        </div>
                        <h1 class="lomba-title">{{ $lomba->nama }}</h1>
                        <p class="lomba-by">Oleh <strong>{{ $lomba->penyelenggara }}</strong></p>
                        @if($lomba->deskripsi)
                            <hr class="my-3">
                            <div class="lomba-desc">{!! nl2br(e($lomba->deskripsi)) !!}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kanan: Detail + Form -->
            <div class="col-lg-4">
                <!-- Detail Lomba -->
                <div class="detail-card">
                    <div class="card-body">
                        <div class="info-section-title">
                            <i class="bi bi-info-circle-fill"></i> Detail Lomba
                        </div>
                        <div class="info-item">
                            <div class="info-item-label"><i class="bi bi-calendar-event"></i> Tanggal</div>
                            <div class="info-item-value">{{ $lomba->tanggal_format }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-item-label"><i class="bi bi-geo-alt-fill"></i> Lokasi</div>
                            <div class="info-item-value">{{ $lomba->lokasi ?? '-' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-item-label"><i class="bi bi-people-fill"></i> Tingkat</div>
                            <div class="info-item-value">{{ strtoupper($lomba->tingkat ?? '-') }}</div>
                        </div>
                        @if($lomba->hadiah)
                        <div class="info-item">
                            <div class="info-item-label"><i class="bi bi-trophy-fill"></i> Hadiah</div>
                            <div class="info-item-value">{{ $lomba->hadiah }}</div>
                        </div>
                        @endif
                        @if($lomba->link_daftar)
                            <a href="{{ $lomba->link_daftar }}" target="_blank" class="btn-daftar-link mt-2">
                                <i class="bi bi-box-arrow-up-right"></i> Daftar via Link Resmi
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Form Pendaftaran -->
                @if($lomba->status === 'open')
                <div class="detail-card">
                    <div class="card-body">
                        <div class="form-section-title">
                            <i class="bi bi-pencil-square"></i> Form Pendaftaran
                        </div>
                        <form action="{{ route('lomba.daftar', $lomba) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Peserta *</label>
                                <input type="text" name="nama_peserta"
                                    class="form-control @error('nama_peserta') is-invalid @enderror"
                                    value="{{ old('nama_peserta') }}" placeholder="Nama lengkap">
                                @error('nama_peserta')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Sekolah *</label>
                                <input type="text" name="asal_sekolah"
                                    class="form-control @error('asal_sekolah') is-invalid @enderror"
                                    value="{{ old('asal_sekolah') }}" placeholder="Nama sekolah">
                                @error('asal_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" name="kelas" class="form-control"
                                    value="{{ old('kelas') }}" placeholder="Contoh: 8A">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="email@sekolah.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No HP *</label>
                                <input type="text" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                                @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Nama Guru Pembimbing</label>
                                <input type="text" name="nama_guru_pembimbing" class="form-control"
                                    value="{{ old('nama_guru_pembimbing') }}" placeholder="Nama guru (opsional)">
                            </div>
                            <button type="submit" class="btn-submit">
                                <i class="bi bi-send-fill"></i> Kirim Pendaftaran
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