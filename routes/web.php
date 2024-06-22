<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


// Grupo de rutas
Route::controller(PageController::class)->group(function () {
    Route::get('/',             'home')->name('home');
    Route::get('blog',          'blog')->name('blog');
    Route::get('blog/slug',     'post')->name('post');
});
