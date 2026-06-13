@extends('admin.layouts.app')
@section('title', 'Kelola Lomba')
@section('page-title', 'Kelola Lomba')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.lomba.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Lomba
    </a>
</div>
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lomba</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lomba as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="fw-semibold">{{ Str::limit($item->nama, 45) }}</div>
                        <div class="text-muted small">{{ $item->penyelenggara }}</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ ucfirst($item->kategori ?? '-') }}</span></td>
                    <td class="small">{{ $item->tanggal_format }}</td>
                    <td class="small">{{ $item->lokasi ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $item->status === 'open' ? 'success' : ($item->status === 'coming' ? 'warning text-dark' : 'secondary') }}">
                            {{ $item->status_label }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.lomba.edit', $item) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.lomba.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus lomba ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada lomba.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($lomba->hasPages())
    <div class="card-footer bg-white">{{ $lomba->links() }}</div>
    @endif
</div>
@endsection
