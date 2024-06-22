<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Retornamos los 10 últimos posts
        $posts = Post::latest()->take(12)->get();

        // Retornamos la vista home y le pasamos los posts
        return view('home', compact('posts'));
    }

    public function blog(Request $request)
    {

        /*
            Tipos de consultas
            $posts = Post::all(); //Obtiene todos los registros
            $posts = Post::where('status', 2)->get(); //Obtiene los registros que cumplan con la condición
            get() //Obtiene los registros
            first() //Obtiene el primer registro
            find() //Obtiene un registro por su id
            latest() //Obtiene los registros ordenados por la fecha de creación
            oldest() //Obtiene los registros ordenados por la fecha de creación
            orderBy('column', 'asc') //Ordena los registros por la columna indicada
        */

        $search = $request->search;

        //Obtenemos los posts de la base de datos
        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')
            ->latest()->paginate(15);
        return view('blog', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}
