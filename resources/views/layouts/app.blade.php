<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/jpeg" href="/images/icon/SES LOGO RENEW.png">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            html,
            body {
                min-height: 100%;
                background-color: transparent;
            }

            body:not(.no-bg) {
                background-image: url('/upkb/images/bg1.png'), url('/images/bg1.png');
                background-attachment: fixed;
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
                background-color: transparent;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-transparent">
        <div class="min-h-screen bg-transparent">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('components.social-float')
        </div>
    </body>
</html>
