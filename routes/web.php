<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //categoria
    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria/edit/{slug}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categoria/update/{slug}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categoria/delete/{slug}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    //posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/post', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{slug}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{slug}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    //users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');







});
