<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\PostgresBuilder;

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'PageController@index')->name('home');
        Route::resource('tags', 'TagController');
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
});


Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*")->name('guest.home');
