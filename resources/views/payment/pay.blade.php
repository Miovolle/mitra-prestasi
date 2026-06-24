@extends('layouts.app')

@section('title', 'Pembayaran Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">💳 Pembayaran Pendaftaran</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $pendaftaran->nama_peserta }}</p>
                    <p><strong>Lomba:</strong> {{ $pendaftaran->lomba->nama ?? '-' }}</p>
                    <p><strong>Status Pembayaran:</strong>
                        <span class="badge bg-{{ $pendaftaran->payment_status === 'paid' ? 'success' : 'warning' }}">
                            {{ strtoupper($pendaftaran->payment_status) }}
                        </span>
                    </p>

                    @if($pendaftaran->payment_status !== 'paid')
                        <div class="alert alert-info mt-3">
                            Hubungi panitia untuk konfirmasi pembayaran.
                        </div>
                    @else
                        <div class="alert alert-success mt-3">
                            Pembayaran telah dikonfirmasi. Terima kasih!
                        </div>
                    @endif

                    <a href="{{ route('home') }}" class="btn btn-secondary mt-2">← Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
