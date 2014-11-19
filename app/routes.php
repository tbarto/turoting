<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| Sessions/Login Routes - Tom/20141105
|--------------------------------------------------------------------------
|
| routes for logging in and creating a session
|
*/
Route::get('login','LoginController@index');
Route::get('logout','LoginController@destroy');
Route::resource('sessions','LoginController', array('only'=>array('create','store','destroy')));

/*
|--------------------------------------------------------------------------
| Dashboard Routes - Tom/20141105
|--------------------------------------------------------------------------
|
| Routes for accessing user functions
|
*/
Route::get('dashboard/search','DashboardController@search');
Route::get('dashboard/profile','DashboardController@profile');
Route::get('dashboard/messages','DashboardController@messages');
Route::get('dashboard','DashboardController@index');
// Route::resource('users','DashboardController');

Route::get('dashboard/results','DashboardController@results');
Route::get('api/dropdown/{table}','ApiController@dropdown');