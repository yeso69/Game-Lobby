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

Route::get('/users/addGame','UserController@loadAddGame');



Route::resource('friends', 'FriendController');


Route::resource('users', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/findPlayers', 'FriendController@index');
Route::get('/users/editGame/{id_game}', 'UserController@editGame');
Route::get('/users/deleteGame/{id_game}', 'UserController@deleteGame');
Route::post('/users/addGameData','UserController@addGameData');
Route::post('/users/editGameData','UserController@editGameData');
Route::post('/players/getPlayersByGame','PlayersController@getPlayersByGame');
Route::post('/players/getPlayersByGameAndLevel','PlayersController@getPlayersByGameAndLevel');



