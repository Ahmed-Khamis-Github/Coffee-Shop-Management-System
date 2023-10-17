  {{-- <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
 --}}


  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Dashboard</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet"
          href="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/jqvmap/jqvmap.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet"
          href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
  </head>


  <x-auth-session-status class="mb-4" :status="session('status')" />

  @if (session('message'))
      <div class="alert alert-danger">
          {{ session('message') }}
      </div>
  @endif

  <form method="post" action="{{ route('dashboard') }}" style="width: 70%; margin:120px auto">
      @csrf
      <div class="card-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" :value="old('email')"
                  required placeholder="Enter email">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />

          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input name="password" type="password" class="form-control" required id="exampleInputPassword1"
                  placeholder="Password">

              <x-input-error :messages="$errors->get('password')" class="mt-2" />

          </div>


          <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                      href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif

          </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
          <button type="submit" class="btn btn-primary">Login</button>
      </div>
  </form>

  </html>
