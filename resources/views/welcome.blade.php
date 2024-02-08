<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Personalized Title</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Custom Styles */
        body {
            font-family: 'figtree', sans-serif;
            color: #333;
            background-color: #f7fafc;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4a90e2;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #3572c6;
        }
        .top-right {
            position: fixed;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative sm:flex sm:justify-between sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-left z-10">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn ml-4">Register</a>
            @endif
        @endauth
    </div>
    <div class="top-right">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
        @endauth
    </div>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <!-- Your content here -->
    </div>
</div>
</body>
</html>
