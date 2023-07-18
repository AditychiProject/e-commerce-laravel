<div class="mt-[84px]">
    <section class="overflow-hidden text-dark">
        <div class="container mx-auto px-5 py-12 border">
            <div class="flex flex-wrap justify-center relative mx-auto">
                {{-- Wishlist Successfully Alert --}}
                @if (session()->has('message'))
                <p class="hidden">{{ session('message') }}</p>
                @endif
                {{-- Image --}}
                @if ($product->productImages)
                <img src="{{ asset($product->productImages[0]->image) }}" class="w-full lg:w-[450px] lg:h-[450px] object-cover object-center" alt="{{ $product->name }}">
                @else
                <div class="flex items-center justify-center w-full lg:w-[450px] lg:h-[450px] bg-gray-200">
                    <span class="font-medium">Gambar tidak tersedia</span>
                </div>
                @endif
                {{-- About Product --}}
                <div class="w-full lg:w-1/2 mt-6 lg:mt-0 lg:p-6">
                    {{-- Brand --}}
                    <h1 class="inline-block text-sm text-white bg-primary mr-2 px-3 py-2">{{ $product->brand }}</h1>
                    {{-- Quantity Label --}}
                    @if ($product->quantity>0)
                    <span class="quantity-label bg-success">Stok {{ $product->quantity }}</span>
                    @else
                    <span class="quantity-label bg-danger">Stok {{ $product->quantity }}</span>
                    @endif
                    {{-- Name --}}
                    <h2 class="text-2xl text-dark font-bold mt-6 mb-2">{{ $product->name }}</h2>
                    {{-- Small Description --}}
                    <p class="leading-relaxed">{{ $product->small_description }}</p>
                    {{-- Quantity Input --}}
                    <div class="flex justify-between max-w-[140px] w-full my-8">
                        {{-- Minus --}}
                        <div class="quantity-operator">
                            <span wire:click="decrementQuantity" class="text-white font-medium"><i class="fa fa-minus"></i></span>
                        </div>
                        {{-- Value --}}
                        <input type="text" wire:model="quantityCount" class="quantity-value" value="{{ $this->quantityCount }}" readonly>
                        {{-- Plus --}}
                        <div class="quantity-operator">
                            <span wire:click="incrementQuantity" class="text-white font-medium"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    {{-- Price --}}
                    <div class="flex items-center">
                        <span class="original-price">Rp {{ $product->selling_price }}</span>
                        <span class="discount">Rp {{ $product->original_price }}</span>
                    </div>
                    <div class="flex items-center">
                        {{-- Cart --}}
                        <button type="button" wire:click="addToCart({{ $product->id }})" class="flex items-center text-white bg-primary hover:bg-secondary border-2 border-primary mt-8 mr-3 px-6 py-2">
                            <div class="flex items-center justify-center" wire:loading.remove wire:target="addToCart">
                                <p class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </p>
                                <span>Masukkkan ke cart</span>
                            </div>
                            <p wire:loading wire:target="addToCart" class="w-[164.5px]">Menambahkan...</p>
                        </button>
                        {{-- Wishlist --}}
                        <button type="button" wire:click="addToWishList({{ $product->id }})" class="flex items-center text-dark hover:text-primary bg-white border-2 border-primary mt-8 px-6 py-2">
                            <div class="flex items-center justify-center" wire:loading.remove wire:target="addToWishList">
                                <p class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-[18px] h-[18px]" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                </p>
                                <span>Tambahkan ke wishlist</span>
                            </div>
                            <p wire:loading wire:target="addToWishList" class="w-[192.58px]">Menambahkan...</p>
                        </button>
                    </div>
                </div>
                {{-- Product Description --}}
                <div class="max-w-full w-full mt-10">
                    <div class="max-w-[900px] w-full mx-[94px]">
                        <h3 class="text-3xl text-dark font-bold my-4">Deskripsi Produk</h3>
                        <p class="text-dark leading-loose">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Relate Category Products --}}
        <div>
            <h2 class="text-4xl text-primary font-lora font-bold mt-28 mb-10 ml-[144px]">Related
                @if ($category)
                {{ $category->name }}
                @endif
                Products
            </h2>
            <div id="scrollContainer" class="container flex flex-no-wrap items-start space-x-4 max-w-[1236px] w-full overflow-x-scroll mx-auto mb-8 px-0">

                {{-- Card Items --}}
                @forelse ($category->relatedProducts as $relatedProductItem)
                @if ($relatedProductItem->category == "$product->category")
                <div class="flex-none max-w-full lg:max-w-[280px] w-full relative">
                    {{-- Label --}}
                    {{-- <span class="inline-block absolute top-0 left-0 z-[999] text-xs text-white bg-yellow-500 p-2">Trending</span> --}}
                    {{-- Image --}}
                    <div class="flex h-60 relative overflow-hidden mx-3 mt-3">
                        @if ($relatedProductItem->productImages->count()>0)
                        <img src="{{ asset($relatedProductItem->productImages[0]->image) }}" class="w-full h-full absolute top-0 right-0 object-cover" alt="{{ $relatedProductItem->name }}" />
                        @endif
                    </div>
                    {{-- Content --}}
                    <div class="text-center mt-3 px-3 pb-5">
                        {{-- Name --}}
                        <h5 class="text-sm text-dark font-medium truncate">{{ $relatedProductItem->name }}</h5>
                        {{-- Price --}}
                        <div class="flex items-center justify-center mt-2 mb-5">
                            <p class="text-2xl text-dark font-bold mr-2">Rp {{ $relatedProductItem->selling_price }}</p>
                            <p class="text-sm text-gray-500 line-through">Rp {{ $relatedProductItem->original_price }}</p>
                        </div>
                        {{-- Detail Product Button --}}
                        <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}" class="flex items-center justify-center w-full text-sm text-white text-center font-medium bg-primary hover:bg-secondary mx-auto px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>Beli</span>
                        </a>
                    </div>
                </div>
                @endif
                @empty
                <div class="flex items-center h-[252px] mx-auto">
                    <p class="text-2xl text-dark font-semibold">Produk yang trending belum tersedia</p>
                </div>
                @endforelse
            </div>
        </div>
        {{-- Relate Brand Products --}}
        <div>
            <h2 class="text-4xl text-primary font-lora font-bold mt-28 mb-10 ml-[144px]">Related
                @if ($product)
                {{ $product->brand }}
                @endif
                Products
            </h2>
            <div id="scrollContainer" class="container flex flex-no-wrap items-start space-x-4 max-w-[1236px] w-full overflow-x-scroll mx-auto mb-8 px-0">

                {{-- Card Items --}}
                @forelse ($category->relatedProducts as $relatedProductItem)
                @if ($relatedProductItem->brand == "$product->brand")
                <div class="flex-none max-w-full lg:max-w-[280px] w-full relative">
                    {{-- Label --}}
                    {{-- <span class="inline-block absolute top-0 left-0 z-[999] text-xs text-white bg-yellow-500 p-2">Trending</span> --}}
                    {{-- Image --}}
                    <div class="flex h-60 relative overflow-hidden mx-3 mt-3">
                        @if ($relatedProductItem->productImages->count()>0)
                        <img src="{{ asset($relatedProductItem->productImages[0]->image) }}" class="w-full h-full absolute top-0 right-0 object-cover" alt="{{ $relatedProductItem->name }}" />
                        @endif
                    </div>
                    {{-- Content --}}
                    <div class="text-center mt-3 px-3 pb-5">
                        {{-- Name --}}
                        <h5 class="text-sm text-dark font-medium truncate">{{ $relatedProductItem->name }}</h5>
                        {{-- Price --}}
                        <div class="flex items-center justify-center mt-2 mb-5">
                            <p class="text-2xl text-dark font-bold mr-2">Rp {{ $relatedProductItem->selling_price }}</p>
                            <p class="text-sm text-gray-500 line-through">Rp {{ $relatedProductItem->original_price }}</p>
                        </div>
                        {{-- Detail Product Button --}}
                        <a href="{{ url('/collections/'.$relatedProductItem->category->slug.'/'.$relatedProductItem->slug) }}" class="flex items-center justify-center w-full text-sm text-white text-center font-medium bg-primary hover:bg-secondary mx-auto px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>Beli</span>
                        </a>
                    </div>
                </div>
                @endif
                @empty
                <div class="flex items-center h-[252px] mx-auto">
                    <p class="text-2xl text-dark font-semibold">Produk yang trending belum tersedia</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>