<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="main-wrapper">
    <div class="app"
         :class="{ 'sidebar-open': isSidebarOpen }">
        @include('layouts._particles.header')
        @include('layouts._particles.sidebar')

        <article class="content dashboard-page">
            @yield('content')
        </article>

        @include('layouts._particles.footer')
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
