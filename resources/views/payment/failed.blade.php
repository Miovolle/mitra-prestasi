@extends('layouts.app')

@section('title', 'Pembayaran Gagal')

@section('content')
<div class="container py-5 text-center">
    <div class="display-1 mb-3">❌</div>
    <h2 class="text-danger">Pembayaran Gagal</h2>
    <p class="text-muted">Terjadi masalah saat memproses pembayaran Anda. Silakan coba lagi atau hubungi panitia.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
@endsection
