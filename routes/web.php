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


Route::middleware("r")->group(function () {
	Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

	Route::post('/contact_form', [\App\Http\Controllers\IndexController::class, 'index'])->name('contact_form');
});

Route::prefix("news")->middleware("r")->group(function () {
	Route::post('{id}', [\App\Http\Controllers\IndexController::class, 'index'])->name('contact_form');
});

