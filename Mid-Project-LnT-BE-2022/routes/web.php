<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;

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

Route::get('/book', function () {
    return view('index');
});

Route::get('/book', 'App\Http\Controllers\bookController@add_book_form')->name('book.add');
Route::post('/book', 'App\Http\Controllers\bookController@submit_book_data')->name('book.save');
Route::get('/book/list', 'App\Http\Controllers\bookController@fetch_all_book')->name('book.list');
Route::get('/book/edit/{book}', 'App\Http\Controllers\bookController@edit_book_form')->name('book.edit');
Route::patch('/book/edit/{book}', 'App\Http\Controllers\bookController@edit_book_form_submit')->name('book.update');
Route::get('/book/{book}', 'App\Http\Controllers\bookController@view_single_book')->name('book.view');
Route::delete('/book/{book}', 'App\Http\Controllers\bookController@delete_book')->name('book.delete');