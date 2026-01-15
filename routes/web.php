<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome', [
        'posts' => Post::all()
    ]);
})->name('home');


Route::get('/create', [PostController::class, 'create'])->name('create');

Route::post('/store', [PostController::class, 'ourFileStore'])->name('store');

Route::get('/edit/{id}', [PostController::class, 'editFile'])->name('edit');
