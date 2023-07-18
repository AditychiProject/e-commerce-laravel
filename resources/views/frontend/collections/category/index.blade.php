@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
<div class="container mx-auto mt-[84px] p-4 lg:p-12">
    <h1 class="text-4xl text-primary text-center font-lora font-bold mb-12">Kategori</h1>
    <div class="flex flex-wrap justify-evenly">
        {{-- Category Items --}}
        @forelse ($categories as $categoryItem)
        <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="flex flex-wrap max-w-full lg:max-w-xs w-full mb-6 hover:scale-105 transition duration-300 ease-in-out">
            <div class="w-full relative">
                <img src="{{ asset("$categoryItem->image") }}" class="block w-full max-h-[250px] h-full overflow-hidden object-cover object-center" alt="{{ $categoryItem->name }}" />
                <span class="block max-w-[120px] w-full absolute left-0 bottom-0 z-50 text-sm text-white text-center font-light bg-primary py-1">{{ $categoryItem->name }}</span>
            </div>
        </a>
        {{-- If Empty --}}
        @empty
        <div class="mt-32">
            <span class="text-2xl font-semibold text-dark">Kategori tidak tersedia</span>
        </div>
        @endforelse
    </div>
</div>
@endsection