<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AlacrisCRM</title>

    <!-- Styles -->
    <style>
        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 200;
            src: local('Source Sans Pro ExtraLight'), local('SourceSansPro-ExtraLight'), url(https://fonts.gstatic.com/s/sourcesanspro/v13/6xKydSBYKcSV-LCoeQqfX1RYOo3i94_wlxdr.ttf) format('truetype');
        }

        @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 300;
            src: local('Source Sans Pro Light'), local('SourceSansPro-Light'), url(https://fonts.gstatic.com/s/sourcesanspro/v13/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdr.ttf) format('truetype');
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-weight: 300;
        }

        body {
            background: rgba(233, 233, 233, .35) url("data:image/jpeg;base64,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") repeat-y;
            font-family: 'Source Sans Pro', sans-serif;
            color: #fff;
            font-weight: 300;
        }

        body ::-webkit-input-placeholder {
            /* WebKit browsers */
            font-family: 'Source Sans Pro', sans-serif;
            color: #fff;
            font-weight: 300;
        }

        body :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            font-family: 'Source Sans Pro', sans-serif;
            color: #fff;
            opacity: 1;
            font-weight: 300;
        }

        body ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            opacity: 1;
            font-weight: 300;
        }

        body :-ms-input-placeholder {
            /* Internet Explorer 10+ */
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            font-weight: 300;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            color: #636b6f;
        }

        .position-ref {
            position: relative;
        }

        .full-height {
            height: 100vh;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .copyright {
            font-size: 14px;
            color: #ececec;
        }


        .wrapper {
            background: #50a3a2;
            background: -webkit-gradient(linear, left top, right bottom, from(#50a3a2), to(#53e3a6));
            background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 400px;
            margin-top: -200px;
            overflow: hidden;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 80px 0;
            height: 400px;
            text-align: center;
        }

        .container h1 {
            font-size: 40px;
            -webkit-transition-duration: 1s;
            transition-duration: 1s;
            font-weight: 700;
        }

        form {
            padding: 20px 0;
            position: relative;
            z-index: 2;
        }

        form .form-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: 0;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 0.2);
            width: 250px;
            border-radius: 3px;
            padding: 10px 15px;
            margin: 0 auto 10px auto;
            display: block;
            text-align: center;
            font-size: 18px;
            color: #fff;
            -webkit-transition-duration: 0.25s;
            transition-duration: 0.25s;
            font-weight: 300;
        }

        form .form-input:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        form .form-input:focus {
            background-color: #fff;
            width: 300px;
            color: #53e3a6;
        }

        form button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: 0;
            background-color: #fff;
            border: 0;
            padding: 10px 15px;
            color: #53e3a6;
            border-radius: 3px;
            width: 250px;
            cursor: pointer;
            font-size: 18px;
            -webkit-transition-duration: 0.25s;
            transition-duration: 0.25s;
        }

        form button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        form .form-check {
            display: block;
            position: relative;
            width: 250px;
            margin: 12px auto;
            text-align: left;
            padding-left: 35px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        form .form-check #remember {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        form .form-check-mark {
            position: absolute;
            top: 0;
            left: 0;
            height: 24px;
            width: 24px;
            background-color: #eee;
        }

        form .form-check:hover #remember ~ .form-check-mark {
            background-color: rgba(255, 255, 255, 0.4);
        }

        form .form-check #remember:checked ~ .form-check-mark {
            background-color: #53e3a6;
            border-radius: 3px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            -webkit-transition-duration: 0.25s;
            transition-duration: 0.25s;
        }

        form .form-check-mark:after {
            content: "";
            position: absolute;
            display: none;
        }

        form .form-check #remember:checked ~ .form-check-mark:after {
            display: block;
        }

        .bg-bubbles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .bg-bubbles li {
            position: absolute;
            list-style: none;
            display: block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.15);
            bottom: -160px;
            -webkit-animation: square 25s infinite;
            animation: square 25s infinite;
            -webkit-transition-timing-function: linear;
            transition-timing-function: linear;
        }

        .bg-bubbles li:nth-child(1) {
            left: 10%;
        }

        .bg-bubbles li:nth-child(2) {
            left: 20%;
            width: 80px;
            height: 80px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 17s;
            animation-duration: 17s;
        }

        .bg-bubbles li:nth-child(3) {
            left: 25%;
            -webkit-animation-delay: 4s;
            animation-delay: 4s;
        }

        .bg-bubbles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            -webkit-animation-duration: 22s;
            animation-duration: 22s;
            background-color: rgba(255, 255, 255, 0.25);
        }

        .bg-bubbles li:nth-child(5) {
            left: 70%;
        }

        .bg-bubbles li:nth-child(6) {
            left: 80%;
            width: 120px;
            height: 120px;
            -webkit-animation-delay: 3s;
            animation-delay: 3s;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .bg-bubbles li:nth-child(7) {
            left: 32%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 7s;
            animation-delay: 7s;
        }

        .bg-bubbles li:nth-child(8) {
            left: 55%;
            width: 20px;
            height: 20px;
            -webkit-animation-delay: 15s;
            animation-delay: 15s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
        }

        .bg-bubbles li:nth-child(9) {
            left: 25%;
            width: 10px;
            height: 10px;
            -webkit-animation-delay: 2s;
            animation-delay: 2s;
            -webkit-animation-duration: 40s;
            animation-duration: 40s;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .bg-bubbles li:nth-child(10) {
            left: 90%;
            width: 160px;
            height: 160px;
            -webkit-animation-delay: 11s;
            animation-delay: 11s;
        }

        @-webkit-keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            100% {
                -webkit-transform: translateY(-900px) rotate(700deg);
                transform: translateY(-900px) rotate(700deg);
            }
        }

        @keyframes square {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            100% {
                -webkit-transform: translateY(-900px) rotate(700deg);
                transform: translateY(-900px) rotate(700deg);
            }
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Dashboard</a>
            @else
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="wrapper">
    <div class="container">
        <h1>AlacrisCRM</h1>

        <form class="form" method="POST" action="{{ route('login') }}">
            <input type="email"
                   class="form-input @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="Email"
                   required
                   autocomplete="email">
            <input type="password"
                   class="form-input @error('password') is-invalid @enderror"
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
</body>
</html>
