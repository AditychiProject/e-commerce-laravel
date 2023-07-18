@extends('layouts.app')

@section('title', 'Thank You')

@section('content')

<div class="container mx-auto mt-[84px] lg:p-12">
    <div class="flex items-center justify-center w-full h-96 bg-white border border-dark/20 shadow-md shadow-dark/60">
        <div class="w-full text-center mx-auto">
            <h1 class="text-4xl text-dark font-lora font-semibold mb-9">Outfeed</h1>
            <p class="text-xl text-dark font-medium mb-9">Terima kasih telah berbelanja di Outfeed</p>
            <a href="/" class="auth-submit">Kembali ke beranda</a>
        </div>
    </div>
</div>
@endsection