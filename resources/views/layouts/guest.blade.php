<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Warehouse Management') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-800 bg-gray-200 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center py-8 bg-gray-200">
            <!-- Logo -->
            <div class="mb-8">
                <a href="/" class="flex items-center justify-center">
                    <x-application-logo class="w-24 h-24 text-gray-600" />
                    <span class="text-xl font-bold text-gray-700 ml-2">Warehouse Management</span>
                </a>
            </div>

            <!-- Main Content -->
            <div class="w-full sm:max-w-lg  px-8 py-6  rounded-lg  ">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
