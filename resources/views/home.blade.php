@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    @auth
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-6">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">¡Hola {{ Auth::user()->name}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Gracias por visitarnos</p>
    </div>
    @endauth

    <!-- Tarjetas de posts -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ $post->title }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-400">
                        <!-- Preview del contenido del pos maximo 80 caracteres -->
                        {{ Str::limit($post->body, 80) }}
                    </p>
                </div>
                <div class="px-4 py-4 sm:px-6">
                    <a href="{{ route('post', $post->slug) }}" class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">Seguir leyendo</a>
                </div>
            </div>
        @endforeach

@endsection