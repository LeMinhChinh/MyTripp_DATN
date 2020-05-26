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
Route::post('handle-login', 'User\UserController@handleLogin')->name('handleLogin');
Route::post('review-handle-login', 'User\UserController@reviewHandleLogin')->name('reviewHandleLogin');
Route::get('register', 'User\UserController@register')->name('register');
Route::post('handle-register', 'User\UserController@handleRegister')->name('handleRegister');
Route::get('handle-logout','User\UserController@handleLogout')->name('handleLogout');

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User'
], function () {
    Route::get('room','UserController@room')->name('room');

    Route::get('resting-place/{id}','UserController@restingplace')->name('restingplace');
    Route::get('search-resting-place','UserController@searchrestingplace')->name('searchrestingplace');
    Route::get('list-resting-place/{idp}~{idt}','UserController@listRestingPlace')->name('listRestingPlace');
    Route::get('review-resting-place/{idrp}~{idacc}','UserController@reviewRestingPlace')->name('reviewRestingPlace');
    // Route::get('list-type-resting-place/{id}','UserController@listTypeRestingPlace')->name('listTypeRestingPlace');

    Route::get('personal-information/{id}','UserController@personalInformation')->name('personalInformation');
    Route::post('update-personal-information/{id}','UserController@handleUpdateInfomation')->name('handleUpdateInfomation');
    Route::get('personal-booking','UserController@personalInformation')->name('personalBooking');
    Route::get('personal-notify','UserController@personalInformation')->name('personalNotify');
    Route::get('personal-request','UserController@personalRequest')->name('personalRequest');
});
