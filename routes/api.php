<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('users', 'UsersController');

    Route::resource('Messages', 'MessagesController');

    Route::resource('channels', 'ChannelsController');
    Route::group(['prefix' => 'channels'], function() {
        Route::resource('channel.users', 'ChannelUsersController');
        Route::resource('channel.messages', 'ChannelMessagesController');
    });
});