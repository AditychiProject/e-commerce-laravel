@extends('layouts.app')

@section('title', 'Outfeed')

@section('content')
{{-- Navbar --}}
@include('layouts.inc.frontend.navbar')
<div class="max-h-screen h-screen">
    <div class="animate__animated animate__zoomIn flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl text-dark font-bold mb-2">Selamat datang di Outfeed</h1>
        <p class="text-dark mb-6">Silakan menuju ke halaman beranda untuk berbelanja.</p>
        <a href="/" class="text-white font-medium bg-primary hover:bg-secondary px-6 py-2">Belanja sekarang</a>
    </div>
</div>
@endsection