<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', env('APP_NAME'))</title>

</head>

@vite(['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js'])
<body class="antialiased">

    @include('shared.flesh')

    <main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-20">
        <div class="container">

            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-block" rel="home">
                    <img src="{{ Vite::image('laravel-logo.svg') }}" class="w-[250px] md:w-[250px] h-[80px] md:h-[80px]">
                </a>
            </div>

            @yield('content')

        </div>
    </main>
</body>
</html><?php
