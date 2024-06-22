@extends('layouts.layout')

@section('title', 'Post')


@section('content')
    <div class="bg-white dark:bg-gray-800 dark:text-white p-4 shadow rounded">
        <h2 class="text-lg font-bold">{{$post->title}}</h2>
        <!-- autor del post -->
        <p class="text-sm text-gray-500">Por {{$post->user->name}}</p>
        <!-- fecha de publicación -->
        <p class="text-sm text-gray-500">{{$post->created_at->format('d/m/Y')}}</p>
        <!-- contenido del post -->
        <p class="mt-2">{{$post->body}}</p>
    </div>
@endsection