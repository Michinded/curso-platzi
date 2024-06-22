<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Listado de publicaciones") }}
                    <div class="flex justify-end">
                        <div class="bg-gray-500 hover:bg-gray-700 text-white rounded">
                            <a href="{{ route('posts.create') }}" class="font-bold py-4 px-4 rounded">
                                Crear post
                            </a>
                        </div>
                    </div>
                    <table class="mb-4">
                        <th class="py-2 px-6">Título</th>
                        <th class="py-2 px-6">Autor</th>
                        <th class="py-2 px-6">Creado</th>
                        <th class="py-2 px-6">Ver en Blog</th>
                        <th class="py-2 px-6">Acciones</th>
                        @forelse ($posts as $post)
                        <tr class="border-b border-gray-200 text-sm">
                            <td class="py-2 px-6">{{ $post->title }}</td>
                            <td class="py-2 px-6">{{ $post->user->name }}</td>
                            <td class="py-2 px-6">{{ $post->created_at->format('d/m/Y') }}</td>
                            <td class="py-2 px-6"><a href="{{ route('post', $post->slug)}} " class="block mt-2 text-blue-500 hover:text-blue-700">Ver completo</a></td>
                            <td class="py-2 px-6 flex">
                                 <form action="{{route('posts.destroy', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                    type="submit" 
                                    class="text-red-500 hover:text-red-700 px-6"
                                    onclick="return confirm('¿Estás seguro de eliminar este post? Esta acción no se puede deshacer. \nPost: {{$post->title}}')"
                                    >
                                    Eliminar
                                    </button>
                                 </form>
                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:text-blue-700 px-6">Editar</a>
                            </td>
                        </tr>
                        @empty
                            <div class="border-b border-gray-200 text-lg py-6">
                                Upps! parece que aún no hay publicaciones.
                            </div>
                        @endforelse
                    </table>
                    @if ($posts)
                        <div class="flex justify-center mt-4">
                        {{ $posts->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>