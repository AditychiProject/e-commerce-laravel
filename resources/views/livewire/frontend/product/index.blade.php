{{-- Category Title --}}
<h1 class="title-page-h1">{{ $category->name }}</h1>
<div class="container flex items-start justify-between mx-auto p-4 lg:p-12">
  {{-- Filter Box --}}
  <div class="max-w-full lg:max-w-[230px] w-full mr-12">
    {{-- Filter by Brand --}}
    <div class="text-center bg-primary p-2">
      <h4 class="text-xl text-white font-semibold">Brand</h4>
    </div>
    <div class="flex flex-col items-center bg-gray-100 p-3">
      @foreach ($category->brands as $brandItem)
      <div class="flex items-center w-full text-left mb-1">
        <input type="checkbox" class="inline-block cursor-pointer w-4 h-4 mr-2" wire:model="brandInputs" value="{{ $brandItem->name }}">
        <label class="inline-block text-sm">{{ $brandItem->name }}</label>
      </div>
      @endforeach
    </div>
    {{-- Filter by Price --}}
    <div class="text-center bg-primary p-2">
      <h4 class="text-xl text-white font-semibold">Harga</h4>
    </div>
    <div class="flex flex-col items-center bg-gray-100 p-3">
      <div class="flex items-center w-full text-left mb-1">
        <input type="radio" class="inline-block cursor-pointer w-4 h-4 mr-2" name="priceSort" wire:model="priceInput" value="high-to-low">
        <label class="text-sm">Tinggi ke rendah</label>
      </div>
      <div class="flex items-center w-full text-left">
        <input type="radio" class="inline-block cursor-pointer w-4 h-4 mr-2" name="priceSort" wire:model="priceInput" value="low-to-high">
        <label class="text-sm">Rendah ke tinggi</label>
      </div>
    </div>
  </div>
  {{-- Products --}}
  <div class="flex flex-wrap w-full">
    @forelse ($products as $productItem)
    {{-- Card Items --}}
    <div class="flex flex-col max-w-full lg:max-w-[280px] w-full relative overflow-hidden mr-7 mb-7">
      @if ($productItem->quantity>0)
      <span class="label-product-items bg-success">Stok tersisa {{ $productItem->quantity }}</span>
      @else
      <span class="label-product-items bg-danger">Stok tersisa {{ $productItem->quantity }}</span>
      @endif
      {{-- Image --}}
      <div class="flex h-60 relative overflow-hidden mx-3 mt-3">
        @if ($productItem->productImages->count()>0)
        <img src="{{ asset($productItem->productImages[0]->image) }}" class="w-full h-full absolute top-0 right-0 object-cover" alt="{{ $productItem->name }}" />
        @endif
      </div>
      {{-- About Product --}}
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
    {{-- If Empty --}}
    @empty
    <div class="flex items-center h-[252px] mx-auto">
      <p class="empty-product-message">Produk tidak tersedia</p>
    </div>
    @endforelse
  </div>
</div>