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
    return redirect()->route('homepage');
});

Route::get('homepage','User\UserController@homepage')->name('homepage');
Route::get('login', 'User\UserController@login')->name('login');
Route::get('register', 'User\UserController@register')->name('register');

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User'
], function () {
    Route::get('room','UserController@room')->name('room');

    Route::get('resting-place','UserController@restingplace')->name('restingplace');
    Route::get('search-resting-place','UserController@searchrestingplace')->name('searchrestingplace');

    Route::get('personal','UserController@personal')->name('personal');

});
