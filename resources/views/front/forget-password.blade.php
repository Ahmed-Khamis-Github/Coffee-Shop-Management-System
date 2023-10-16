@extends('layouts.front')
@section('content')
    <div style="margin: 180px auto 100px ;  width: 70%;">

        <h2 class="mb-4 mt-2"
            style="font-weight: normal;
            margin: auto;
            width: fit-content;
            color: #ccc;">
            Forgot Your Password !
        </h2>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->

            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" :value="{{ old('email') }}"
                    required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-group mt-4 mx-auto d-block w-25">
                <input type="submit" value="Send Password via email" class="btn btn-primary py-3 px-5">
            </div>

    </div>
    </form>
    </div>
@endsection
