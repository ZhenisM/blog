<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');


Route::middleware("auth")->group(function () {
	Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware("guest")->group(function () {
	Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
	Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
	Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
	Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
});



