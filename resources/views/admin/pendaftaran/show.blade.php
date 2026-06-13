@extends('admin.layouts.app')
@section('title', 'Detail Pendaftaran')
@section('page-title', 'Detail Pendaftaran')
@section('content')
<div class="row g-4" style="max-width:700px;">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">Info Peserta</div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr><th width="200">Nama Peserta</th><td>{{ $pendaftaran->nama_peserta }}</td></tr>
                    <tr><th>Asal Sekolah</th><td>{{ $pendaftaran->asal_sekolah }}</td></tr>
                    <tr><th>Kelas</th><td>{{ $pendaftaran->kelas ?? '-' }}</td></tr>
                    <tr><th>Email</th><td>{{ $pendaftaran->email }}</td></tr>
                    <tr><th>No HP</th><td>{{ $pendaftaran->no_hp }}</td></tr>
                    <tr><th>Guru Pembimbing</th><td>{{ $pendaftaran->nama_guru_pembimbing ?? '-' }}</td></tr>
                    <tr><th>Lomba</th><td>{{ $pendaftaran->lomba->nama ?? '-' }}</td></tr>
                    <tr><th>Tanggal Daftar</th><td>{{ $pendaftaran->created_at->format('d M Y H:i') }}</td></tr>
                    <tr><th>Status</th><td><span class="badge bg-{{ $pendaftaran->status_class }}">{{ $pendaftaran->status_label }}</span></td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">Update Status</div>
            <div class="card-body">
                <form action="{{ route('admin.pendaftaran.status', $pendaftaran) }}" method="POST" class="d-flex gap-2">
                    @csrf @method('PATCH')
                    <select name="status" class="form-select" style="max-width:200px;">
                        <option value="menunggu" {{ $pendaftaran->status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diterima" {{ $pendaftaran->status === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $pendaftaran->status === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>
@endsection
