@extends('layouts.admin')

@section('title', 'Site Setting')

@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
<form action="{{ url('/admin/settings') }}" method="POST">
    @csrf
    <div class="card-header bg-primary">
        <h3>Website</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="com-md-6 mb-3">
                <label for="">Website Name</label>
                <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Website URL</label>
                <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Page Title</label>
                <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Meta Keywords</label>
                <input type="text" name="meta_keywords" value="{{ $setting->meta_keywords ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" value="{{ $setting->meta_description ?? '' }}" class="form-control">
            </div>
        </div>
    </div>
    {{-- Website Information --}}
    <div class="card-header bg-primary">
        <h3>Website Information</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="com-md-6 mb-3">
                <label for="">Address</label>
                <input type="text" name="address" value="{{ $setting->address ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Phone 1</label>
                <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Phone 2</label>
                <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Email 1</label>
                <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Email 2</label>
                <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control">
            </div>
        </div>
    </div>
    {{-- Website - Social Media --}}
    <div class="card-header bg-primary">
        <h3>Website - Social Media</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="com-md-6 mb-3">
                <label for="">Facebook (Optional)</label>
                <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Instagram (Optional)</label>
                <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control">
            </div>
            <div class="com-md-6 mb-3">
                <label for="">Twitter (Optional)</label>
                <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Settings</button>
</form>
@endsection