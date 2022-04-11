<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', 'App\Http\Controllers\BookController');

Route::resource('authors', 'App\Http\Controllers\AuthorController');

Route::resource('bookshops', 'App\Http\Controllers\BookshopController');

Route::get('/bookshop/{id}',[App\Http\Controllers\BookshopController::class, 'show']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
