<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="#" class="text-gray-300 hover:text-white">Login</a>
            </div>
        </nav>
    </header>
    @yield('content')
    
    @yield('scripts')
</body>
</html>