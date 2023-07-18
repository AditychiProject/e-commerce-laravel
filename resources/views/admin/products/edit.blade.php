@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4> Add Product </h4>

      </div>
      <div class="card-body">
        @if (session('message'))
            <p class="alert alert-success">{{ session('message') }}</p>
        @endif
        <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Product Image</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            {{-- Home --}}
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
              <div class="mb-3">
                <label for="category"></label>
                <select name="category_id" class="form-select" id="">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                    {{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="">Product Name</label>
                <input type="text" value="{{ $product->name }}" name="name" class="form-control">
              </div>
              <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" value="{{ $product->slug }}" name="slug" class="form-control">
              </div>
              <div class="mb-3">
                <label for="">Select Brand</label>
                <select name="brand" id="" class="form-select " aria-label=".form-select example">
                  <option selected value="">-- Pilih Brand --</option>
                  @foreach ($brands as $brand)
                  <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>{{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="description">Small Description</label>
                <textarea type="text"  name="small_description" id="description" class="form-control">{{ $product->small_description }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description">Description</label>
                <textarea type="text"  name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            {{-- SEO Tags --}}
            <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
              <div class="col-md-12 mb-3">
                <label for="meta_title">Meta Title</label>
                <input type="text" value="{{ $product->meta_title }}" name="meta_title" id="meta_title" class="form-control">
                @error('meta_title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="meta_description">Meta Description</label>
                <input type="text" value="{{ $product->meta_description }}" name="meta_description" id="meta_description" class="form-control">
                @error('meta_description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12 mb-3">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ $product->small_description }}">
                @error('meta_keyword')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            {{-- Detail --}}
            <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
              <div class="row">
                <div class="mb-3">
                  <label for="original_price">Original Price</label>
                  <input type="text" value="{{ $product->original_price }}" name="original_price" id="original_price" class="form-control">
                  @error('original_price')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="selling_price">Selling Price</label>
                  <input type="text" value="{{ $product->selling_price }}" name="selling_price" id="selling_price" class="form-control">
                  @error('selling_price')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="quantity">Quantity</label>
                  <input type="text" value="{{ $product->quantity }}" name="quantity" id="quantity" class="form-control">
                  @error('quantity')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="trending">Trending</label>
                  <input type="checkbox" {{ $product->trending == '1'?'checked':'' }} name="trending" id="trending">
                  @error('trending')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="featured">Featured</label>
                  <input type="checkbox" {{ $product->featured == '1'?'checked':'' }} name="featured" id="featured">
                  @error('featured')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="status">Status</label>
                  <input type="checkbox" {{ $product->status == '1'?'checked':'' }} name="status" id="status">
                </div>
              </div>
            </div>
            {{-- Product Image --}}
            <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
              <div class="mb-3">
                <label for="">Product Image</label>
                <input type="file" name="image[]" class="form-control" multiple>
              </div>
              <div>
                @if ($product->productImages)
                <div class="row">
                    @foreach ($product->productImages as $image)
                    <div class="col-md-2">
                        <img src="{{ asset($image->image) }}" width="80px" class="me-4" alt="">
                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">remove</a>
                    </div>
                    @endforeach
                </div>
                @else 
                <p>No image</p>
                @endif
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-success">Ubah</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection