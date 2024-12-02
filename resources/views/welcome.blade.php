<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Warehouse Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles (using Tailwind) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-900 text-gray-300">

    <!-- Main Container -->
    <div class="flex-grow flex flex-col items-center justify-center text-center px-4">

        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-yellow-400 uppercase tracking-wide mb-4">
            Welcome to Warehouse Management
        </h1>

        <!-- Description -->
        <p class="text-lg sm:text-xl text-yellow-300 mb-6 max-w-xl leading-relaxed">
            Streamline your inventory and optimize warehouse operations efficiently.
        </p>

        <!-- Links -->
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 w-full sm:w-auto">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 w-full sm:w-auto">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="px-6 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-lg hover:bg-yellow-600 transition duration-200 w-full sm:w-auto">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full py-4 bg-yellow-500 text-gray-900 text-sm text-center mt-auto">
        &copy; {{ date('Y') }} Warehouse Management. All rights reserved.
    </footer>

</body>
</html>