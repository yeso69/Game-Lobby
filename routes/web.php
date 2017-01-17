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

Route::get('/teams/list', 'TeamController@showAllTeams')->name('teams.list');
Route::post('/teams/getTeamsByGame', 'TeamController@getTeamsByGame')->name('teams.getTeamsGame');

Route::resource('teams', 'TeamController');

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
Route::post('/message/sendMessage','MessageController@sendMessage');




Route::get('/message/getConv','MessageController@getConv')->name('message.getConv');
Route::get('/message/showConv/{id}','MessageController@showConv')->name('message.showConv');
