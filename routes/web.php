<?php

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
    return redirect(route('imagens'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return redirect(route('imagens'));
});

// imagens
Route::post('/imagens', function () {
    return view('imagens.new');
})->name('imagens.new');

Route::prefix('users')->middleware('auth')->group(function() {
    Route::get('/', 'UsersController@index')->name('users');
    Route::get('create', 'UsersController@create')->name('users.create');
    Route::post('store', 'UsersController@store')->name('users.store');
    Route::get('{id}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('update', 'UsersController@update')->name('users.update');
    Route::get('{id}/delete', 'UsersController@delete')->name('users.delete');
});

Route::prefix('imagens')->group(function() {
    Route::get('/', 'imagensController@index')->middleware('auth')->name('imagens');
    Route::get('create', 'imagensController@create')->middleware('auth')->name('imagens.create');
    Route::post('store', 'imagensController@store')->middleware('auth')->name('imagens.store');
    Route::get('{id}/edit', 'imagensController@edit')->middleware('auth')->name('imagens.edit');
    Route::put('{id}/update', 'imagensController@update')->middleware('auth')->name('imagens.update');
    Route::get('{id}/delete', 'imagensController@delete')->middleware('auth')->name('imagens.delete');
});
