@extends('admin.layouts.app')
@section('title', 'Pendaftaran')
@section('page-title', 'Data Pendaftaran')
@section('content')
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr><th>#</th><th>Peserta</th><th>Lomba</th><th>Kontak</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($pendaftaran as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="fw-semibold">{{ $p->nama_peserta }}</div>
                        <div class="text-muted small">{{ $p->asal_sekolah }} @if($p->kelas) · Kelas {{ $p->kelas }} @endif</div>
                    </td>
                    <td class="small">{{ Str::limit($p->lomba->nama ?? '-', 35) }}</td>
                    <td class="small">
                        <div>{{ $p->email }}</div>
                        <div class="text-muted">{{ $p->no_hp }}</div>
                    </td>
                    <td>
                        <span class="badge bg-{{ $p->status_class }}">{{ $p->status_label }}</span>
                    </td>
                    <td class="small text-muted">{{ $p->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.pendaftaran.show', $p) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('admin.pendaftaran.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada pendaftaran.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($pendaftaran->hasPages())
    <div class="card-footer bg-white">{{ $pendaftaran->links() }}</div>
    @endif
</div>
@endsection
