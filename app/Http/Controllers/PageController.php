<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function blog()
    {
        return view('blog');
    }

    public function post()
    {
        return view('post');
    }
}
