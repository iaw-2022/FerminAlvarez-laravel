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

Route::redirect('/', '/login');

Route::resource('books', 'App\Http\Controllers\BookController')->middleware(['auth']);
Route::get('/book/{id}',[App\Http\Controllers\BookController::class, 'show'])->middleware(['auth']);

Route::resource('bookshops', 'App\Http\Controllers\BookshopController')->middleware(['auth']);
Route::get('/bookshop/{id}',[App\Http\Controllers\BookshopController::class, 'show'])->middleware(['auth']);

Route::resource('suscribers', 'App\Http\Controllers\SuscriberController')->middleware(['auth']);
Route::get('/suscriber/{id}',[App\Http\Controllers\SuscriberController::class, 'show'])->middleware(['auth']);
Route::get('/suscriber/{id}/edit',[App\Http\Controllers\SuscriberController::class, 'edit'])->middleware(['auth']);
Route::put('/suscriber/{id}',[App\Http\Controllers\SuscriberController::class, 'update'])->middleware(['auth']);

Route::resource('authors', 'App\Http\Controllers\AuthorController')->middleware(['auth']);
Route::get('/author/{id}',[App\Http\Controllers\AuthorController::class, 'show'])->middleware(['auth']);
Route::get('/author/{id}/edit',[App\Http\Controllers\AuthorController::class, 'edit'])->middleware(['auth']);
Route::put('/author/{id}',[App\Http\Controllers\AuthorController::class, 'update'])->middleware(['auth']);

require __DIR__ . '/auth.php';
