<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AlacrisCRM') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/start.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    @if (Route::has('login'))
        <div class="wrapper__menu links">
            @auth
                <a href="">Dashboard</a>
            @else
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            @endauth
        </div>
    @endif

    <div class="wrapper__center">
        <div class="container">
            <h1>{{ config('app.name', 'AlacrisCRM') }}</h1>

            <form method="POST" action="{{ route('login') }}">
                <input type="email"
                       class="form-input"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Email"
                       required
                       autocomplete="email">
                <input type="password"
                       class="form-input"
                       name="password"
                       placeholder="Password"
                       required
                       autocomplete="current-password">

                <label class="form-check">{{ __('Remember Me') }}
                    <input type="checkbox"
                           name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-check-mark"></span>
                </label>

                <button type="submit">
                    {{ __('Login') }}
                </button>
            </form>
            <div class="copyright">
                &copy; AlacrisCRM, 2020
            </div>
        </div>
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
</body>
</html>
