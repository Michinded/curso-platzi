@extends('layouts.layout')

@section('title', 'Todos los blogs')

@section('content')

    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Todos los blogs</h1>

    <!-- Buscador de blogs -->
    <div class="flex justify-center mt-4">
        <!-- Search bar -->
        <form action="{{ route('blog') }}" method="GET" class="ml-4">
            <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        </form>
    </div>

    <!-- Lista de blogs en tarjetas -->
    <div class="grid grid-cols-3 gap-4 mt-2">
        @foreach ($posts as $post)
            <div class="bg-white p-4 shadow rounded dark:bg-gray-800 dark:text-white">
                <h2 class="text-lg font-bold">{{$post->title}}</h2>
                <!-- autor del post -->
                <p class="text-sm text-gray-500">Por {{$post->user->name}}</p>
                <!-- fecha de publicación -->
                <p class="text-sm text-gray-500">{{$post->created_at->format('d/m/Y')}}</p>
                <!-- botón de leer más -->
                <a href="{{ route('post', $post->slug)}} " class="block mt-2 text-blue-500 hover:text-blue-700">Leer más</a>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mt-4">
        {{ $posts->links()}}
    </div>
@endsection
