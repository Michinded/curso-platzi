<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
    <!-- Header -->
    <header class="bg-gray-800">
        <nav class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center">
                <a href="{{route('home')}}" class="ml-4 text-gray-300 hover:text-white">Inicio</a>
                <a href="{{route('blog')}}" class="ml-4 text-gray-300 hover:text-white">Blogs</a>
                <a href="#" class="ml-4 text-gray-300 hover:text-white">About</a>
            </div>
            <div class="flex items-center">
                @auth
                    <a href="{{route('dashboard')}}" class="ml-4 text-gray-300 hover:text-white">Dashboard</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="ml-4 text-gray-300 hover:text-white">Logout</button>
                    </form>
                @else
                    <a href="{{route('login')}}" class="ml-4 text-gray-300 hover:text-white">Login</a>
                    <a href="{{route('register')}}" class="ml-4 text-gray-300 hover:text-white">Register</a>
                @endauth
            </div>
        </nav>
    </header>
    <div style="background-color: #335788" class="w-max">
        @yield('content')
    </div>
    
    @yield('scripts')
</body>
</html>