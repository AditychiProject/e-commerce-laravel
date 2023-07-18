@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex max-h-screen h-screen antialiased">
    <div class="justify-center sm:w-96 sm:m-auto">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            {{-- Container --}}
            <div class="flex flex-col space-y-6 border border-gray-300 rounded-lg p-10">
                <h1 class="text-2xl text-dark text-center font-semibold">Register</h1>
                {{-- Name --}}
                <div class="flex flex-col">
                    <label class="auth-label">{{ __("Name") }}</label>
                    <input type="text" name="name" id="name" class="auth-input @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" autocomplete="name" autofocus />
                    @error('name')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Email --}}
                <div class="flex flex-col">
                    <label class="auth-label">{{ __("Email Address") }}</label>
                    <input type="email" name="email" id="email" class="auth-input @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autocomplete="email" />
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Password --}}
                <div class="flex flex-col">
                    <label class="auth-label">{{ __("Password") }}</label>
                    <input type="password" name="password" id="password" class="auth-input @error('password') is-invalid @enderror" placeholder="Password" onkeyup="confirmPasswordAuto()" />
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Confirm Password --}}
                <div class="hidden">
                    <label class="auth-label">{{ __("Confirm Password") }}</label>
                    <input type="password" name="password_confirmation" id="password-confirm" class="auth-input" autocomplete="new-password" />
                </div>
                {{-- Submit --}}
                <div class="flex flex-col-reverse sm:flex-row items-center sm:justify-between">
                    <button type="submit" class="auth-submit">{{ __("Register") }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    // Confirm Password Auto
    function confirmPasswordAuto() {
        var password = document.getElementById("password").value;
        document.getElementById("password-confirm").value =
            generateConfirmPassword(password);

        function generateConfirmPassword(text) {
            return text
                .toString()
                .toLowerCase()
                .replace(/^-+/, "")
                .replace(/-+$/, "")
                .replace(/\s+/g, "-")
                .replace(/\-\-+/g, "-")
                .replace(/[^\w\-]+/g, "");
        }
    }
</script>