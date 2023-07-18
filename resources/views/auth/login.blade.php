@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex max-h-screen h-screen antialiased">
    <div class="justify-center sm:w-96 sm:m-auto">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            {{-- Container --}}
            <div class="flex flex-col space-y-6 border border-gray-300 rounded-lg p-10">
                <h1 class="text-2xl text-dark text-center font-semibold">Login</h1>
                {{-- Email --}}
                <div class="flex flex-col">
                    <label class="auth-label">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" class="auth-input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autocomplete="email" autofocus />
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Password --}}
                <div class="flex flex-col">
                    <label class="auth-label">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="auth-input @error('password') is-invalid @enderror" placeholder="Password" autocomplete="current-password" />
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Submit --}}
                <div class="flex flex-col-reverse sm:flex-row items-center sm:justify-between">
                    <button type="submit" class="auth-submit">{{ __('Login') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection