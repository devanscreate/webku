{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.guest')
@section('title')
    Login
@endsection
@section('content')
<div class="card mb-3">

    <div class="card-body">

        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
            <p class="text-center small">Enter your Email & password to login</p>
        </div>
        <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                        id="email" required>
                    <div class="invalid-feedback">Please enter your Email.</div>
                </div>
            </div>

            <!-- Password -->
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                    id="password" required autocomplete="current-password">
                <div class="invalid-feedback">Please enter your password!</div>
            </div>

            <!-- Remember Me -->
            {{-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                        value="true" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
            </div> --}}

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>

            <div class="col-12">
                <p class="small mb-0">Don't have account? <a
                        href="{{ url('/register') }}">Create an account</a></p>
            </div>
    
            {{-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div> --}}
        </form>
    </div>
</div>
@endsection