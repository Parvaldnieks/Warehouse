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

    <style>
        /* Reset some default styles to remove unwanted space */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #1F2937; /* Dark Gray Background */
            color: #E5E7EB; /* Light Gray Text */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            
        }

        .main-container {
            display: flex;
            flex-direction: column;
            flex: 1;
            align-items: center;
            justify-content: flex-start;
            
        }

        header {
            width: 100%;
            color: #FBBF24; /* Yellow Color for Header Text */
            padding: 1rem 0;
            text-align: center;
        }

        header h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        main {
            width: 100%;
            max-width: 900px;
            padding: 2rem;
            
          
            border-radius: 8px;
            margin-top: 2rem;
            
        }
    </style>
</head>
<body class="antialiased">
    <div class="main-container">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header>
                <h2 class="text-xl font-semibold">{{ $header }}</h2>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
