<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view(
            'posts.index',
            [
                'posts' => Post::latest()->paginate()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        // retornar la vista para crear un nuevo post
        return view('posts.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $slug = Str::slug($request->title);

        // Verificar si el slug ya existe y si es así retornar un error
        if (Post::where('slug', $slug)->exists()) {
            return back()->withInput()->withErrors(['title' => 'El título ya ha sido registrado']);
        }

        // Crear un nuevo post
        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $slug
        ]);

        // Redireccionar a la vista de edición del post
        return redirect()->route('posts.edit', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // retornar la vista para editar un post
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $slug = Str::slug($request->title);

        // Verificar si el slug ya existe y si es así retornar un error (excepto si es el mismo post)
        if (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            return back()->withInput()->withErrors(['title' => 'El título ya ha sido registrado']);
        }

        // Actualizar el post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $slug
        ]);

        // Redireccionar a la vista de edición del post
        return redirect()->route('posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
