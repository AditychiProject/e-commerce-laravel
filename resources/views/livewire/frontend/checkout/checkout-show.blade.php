<div class="container mx-auto mt-[84px] lg:p-12">
    <h1 class="cart-wishlist-title">Checkout</h1>

    @if($this->totalProductAmount != '0')
    <div class="mx-auto grid max-w-screen-2xl grid-cols-1 md:grid-cols-2 border border-red-400 my-10">
        {{-- Left Column --}}
        <div class="bg-gray-50 py-12 md:py-24">
            <div class="mx-auto max-w-lg space-y-8 px-4 lg:px-8">
                <div class="flex items-center gap-4">
                    <span class="h-10 w-10 rounded-full bg-blue-700"></span>
                    <h2 class="font-medium text-gray-900">{{ Auth::user()->name }}</h2>
                </div>
                <div>
                    <p class="text-2xl font-medium tracking-tight text-gray-900">
                        Item Total Amount : <span>Rp {{ $this->totalProductAmount }}</span>
                    </p>
                    <p>Produk akan dikirim dalam 3 hingga 5 hari.</p>
                </div>
            </div>
        </div>
        {{-- Right Column --}}
        <div class="bg-white py-12">
            <div class="max-w-lg mx-auto border border-warning">
                <form>
                    {{-- Full Name --}}
                    <div class="flex flex-col mb-6">
                        <label class="auth-label">Nama Lengkap</label>
                        <input type="text" wire:model="fullname" id="fullname" class="auth-input" />
                        @error('fullname')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Phone --}}
                    <div class="flex flex-col mb-6">
                        <label class="auth-label">Nomor HP</label>
                        <input type="number" wire:model="phone" id="phone" class="auth-input" />
                        @error('phone')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Email --}}
                    <div class="flex flex-col mb-6">
                        <label class="auth-label">Email</label>
                        <input type="email" wire:model="email" id="email" class="auth-input" />
                        @error('email')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Pin Code --}}
                    <div class="flex flex-col mb-6">
                        <label class="auth-label">Kode Pin</label>
                        <input type="number" wire:model="pincode" id="pincode" class="auth-input" />
                        @error('pincode')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Address --}}
                    <div class="flex flex-col mb-6">
                        <label class="auth-label">Alamat</label>
                        <textarea wire:model="address" id="address" class="auth-input resize-none h-24"></textarea>
                        @error('address')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Submit --}}
                    <div class="flex flex-col space-y-3 items-center justify-center" wire:ignore>
                        <button type="submit" wire:click="codOrder" class="w-1/2 text-sm text-white font-medium bg-warning hover:bg-yellow-700 focus:outline-none rounded-md px-5 py-2">Bayar Nanti (COD)</button>
                        <button type="submit" wire:click="placeOrder" class="auth-submit-pay bg-success hover:bg-green-800">Bayar Sekarang</button>
                        {{-- <div class="mx-auto w-1/2" id="paypal-button-container"></div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="flex items-center justify-center w-full h-96 bg-white border border-dark/20 shadow-md shadow-dark/60">
        <div class="w-full text-center mx-auto">
            <p class="text-xl text-dark font-medium mb-9">Tidak ada produk di cart untuk checkout</p>
            <a href="{{ url('collections') }}" class="auth-submit">Belanja sekarang</a>
        </div>
    </div>
    @endif
</div>