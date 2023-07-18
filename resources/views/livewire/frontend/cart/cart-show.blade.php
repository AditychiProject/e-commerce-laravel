<div class="container mx-auto mt-[84px] lg:p-12">
    <h1 class="cart-wishlist-title">Cart</h1>
    <div class="flex border-2 shadow-md shadow-gray-300 mt-10 mb-6 p-2">
        {{-- Modal Box --}}
        <div class="w-full bg-white">
            {{-- Header --}}
            <div class="flex border-b-2 border-gray-300 mt-10 mb-2 px-6 py-4">
                <h3 class="w-1/5 thead-cart-wishlist">Gambar</h3>
                <h3 class="w-2/5 thead-cart-wishlist">Detail Produk</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Harga</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Jumlah Pesanan</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Total</h3>
                <h3 class="w-1/5 thead-cart-wishlist">Aksi</h3>
            </div>
            {{-- Items --}}
            @php
            $totalPrice = 0;
            @endphp
            @forelse ($cart as $cartItem)
            @if ($cartItem->product)
            <div class="flex items-center justify-center px-6 py-5">
                {{-- Image --}}
                <div class="flex justify-center w-1/5">
                    <div class="w-24">
                        <img src="{{ $cartItem->product->productImages[0]->image }}" class="max-w-24 w-full max-h-24 h-full object-cover object-center" alt="{{ $cartItem->product->name }}">
                    </div>
                </div>
                {{-- About Product --}}
                <div class="flex justify-center w-2/5">
                    <div class="flex flex-grow flex-col justify-between text-center ml-4">
                        <span class="text-dark font-bold truncate mb-2">{{ $cartItem->product->name }}</span>
                        <div>
                            <span class="flex-row text-sm text-dark mr-2">{{ $cartItem->product->category->name }}</span>-
                            <span class="flex-row text-sm text-dark">{{ $cartItem->product->brand }}</span>
                        </div>
                    </div>
                </div>
                {{-- Price --}}
                <div class="flex justify-center w-1/5">
                    <span class="block w-full text-dark text-center font-semibold">Rp {{ $cartItem->product->selling_price }} </span>
                </div>
                {{-- Quantity --}}
                <div class="flex justify-center w-1/5">
                    <div class="flex justify-between max-w-[140px] w-full my-8">
                        {{-- Minus --}}
                        <div class="quantity-operator">
                            <span wire:click="decrementQuantity({{ $cartItem->id }})" class="text-white font-medium"><i class="fa fa-minus"></i></span>
                        </div>
                        {{-- Value --}}
                        <input type="text" class="cursor-default inline-block w-full text-dark text-center font-semibold bg-gray-100 border-y-2 border-dark/50 focus:outline-none" value="{{ $cartItem->quantity }}" readonly>
                        {{-- Plus --}}
                        <div class="quantity-operator">
                            <span wire:click="incrementQuantity({{ $cartItem->id }})" class="text-white font-medium"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                </div>
                {{-- Total --}}
                <div class="flex justify-center w-1/5">
                    <span class="block w-full text-dark text-center font-semibold">Rp {{ $cartItem->product->selling_price * $cartItem->quantity }} </span>
                    @php
                    $totalPrice += $cartItem->product->selling_price * $cartItem->quantity
                    @endphp
                </div>
                <div class="flex justify-center space-x-2 w-1/5">
                    {{-- Remove Button --}}
                    <button type="button" wire:click="removecartItem({{ $cartItem->id }})" class="remove-btn-cart-wishlist">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </span>
                    </button>
                    {{-- View Product Button --}}
                    <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}" class="view-product-btn-cart-wishlist">
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
            <p class="cart-wishlist-empty-message">Cart kosong</p>
            @endforelse
        </div>
    </div>
    {{-- Price Total Box --}}
    <div class="max-w-[300px] w-full border-2 shadow-md shadow-gray-300 ml-auto p-3">
        {{-- Price Total --}}
        <h4 class="flex items-center justify-between text-xl text-dark text-center font-semibold border-b-2 border-gray-300 pb-3">
            <span>Total:</span>
            <span>Rp {{ $totalPrice }}</span>
        </h4>
        {{-- Checkout Button --}}
        <a href="{{ url('/checkout') }}" class="block w-full text-white text-center bg-primary hover:bg-secondary p-2 mt-4">Checkout</a>
    </div>
</div>