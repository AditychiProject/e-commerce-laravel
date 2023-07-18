<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $quantityCount = 1;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Produk sudah ditambahkan ke keranjang',
                        'type' => 'error',
                        'status' => 404
                    ]);
                } else {
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity >= $this->quantityCount) {
                            // Tambahkan produk ke keranjang
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAddedUpdated');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Produk berhasil ditambahkan ke keranjang',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Hanya ada' . $this->product->quantity . 'stok produk yang tersedia',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Stok kosong',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Produk tidak tersedia',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Silakan login untuk menambahkan produk ke keranjang',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Produk sudah tersedia di wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Produk sudah tersedia di wishlist',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Produk berhasil ditambahkan ke wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Produk berhasil ditambahkan ke wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            session()->flash('message', 'Silakan login terlebih dahulu');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Silakan login untuk menambahkan produk ke wishlist',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
}
