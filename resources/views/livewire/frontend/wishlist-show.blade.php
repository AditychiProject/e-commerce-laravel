<div class="container mx-auto mt-[84px] lg:p-12">
    <h1 class="cart-wishlist-title">Wishlist</h1>
    {{-- Modal Box --}}
    <div class="flex border-2 shadow-md shadow-gray-300 my-10 p-2">
        <div class="w-full bg-white">
            {{-- Header --}}
            <div class="flex border-b-2 border-gray-300 mt-10 mb-2 px-6 py-4">
                <h3 class="w-1/5 thead-cart-wishlist">Gambar</h3>
                <h3 class="w-2/5 thead-cart-wishlist">Detail Produk</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Harga</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Aksi</h3>
            </div>
            {{-- Items --}}
            @forelse ($wishlist as $wishlistItem)
            @if ($wishlistItem->product)
            <div class="flex items-center justify-center px-6 py-5">
                {{-- Image --}}
                <div class="flex justify-center w-1/5">
                    <div class="w-24">
                        <img src="{{ $wishlistItem->product->productImages[0]->image }}" class="max-w-24 w-full max-h-24 h-full object-cover object-center" alt="{{ $wishlistItem->product->name }}">
                    </div>
                </div>
                {{-- About Product --}}
                <div class="flex justify-center w-2/5">
                    <div class="flex flex-grow flex-col justify-between text-center ml-4">
                        <span class="text-dark font-bold truncate mb-2">{{ $wishlistItem->product->name }}</span>
                        <div>
                            <span class="flex-row text-sm text-dark mr-2">{{ $wishlistItem->product->category->name }}</span>-
                            <span class="flex-row text-sm text-dark">{{ $wishlistItem->product->brand }}</span>
                        </div>
                    </div>
                </div>
                {{-- Price --}}
                <div class="flex justify-center w-1/5">
                    <span class="block w-full text-dark text-center font-semibold">Rp {{ $wishlistItem->product->selling_price }} </span>
                </div>
                <div class="flex justify-center space-x-2 w-1/5">
                    {{-- Remove Button --}}
                    <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="remove-btn-cart-wishlist">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </span>
                    </button>
                    {{-- View Product Button --}}
                    <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}" class="view-product-btn-cart-wishlist">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </a>
                </div>
            </div>
            @endif
            {{-- If Empty --}}
            @empty
            <p class="cart-wishlist-empty-message">Wishlist kosong</p>
            @endforelse
        </div>
    </div>
</div>