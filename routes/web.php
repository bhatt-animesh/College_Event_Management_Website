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
Route::group(['namespace' => 'user'], function () {
	Route::group(['middlewareGroups' => ['web']], function () {
		Route::get('/', 'UserController@home');
		Route::get('/events', 'UserController@events');
		Route::get('/gallery', 'UserController@gallery');
		Route::get('/results', 'UserController@results');
		Route::get('/ourteam', 'UserController@ourteam');
		Route::get('/profile', 'UserController@profile');
		Route::get('/home', 'UserController@home');
		Route::get('/verify', 'UserController@verify');
		Route::post('/verified', 'UserController@verified');
		Route::post('/resend', 'UserController@resend');
		Route::get('/forgot', 'UserController@forgot');
		Route::get('/events/sports', 'EventsController@sports');
		Route::get('/events/technical', 'EventsController@technical');
		Route::get('/events/cultural', 'EventsController@cultural');
		Route::post('/events/show', 'EventsController@show');
		Route::post('/participate/solo', 'ParticipateController@solo');
		Route::post('/participate/team', 'ParticipateController@team');
	});
});
Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {

	Route::group(['middleware' => ['AdminAuth']],function(){
		Route::get('home', 'AdminController@home');
		Route::post('changePassword', 'AdminController@changePassword');

		Route::get('category', 'CategoryController@index');
		Route::post('category/store', 'CategoryController@store');
		Route::get('category/list', 'CategoryController@list');
		Route::post('category/show', 'CategoryController@show');
		Route::post('category/update', 'CategoryController@update');
		Route::post('category/status', 'CategoryController@status');

		Route::get('events', 'EventsController@index');
		Route::post('events/store', 'EventsController@store');
		Route::get('events/list', 'EventsController@list');
		Route::post('events/show', 'EventsController@show');
		Route::post('events/update', 'EventsController@update');
		Route::post('events/status', 'EventsController@status');
		Route::get('events/export/{type}', 'EventsController@export');

		Route::get('drs', 'DrsController@index');
		Route::post('drs/store', 'DrsController@store');
		Route::get('drs/list', 'DrsController@list');
		Route::post('drs/show', 'DrsController@show');
		Route::post('drs/update', 'DrsController@update');
		Route::post('drs/status', 'DrsController@status');

		Route::get('ourteam', 'OurteamController@index');
		Route::post('ourteam/store', 'OurteamController@store');
		Route::get('ourteam/list', 'OurteamController@list');
		Route::post('ourteam/show', 'OurteamController@show');
		Route::post('ourteam/update', 'OurteamController@update');
		Route::post('ourteam/status', 'OurteamController@status');
		Route::post('ourteam/destroy', 'OurteamController@destroy');

		Route::get('Gallery', 'galleryController@index');
		Route::post('Gallery/store', 'galleryController@store');
		Route::get('Gallery/list', 'galleryController@list');
		Route::post('Gallery/show', 'galleryController@show');
		Route::post('Gallery/update', 'galleryController@update');
		Route::post('Gallery/status', 'galleryController@status');
		Route::post('Gallery/destroy', 'galleryController@destroy');

		Route::get('hodreg', 'HodController@index');
		Route::post('hodreg/getitem', 'HodController@getitem');
		Route::post('hodreg/store', 'HodController@store');
		Route::get('hodreg/list', 'HodController@list');
		Route::post('hodreg/show', 'HodController@show');
		Route::post('hodreg/update', 'HodController@update');
		Route::post('hodreg/status', 'HodController@status');

		Route::get('users', 'UserController@index');
		Route::post('users/store', 'UserController@store');
		Route::get('users/list', 'UserController@list');
		Route::post('users/show', 'UserController@show');
		Route::post('users/update', 'UserController@update');
		Route::post('users/status', 'UserController@status');

		Route::get('results', 'ResultController@index');
		Route::post('results/store', 'ResultController@store');
		Route::get('results/list', 'ResultController@list');
		Route::post('results/show', 'ResultController@show');
		Route::post('results/update', 'ResultController@update');
		Route::post('results/status', 'ResultController@status');

		Route::get('settings', 'AboutController@index');
		Route::post('about/update', 'AboutController@update');


		Route::get('time', 'TimeController@index');
		Route::post('time/store', 'TimeController@store');
		Route::get('time/list', 'TimeController@list');
		Route::post('time/show', 'TimeController@show');
		Route::post('time/update', 'TimeController@update');
		Route::post('time/destroy', 'TimeController@destroy');

		Route::get('privacypolicy', 'PrivacyPolicyController@index');
		Route::post('privacypolicy/update', 'PrivacyPolicyController@update');

		Route::get('termscondition', 'TermsController@index');
		Route::post('termscondition/update', 'TermsController@update');
		
	});

	Route::get('logout', 'AdminController@logout');
});

Auth::routes();

