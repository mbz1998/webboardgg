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

Auth::routes();

Route::get('/', 'ThreadController@index');
Route::get('threads', 'ThreadController@index');
Route::get('threads/channels/{channel}', 'ThreadController@index');
Route::get('threads/create', 'ThreadController@create');
Route::post('threads', 'ThreadController@store');
Route::get('threads/{thread}', 'ThreadController@show');
Route::delete('threads/{thread}', 'ThreadController@destroy');
Route::get('/threads/{thread}/replies', 'ReplyController@index');
Route::post('/threads/{thread}/replies', 'ReplyController@store');
Route::patch('/replies/{reply}', 'ReplyController@update');
Route::delete('/replies/{reply}', 'ReplyController@destroy');

Route::get('/profiles/{user}', 'ProfileController@show')->name('profile');

Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store');

//Route::get('threads/showchannels/{channel_id}','ChannelsControllor@show');

