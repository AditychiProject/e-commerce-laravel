@extends('layouts.app')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

<livewire:frontend.product.index :category="$category" />