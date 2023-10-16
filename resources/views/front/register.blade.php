@extends('layouts.front')
@section('content')
    <div style="margin: 150px auto 60px ;  width: 70%;">
        <h2 class="mb-4"
            style="font-weight: normal;
        margin: auto;
        width: fit-content;
        color: #ccc;">Join Us Now
        </h2>
        <form method="POST" action="{{ route('register') }}" class="contact-form">
            @csrf

            {{-- name  --}}
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name" :value="{{ old('name') }}"
                    required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            {{-- email  --}}
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email"
                    :value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- password --}}
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Your Password" name="password" required
                    autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            {{-- confirm password  --}}
            <div class="mt-4 form-group">
                <input id="password_confirmation" class="form-control" placeholder="Confirm Password" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4 form-group">
                <input id="image" class="form-control" placeholder="Your profile image" type="file" name="image"
                    :value="{{ old('image') }}" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- remember me  --}}
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>




            <div class="form-group mt-3 mx-auto d-block w-25">
                <input type="submit" value="Register" class="btn btn-primary py-3 px-5">
            </div>
        </form>
    </div>
@endsection
