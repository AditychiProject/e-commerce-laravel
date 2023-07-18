@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Category </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $category->name}}" name="name" id="name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" value="{{ $category->slug}}" name="slug" id="slug" class="form-control">
                            @error('slug')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                            <input type="text" value="{{ $category->description}}" name="description" id="description" class="form-control">
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px" alt="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status {{ $category->status == '1' ? 'checked':''}}" id="status" >
                        </div>
                        <h4>SEO Tags</h4>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" value="{{ $category->meta_title}}" name="meta_title" id="meta_title" class="form-control">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <input type="text" value="{{ $category->meta_description}}" name="meta_description" id="meta_description" class="form-control">
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <input type="text" value="{{ $category->meta_keyword}}" name="meta_keyword" id="meta_keyword" class="form-control">
                            @error('meta_keyword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection