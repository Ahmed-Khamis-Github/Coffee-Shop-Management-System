@extends('layouts.front')
@section('content')
    <div style="margin: 180px auto 100px ;  width: 70%;">

        <h2 class="mb-4 mt-2"
            style="font-weight: normal;
            margin: auto;
            width: fit-content;
            color: #ccc;">
            Reset Your Password
        </h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email"
                    :value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>



            <!-- Password -->
            <div class="form-group">
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="form-group mt-4 mx-auto d-block w-25">
                <input type="submit" value="Reset" class="btn btn-primary py-3 px-5">
            </div>

    </div>
    </form>
    </div>
@endsection
