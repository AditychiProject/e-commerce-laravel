@extends('layouts.app')

@section('title', 'Search Products')

@section('content')
@forelse ($searchProducts as $productItem)
<div class="container flex justify-between mt-[80px] border-2 ">
    <div class="flex-none max-w-full lg:max-w-[280px] w-full relative mb-7">
        {{-- Label --}}
        <span class="card-label-warning">Search Products</span>
        {{-- Image --}}
        <div class="flex h-60 relative overflow-hidden mx-3 mt-3">
            @if ($productItem->productImages->count()>0)
            <img src="{{ asset($productItem->productImages[0]->image) }}" class="w-full h-full absolute top-0 right-0 object-cover" alt="{{ $productItem->name }}" />
            @endif
        </div>
        {{-- Content --}}
        <div class="text-center mt-3 px-3 pb-5">
            {{-- Name --}}
            <h5 class="text-sm text-dark font-medium truncate">{{ $productItem->name }}</h5>
            {{-- Price --}}
            <div class="flex items-center justify-center mt-2 mb-5">
                <p class="original-price">Rp {{ $productItem->selling_price }}</p>
                <p class="discount">Rp {{ $productItem->original_price }}</p>
            </div>
            {{-- Detail Product Button --}}
            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="detail-product-btn">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span>Beli</span>
            </a>
        </div>
    </div>
</div>
@empty
<div class="flex items-center justify-center h-96 mt-[80px] mx-auto">
    <p class="empty-product-message">Pencarian kosong</p>
</div>
@endforelse
<div class="flex justify-center my-4">
    {{ $searchProducts->appends(request()->input())->links() }}
</div>
@endsection