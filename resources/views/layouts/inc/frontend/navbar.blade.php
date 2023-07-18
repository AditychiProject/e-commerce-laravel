{{-- Navbar --}}
<header class="flex items-center w-full absolute top-0 left-0 z-10 bg-transparent">
  <div class="container">
    <div class="flex items-center justify-between relative">
      {{-- Outfeed Logo --}}
      <div class="px-4">
        <a href="/" class="block text-lg lg:text-2xl text-primary font-lora font-bold py-6">{{ $appSetting->website_name ?? 'website_name' }}</a>
      </div>
      <div class="flex items-center px-4">
        {{-- Hamburger Menu Button --}}
        <button id="hamburger" type="button" class="block lg:hidden absolute right-4">
          <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
          <span class="hamburger-line transition duration-300 ease-in-out"></span>
          <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
        </button>
        {{-- Nav Links --}}
        <nav id="nav-menu" class="hidden lg:block max-w-[250px] lg:max-w-full w-full absolute lg:static top-full right-4 bg-white lg:bg-transparent py-5">
          <ul class="block lg:flex lg:items-center">
            {{-- Home --}}
            <li class="group">
              <a href="{{ url('/') }}" class="navbar-links">Home</a>
            </li>
            {{-- Products --}}
            <li class="group">
              <a href="{{ url('products') }}" class="navbar-links">Product</a>
            </li>
            {{-- Collections --}}
            <li class="group">
              <a href="{{ url('collections') }}" class="navbar-links">Collections</a>
            </li>
            {{-- New Arrivals --}}
            <li class="group">
              <a href="{{ url('new-arrivals') }}" class="navbar-links">New Arrivals</a>
            </li>
            {{-- Featured Products --}}
            <li class="group">
              <a href="{{ url('featured-products') }}" class="navbar-links">Featureds</a>
            </li>
          </ul>
        </nav>
      </div>
      {{-- Search, Cart, Wishlist & Auth --}}
      <div class="flex items-center px-4">
        <ul class="block lg:flex lg:items-center">
          {{-- Cart --}}
          <li class="group">
            <a href="{{ url('cart') }}" class="navbar-icons">
              <i data-feather="shopping-cart" class="w-5 h-5"></i>
              <div class="relative">
                <div class="notif-icon">
                  <span class="notif-icon-number"><livewire:frontend.cart.cart-count></span>
                </div>
              </div>
            </a>
          </li>
          {{-- Wishlist --}}
          <li class="group">
            <a href="{{ url('wishlist') }}" class="navbar-icons">
              <i data-feather="heart" class="w-5 h-5"></i>
              <div class="relative">
                <div class="notif-icon">
                  <span class="notif-icon-number"><livewire:frontend.wishlist-count></span>
                </div>
              </div>
            </a>
          </li>
          {{-- Search --}}
          <li class="group mr-6">
            <div>
              <form action="{{ url('search') }}" method="GET" role="search">
                <span id="search" class="navbar-icons cursor-pointer relative">
                  <i data-feather="search" class="w-5 h-5"></i>
                  <input type="text" name="search" value="{{ Request::get('search') }}" id="searchbox" placeholder="Cari produk disini" class="search-input hidden w-[300px] h-12 absolute top-[65px] right-0 text-dark border-2 border-gray-400 focus:outline-none focus:block p-4" />
                  <label for="searchbox" class="hidden"></label>
                </span>
                <button type="submit" id="tombol-cari" class="opacity-0 hidden" autofocus>cari</button>
              </form>
            </div>
          </li>
          {{-- User Mode --}}
          @guest
          {{-- Login --}}
          @if (Route::has('login'))
          <li class="group max-w-[90px] w-full">
            <a href="{{ route('login') }}" class="dropdown-item text-white bg-primary hover:bg-secondary">{{ __("Login") }}</a>
          </li>
          @endif
          {{-- Register --}}
          @if (Route::has('register'))
          <li class="group max-w-[90px] w-full lg:ml-6">
            <a href="{{ route('register') }}" class="dropdown-item max-h-[44px] text-dark group-hover:text-primary border border-dark">{{ __("Register") }}</a>
          </li>
          @endif
          {{-- Admin Mode --}}
          @else
          <details class="cursor-default w-40 bg-primary" tabindex="0">
            {{-- Dropdown Auth Label --}}
            <summary class="cursor-pointer select-none text-sm text-white text-center capitalize font-semibold truncate m-1 p-1">
              {{ Auth::user()->name }}</i>
            </summary>
            {{-- Dropdown Items --}}
            <ul class="w-40 absolute top-3/4 z-[999] bg-white border border-dark/30 shadow-lg p-2">
              {{-- Dashboard --}}
              <li class="group">
                <a href="{{ url('admin/dashboard') }}" class="dropdown-items">Dashboard</a>
              </li>
              {{-- Logout --}}
              <li class="group">
                <a href="{{ route('logout') }}" class="dropdown-items" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __("Logout") }}
                </a>
              </li>
              <form action="{{ route('logout') }}" method="POST" id="logout-form" class="hidden">
                @csrf
              </form>
            </ul>
          </details>
          @endguest
        </ul>
      </div>
    </div>
  </div>
</header>