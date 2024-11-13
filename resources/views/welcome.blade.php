<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Warehouse Management') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            html, body {
                height: 100%;
                font-family: 'Figtree', sans-serif;
                background-color: #e5e7eb; /* Light gray */
                color: #374151; /* Dark gray for text */
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                overflow: hidden;
            }
            .container {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                max-width: 100%;
            }
            .title {
                font-size: 3rem;
                color: #374151;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin: 0.5rem 0;
            }
            .description {
                font-size: 1.25rem;
                color: #4b5563;
                margin: 0.5rem 0 2rem;
            }
            .links {
                display: flex;
                gap: 1.5rem;
                justify-content: center;
            }
            .links > a {
                color: #ffffff;
                background-color: #374151;
                padding: 0.75rem 1.5rem;
                font-weight: 600;
                font-size: 1rem;
                text-decoration: none;
                text-transform: uppercase;
                border-radius: 5px;
                transition: background-color 0.3s, color 0.3s;
            }
            .links > a:hover {
                background-color: #4b5563; /* Slightly lighter gray for hover */
            }
            footer {
                width: 100vw; /* Full width of the screen */
                padding: 1rem;
                background-color: #374151;
                color: #ffffff;
                font-size: 0.875rem;
                text-align: center;
                position: relative;
                bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="title">
                Welcome to Warehouse Management
            </div>

            <div class="description">
                Streamline your inventory and optimize warehouse operations efficiently.
            </div>

            <div class="links">
                @if (Route::has('login'))
                    <div class="links">
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <footer>
            &copy; {{ date('Y') }} Warehouse Management. All rights reserved.
        </footer>
    </body>
</html>

