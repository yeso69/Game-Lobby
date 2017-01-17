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
    return view('pages.welcome');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/users/addGame', function () {
    return view('users.addGame');
});

Route::resource('friends', 'FriendController');

//Route::resource('message', 'MessageController');

Route::resource('levels', 'GameLevelController');

Route::resource('users', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/findPlayers', 'FriendController@index');
Route::post('/users/addGameData','UserController@addGameData');
Route::get('/message/getConv','MessageController@getConv')->name('message.getConv');
Route::get('/message/showConv/{id}','MessageController@showConv')->name('message.getConv');