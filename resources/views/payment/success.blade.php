@extends('layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')
<div class="container py-5 text-center">
    <div class="display-1 mb-3">✅</div>
    <h2 class="text-success">Pembayaran Berhasil!</h2>
    <p class="text-muted">Terima kasih! Pendaftaran Anda telah dikonfirmasi.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
</div>
@endsection
