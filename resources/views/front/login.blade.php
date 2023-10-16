@extends('layouts.front')
@section('content')
    <div style="margin: 180px auto 100px ;  width: 70%;">

        <h2 class="mb-4 mt-2"
            style="font-weight: normal;
            margin: auto;
            width: fit-content;
            color: #ccc;">
            Login Now
        </h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="contact-form">
            @csrf
            {{-- email  --}}
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email"
                    :value="{{ old('email') }}" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- password --}}
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Your Password" name="password" required
                    autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

        
            {{-- forget password  --}}
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            {{-- reset password  --}}

            {{-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.reset'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.reset') }}">
                        {{ __('Reset your password?') }}
                    </a>
                @endif
            </div> --}}



            <div class="d-flex justify-content-center">
                <div class="form-group mt-4 mx-2 d-block">
                    <input type="submit" value="Login" class="btn btn-primary py-3 px-4">
                </div>
            
                <div class="form-group mt-4 mx-2 d-block">
                    <a href="{{ route('auth.socialite.redirect', 'google') }}" class="btn btn-primary py-3 px-4">Login with Gmail</a>
                </div>
            
                <div class="form-group mt-4 mx-2 d-block">
                    <a href="{{ route('auth.socialite.redirect', 'github') }}" class="btn btn-primary py-3 px-4">Login with GitHub</a>
                </div>
            </div>
        </form>
    </div>
    {{-- </x-guest-layout> --}}
@endsection
