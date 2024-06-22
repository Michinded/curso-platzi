@csrf

<!-- Back Button -->
<div class="flex justify-end">
    <a href="{{ route('posts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Volver
    </a>
</div>

<div class="mb-4">
    <!-- Title -->
    <x-input-label for="title" :value="__('Título')" />
    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required autofocus autocomplete="title" />
    <span class="text-red-500">
        @error('title')
        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
        @enderror
    </span>
    <!-- Body -->
    <x-input-label for="body" :value="__('Contenido')" />
    <textarea name="body" id="body" cols="30" rows="10" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{old('body', $post->body)}}</textarea>
    <span class="text-red-500">
        @error('body')
        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
        @enderror
    </span>
</div>

<div>
    <!-- Buttons -->
    <!-- Submit Button -->
    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Enviar
    </button>
</div>
