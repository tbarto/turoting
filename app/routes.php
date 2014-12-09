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
Route::resource('login','LoginController', array('only'=>array('index', 'create','store') ) );
Route::get('logout', array( 'as' => 'logout','uses' => 'LoginController@destroy') );

/*
|--------------------------------------------------------------------------
| Dashboard Routes - Tom/20141105
|--------------------------------------------------------------------------
|
| Routes for accessing user functions
|
*/
Route::get('dashboard', array( 'as' => 'dashboard','uses' => 'DashboardController@index') );
Route::get('dashboard/profile', array( 'as' => 'profile', 'uses' => 'ProfilesController@profile') );
Route::get('dashboard/messages', array( 'as' => 'message', 'uses' => 'MessagesController@messages') );
Route::get('dashboard/posts', array( 'as' => 'post', 'uses' => 'PostsController@index') );
Route::get('dashboard/search', array( 'as' => 'search','uses' => 'SearchController@search') );
Route::get('dashboard/results', array( 'as' => 'result','uses' => 'SearchController@results') );
Route::post('dashboard/send-message',array('as'=>'viewModalWindow','uses'=>'MessagesController@modalWindow'));

Route::get('search/results',array('as'=>'search-results','uses'=>'SearchController@results'));
Route::post('messages/store',array('as'=>'message-store','uses'=>'MessagesController@store'));

Route::get('api/dropdown/{table}','ApiController@dropdown');
