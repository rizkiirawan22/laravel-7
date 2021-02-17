<?php

use Illuminate\Support\Facades\Auth;
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


// Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::prefix('posts')->middleware(['auth'])->group(function () {
    Route::get('', 'App\Http\Controllers\PostController@index')->name('posts.index')->withoutMiddleware('auth');
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('posts.create');
    Route::post('store', 'App\Http\Controllers\PostController@store');
    Route::get('{post:slug}/edit', 'App\Http\Controllers\PostController@edit');
    Route::patch('{post:slug}/edit', 'App\Http\Controllers\PostController@update');
    Route::delete('{post:slug}/delete', 'App\Http\Controllers\PostController@destroy');
    Route::get('{post:slug}', 'App\Http\Controllers\PostController@show')->withoutMiddleware('auth');
});
Route::get('categories/{category:slug}', 'App\Http\Controllers\CategoryController@show');
Route::get('tags/{tag:slug}', 'App\Http\Controllers\TagController@show');

Route::view('contact', 'contact');
Route::view('about', 'about');
Route::view('login', 'login');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
