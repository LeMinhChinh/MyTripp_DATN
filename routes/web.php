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
    Route::get('room/{id}','UserController@room')->name('room');

    Route::get('resting-place/{id}','UserController@restingplace')->name('restingplace');
    Route::get('search-resting-place','UserController@searchrestingplace')->name('searchrestingplace');
    Route::get('list-resting-place/{idp}~{idt}','UserController@listRestingPlace')->name('listRestingPlace');
    Route::get('review-resting-place/{idrp}~{idacc}','UserController@reviewRestingPlace')->name('reviewRestingPlace');

    Route::get('personal-information/{id}','UserController@personalInformation')->name('personalInformation');
    Route::post('update-personal-information/{id}','UserController@handleUpdateInfomation')->name('handleUpdateInfomation');
    Route::get('personal-booking','UserController@personalInformation')->name('personalBooking');

    Route::get('personal-notify/{id}','UserController@personalNotify')->name('personalNotify');

    Route::get('personal-request/{id}','UserController@personalRequest')->name('personalRequest');
    Route::post('handle-personal-request','UserController@handleRequest')->name('handleRequest');

    Route::post('send-feedback','UserController@sendFeedBack')->name('sendFeedBack');

    Route::get('search','SearchController@search')->name('search');

    Route::post('filter-by-type','UserController@filterRPByType')->name('filterRPByType');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['web', 'check.super.admin']
], function () {
    Route::get('dashboard','AdminController@dashboard')->name('dashboard');

    Route::get('account','AdminController@account')->name('account');
    Route::post('delete-account','AdminController@deleteAccount')->name('deleteAccount');

    Route::get('request-owner','AdminController@request')->name('request');
    Route::post('delete-request','AdminController@deleteRequest')->name('deleteRequest');
    Route::post('update-request','AdminController@updateRequest')->name('updateRequest');

    Route::get('feedback','AdminController@feedback')->name('feedback');
    Route::post('delete-feedback','AdminController@deleteFeedback')->name('deleteFeedback');
    Route::post('reply-feedback','AdminController@replyFeedback')->name('replyFeedback');

    Route::get('pricing','AdminController@pricing')->name('pricing');
    Route::post('delete-payment','AdminController@deletePayment')->name('deletePayment');
    Route::post('update-payment','AdminController@updatePayment')->name('updatePayment');
});

Route::group([
    'prefix' => 'owner',
    'as' => 'owner.',
    'namespace' => 'Owner',
    'middleware' => ['web', 'check.super.owner']
], function () {
    Route::get('dashboard','OwnerController@dashboard')->name('dashboard');

    Route::get('general-information/{id}','OwnerController@information')->name('information');
    Route::post('update-general-information/{id}','OwnerController@handleUpdateInfomation')->name('handleUpdateInfomation');

    Route::get('my-hotel/{id}','OwnerController@myHotel')->name('myHotel');
    Route::get('create-hotel','OwnerController@createHotel')->name('createHotel');
    Route::post('handle-create-hotel','OwnerController@handleCreateHotel')->name('handleCreateHotel');
    Route::get('view-hotel/{id}','OwnerController@updateHotel')->name('updateHotel');
    Route::post('handle-update-hotel/{id}','OwnerController@handleUpdateHotel')->name('handleUpdateHotel');
    Route::post('delete-hotel','OwnerController@deleteHotel')->name('deleteHotel');

    Route::get('my-room/{id}','OwnerController@roomHotel')->name('roomHotel');
    Route::get('create-room/{id}','OwnerController@createRoom')->name('createRoom');
    Route::post('handle-create-room','OwnerController@handleCreateRoom')->name('handleCreateRoom');
    Route::get('view-room/{id}','OwnerController@updateRoom')->name('updateRoom');
    Route::post('handle-update-room/{id}','OwnerController@handleUpdateRoom')->name('handleUpdateRoom');
    Route::post('delete-room','OwnerController@deleteRoom')->name('deleteRoom');

    Route::get('pricing-plan/{id}','OwnerController@pricingPlan')->name('pricingPlan');
    Route::get('payment-plan','OwnerController@paymentPlan')->name('paymentPlan');
    Route::post('handle-payment-plan','OwnerController@handlepaymentPlan')->name('handlepaymentPlan');
});
