@extends('layouts.layout')

@section('title', 'Todos los blogs')

@section('content')
    <h1>Blogs</h1>
    <p>Este es el contenido de la página de blogs.</p>
    <!-- Lista de blogs en tarjetas -->
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white p-4 shadow rounded">
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
