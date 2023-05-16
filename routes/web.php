<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categoria', [CategoriaController::class, 'index'])->name('index');


});