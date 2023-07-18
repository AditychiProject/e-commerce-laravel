@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
  <div class="flex items-center justify-center max-w-[1234px] mt-[84px] w-full mx-auto">
    {{-- carousel --}}
    <div id="carouselExampleCaptions" class="relative w-3/5 " data-te-carousel-init data-te-carousel-slide>
      <!--Carousel indicators-->
      <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0" data-te-carousel-indicators>
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="0" data-te-carousel-active class="mx-[3px]  h-[16px] w-[16px] rounded-full  cursor-pointer border-0  border-solid border-transparent bg-primary  p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="1" class="mx-[3px]  h-[16px] w-[16px] rounded-full  cursor-pointer border-0  border-solid border-transparent bg-primary  p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 2"></button>
        <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="2" class="mx-[3px]  h-[16px] w-[16px] rounded-full  cursor-pointer border-0  border-solid border-transparent bg-primary  p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none" aria-label="Slide 3"></button>
      </div>
      <!--Carousel items-->
      <div class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <!--First item-->
        <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
          <img src="{{ asset('assets/img/carousel1.jpg') }}" class="block w-full h-[500px] object-cover object-center" alt="..." />
          <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">First slide label</h5>
            <p>
              Some representative placeholder content for the first slide.
            </p>
          </div>
        </div>
        <!--Second item-->
        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item style="backface-visibility: hidden">
          <img src="{{ asset('assets/img/carousel2.jpg') }}" class="block w-full h-[500px] object-cover object-center" alt="..." />
          <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">Second slide label</h5>
            <p>
              Some representative placeholder content for the second slide.
            </p>
          </div>
        </div>
        <!--Third item-->
        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none" data-te-carousel-item style="backface-visibility: hidden">
          <img src="{{ asset('assets/img/carousel3.jpg') }}" class="block w-full h-[500px] object-cover object-center" alt="..." />
          <div class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
            <h5 class="text-xl">Third slide label</h5>
            <p>
              Some representative placeholder content for the third slide.
            </p>
          </div>
        </div>
      </div>
      <!--Carousel controls - prev item-->
      <button class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-primary opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)]  hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleCaptions" data-te-slide="prev">
        <span class="inline-block h-8 w-8">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </span>
        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
      </button>
      <!--Carousel controls - next item-->
      <button class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-primary opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)]  hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none" type="button" data-te-target="#carouselExampleCaptions" data-te-slide="next">
        <span class="inline-block h-8 w-8">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </span>
        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
      </button>
    </div>
    {{-- Banner Items --}}
    <div class="flex flex-col w-2/5">
      <a href="/">
        <img class="w-full h-[250px] object-cover object-center" src="{{ asset('assets/img/banner1.jpg') }}" alt="">
      </a>
      <a href="/">
        <img class="w-full h-[250px] object-cover object-center" src="{{ asset('assets/img/banner2.jpg') }}" alt="">
      </a>
    </div>
  </div>
</div>

{{-- Trending Products --}}
<h2 class="text-4xl text-primary font-lora font-bold mt-28 mb-10 ml-[144px]">Trending Products</h2>
<div id="scrollContainer" class="container flex flex-no-wrap items-start space-x-4 max-w-[1236px] w-full overflow-x-scroll mx-auto mb-8 px-0">
  {{-- Card Items --}}
  @if ($trendingProducts)
  @foreach ($trendingProducts as $productItem)
  <div class="flex-none max-w-full lg:max-w-[280px] w-full relative">
    {{-- Label --}}
    <span class="inline-block absolute top-0 left-0 z-[999] text-xs text-white bg-yellow-500 p-2">Trending</span>
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
        <p class="text-2xl text-dark font-bold mr-2">Rp {{ $productItem->selling_price }}</p>
        <p class="text-sm text-gray-500 line-through">Rp {{ $productItem->original_price }}</p>
      </div>
      {{-- Detail Product Button --}}
      <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="flex items-center justify-center w-full text-sm text-white text-center font-medium bg-primary hover:bg-secondary mx-auto px-3 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span>Beli</span>
      </a>
    </div>
  </div>
  @endforeach
  @else
  <div class="flex items-center h-[252px] mx-auto">
    <p class="text-2xl text-dark font-semibold">Produk yang trending belum tersedia</p>
  </div>
  @endif
</div>
{{-- New Arrival Products --}}
<h2 class="text-4xl text-primary font-lora font-bold mt-28 mb-10 ml-[144px]">New Arrival</h2>
<div id="scrollContainer" class="container flex flex-no-wrap items-start space-x-4 max-w-[1236px] w-full overflow-x-scroll mx-auto mb-8 px-0">
  {{-- Card Items --}}
  @if ($newArrivalProducts)
  @foreach ($newArrivalProducts as $productItem)
  <div class="flex-none max-w-full lg:max-w-[280px] w-full relative">
    {{-- Label --}}
    <span class="inline-block absolute top-0 left-0 z-[999] text-xs text-white bg-yellow-500 px-6 py-2">New</span>
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
        <p class="text-2xl text-dark font-bold mr-2">Rp {{ $productItem->selling_price }}</p>
        <p class="text-sm text-gray-500 line-through">Rp {{ $productItem->original_price }}</p>
      </div>
      {{-- Detail Product Button --}}
      <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="flex items-center justify-center w-full text-sm text-white text-center font-medium bg-primary hover:bg-secondary mx-auto px-3 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span>Beli</span>
      </a>
    </div>
  </div>
  @endforeach
  @else
  <div class="flex items-center h-[252px] mx-auto">
    <p class="text-2xl text-dark font-semibold">Produk terbaru belum tersedia</p>
  </div>
  @endif
</div>
{{-- Featured Products --}}
<h2 class="text-4xl text-primary font-lora font-bold mt-28 mb-10 ml-[144px]">Featured Products</h2>
<div id="scrollContainer" class="container flex flex-no-wrap items-start space-x-4 max-w-[1236px] w-full overflow-x-scroll mx-auto mb-8 px-0">
  {{-- Card Items --}}
  @if ($featuredProducts)
  @foreach ($featuredProducts as $productItem)
  <div class="flex-none max-w-full lg:max-w-[280px] w-full relative">
    {{-- Label --}}
    <span class="inline-block absolute top-0 left-0 z-[999] text-xs text-white bg-yellow-500 px-6 py-2">New</span>
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
        <p class="text-2xl text-dark font-bold mr-2">Rp {{ $productItem->selling_price }}</p>
        <p class="text-sm text-gray-500 line-through">Rp {{ $productItem->original_price }}</p>
      </div>
      {{-- Detail Product Button --}}
      <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="flex items-center justify-center w-full text-sm text-white text-center font-medium bg-primary hover:bg-secondary mx-auto px-3 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span>Beli</span>
      </a>
    </div>
  </div>
  @endforeach
  @else
  <div class="flex items-center h-[252px] mx-auto">
    <p class="text-2xl text-dark font-semibold">Produk terunggul belum tersedia</p>
  </div>
  @endif
</div>

@endsection