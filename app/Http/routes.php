<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::post('/SecurityQuestions', 'Auth\PasswordController@getSecurityQuestions');

Route::get('/match/teamSelection', 'MatchController@getTeamSelection');

Route::post('/match/teamSelected', 'MatchController@postTeamSelection');

Route::post('/ResetPassword', 'Auth\PasswordController@resetpassword');

Route::post('/PasswordChanged', 'Auth\PasswordController@changepassword');

Route::get('/ChangeProfile', 'ProfileController@getChangeProfile');

Route::post('/ChangeProfile', 'ProfileController@postChangeProfile');


Route::resource('team','TeamController');
Route::resource('school','SchoolController');
Route::resource('player','PlayerController');
Route::resource('field','FieldController');
Route::resource('tournament','TournamentController');
Route::resource('match','MatchController');
