@extends('admin.layouts.app')
@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')
@section('content')
<div class="row g-4">
    {{-- Upload Form --}}
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">
                <i class="bi bi-cloud-upload me-2 text-primary"></i>Upload Foto Baru
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul *</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul') }}" placeholder="Judul foto" required>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto *</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                            accept="image/*" required id="fotoInput">
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="previewWrapper" class="mt-2 d-none">
                            <img id="previewImg" src="" class="rounded" style="width:100%;max-height:150px;object-fit:cover;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" placeholder="Deskripsi singkat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-upload me-2"></i>Upload Foto
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Gallery Grid --}}
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white fw-bold">
                <i class="bi bi-images me-2 text-primary"></i>Foto Galeri ({{ $galeri->total() }})
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @forelse($galeri as $foto)
                    <div class="col-md-4 col-sm-6">
                        <div class="position-relative rounded overflow-hidden shadow-sm" style="aspect-ratio:1;">
                            <img src="{{ $foto->foto_url }}" class="w-100 h-100" style="object-fit:cover;" alt="{{ $foto->judul }}">
                            <div class="position-absolute bottom-0 start-0 end-0 p-2"
                                style="background:linear-gradient(transparent,rgba(0,0,0,.7));">
                                <div class="text-white small fw-semibold text-truncate">{{ $foto->judul }}</div>
                                @if($foto->tanggal)
                                    <div class="text-white-50" style="font-size:.7rem;">{{ $foto->tanggal->format('d M Y') }}</div>
                                @endif
                            </div>
                            <div class="position-absolute top-0 end-0 p-2 d-flex gap-1">
                                <form action="{{ route('admin.galeri.toggle', $foto) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $foto->is_active ? 'btn-success' : 'btn-secondary' }}" style="padding:.2rem .4rem;font-size:.7rem;" title="{{ $foto->is_active ? 'Aktif' : 'Non-aktif' }}">
                                        <i class="bi bi-{{ $foto->is_active ? 'eye' : 'eye-slash' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.galeri.destroy', $foto) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="padding:.2rem .4rem;font-size:.7rem;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="bi bi-images" style="font-size:2.5rem;"></i>
                        <p class="mt-2">Belum ada foto. Upload foto pertama!</p>
                    </div>
                    @endforelse
                </div>
            </div>
            @if($galeri->hasPages())
            <div class="card-footer bg-white">{{ $galeri->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('fotoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('previewImg').src = ev.target.result;
            document.getElementById('previewWrapper').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
