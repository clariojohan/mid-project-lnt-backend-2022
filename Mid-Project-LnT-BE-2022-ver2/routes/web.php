<?php

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
    return redirect('view');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', 'App\Http\Controllers\BookController@viewCreate');
Route::post('/create', 'App\Http\Controllers\BookController@create')->name('createBook');
Route::get('/view', 'App\Http\Controllers\BookController@viewBook');
Route::get('/update/{id}', 'App\Http\Controllers\BookController@viewUpdate'); // jangan ditambahkan untuk bagian page viewUpdate, (pada module tidak ada)
Route::patch('/update/{id}', 'App\Http\Controllers\BookController@update')->name('updateBook');
Route::delete('/delete/{id}', 'App\Http\Controllers\BookController@delete')->name('deleteBook');