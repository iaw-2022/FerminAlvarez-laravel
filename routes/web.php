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

Route::resource('books', 'App\Http\Controllers\BookController')->middleware(['auth','role:admin']);

Route::resource('bookshops', 'App\Http\Controllers\BookshopController')->middleware(['auth','role:bookshopOwner']);

Route::resource('suscribers', 'App\Http\Controllers\SuscriberController')->middleware(['auth','role:admin']);

Route::resource('authors', 'App\Http\Controllers\AuthorController')->middleware(['auth','role:admin']);

Route::get('/bookshop/{id}/book/{ISBN}', [BookshopController::class, 'showOnlinePrice'])->middleware(['auth','role:admin']);

Route::put('/bookshop/{id}/book/{ISBN}/update', [BookshopController::class, 'updatePrice'])->middleware(['auth','role:admin']);

require __DIR__ . '/auth.php';
