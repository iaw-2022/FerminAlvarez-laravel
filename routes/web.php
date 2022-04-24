<?php

use App\Http\Controllers\BookshopController;
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

Route::resource('bookshops', 'App\Http\Controllers\BookshopController')->middleware(['auth']);

Route::resource('suscribers', 'App\Http\Controllers\SuscriberController')->middleware(['auth']);

Route::resource('authors', 'App\Http\Controllers\AuthorController')->middleware(['auth']);

Route::resource('users', 'App\Http\Controllers\UserController')->middleware(['auth']);

Route::get('/bookshop/{bookshop}/book/{ISBN}', [BookshopController::class, 'showOnlinePrice'])->middleware(['auth']);

Route::put('/bookshop/{bookshop}/book/{ISBN}/update', [BookshopController::class, 'updatePrice'])->middleware(['auth']);


require __DIR__ . '/auth.php';
