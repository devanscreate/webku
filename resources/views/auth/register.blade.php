{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.guest')
@section('title')
    Register
@endsection
@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                    required autocomplete="name">
                    <div class="invalid-feedback">Please, enter your name!</div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                    required autocomplete="username">
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required autocomplete="new-password">
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                    <div class="invalid-feedback">Confirm your password!</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                </div>

                <div class="col-12">
                    <p class="small mb-0">Sudah Punya Akun? <a href="{{ url('/login') }}">Log in</a></p>
                </div>
            </form>

        </div>
    </div>
@endsection
