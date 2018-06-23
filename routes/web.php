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

	

	Route::group(['middleware' => ['visitors']], function(){

		//users-------------------------------------------------------------------------------
		Route::get ('/login',			['as'=>'login', 'uses' => 'LoginController@login']);
		Route::post('/login',			['as'=>'login.post', 'uses' => 'LoginController@postLogin']);
		
		Route::get ('/register',		['as'=>'register', 'uses'=>'RegistrationController@register']);
		Route::post('/register', 		['as'=>'register.post', 'uses' => 'RegistrationController@postRegister']);
		 
		Route::get ('/forgot-password',  ['as'=>'forgot-password', 'uses' => 'ForgotPasswordController@forgotPassword']);
		Route::post('/forgot-password',  ['as'=>'forgot-password.post', 'uses' => 'ForgotPasswordController@postForgotPassword']);
		
		Route::get ('/reset/{email}/{resetCode}',['as'=>'reset', 'uses' => 'ForgotPasswordController@resetPassword']);
		Route::post('/reset/{email}/{resetCode}',['as'=>'reset.post', 'uses' => 'ForgotPasswordController@postResetPassword']);
		
		Route::get ('/activate/{email}/{activationCode}', ['as'=>'activate', 'uses' => 'ActivationController@activate']);
	});

	Route::get('/', function () {    return view('welcome');	});
	
	Route::group(['middleware' => ['has_any_role'], 'prefix' => 'dashboard'], function(){	

		Route::resource('/maires', 	 	'MaireController');
		Route::resource('/infos', 	 	'InfoController');
		Route::resource('/actions', 	'ActionController');
		Route::resource('/equipes', 	'EquipeController');
		Route::resource('/membres', 	'MembreController');
		Route::resource('/sessions', 	'SessionCommunaleController');
		Route::resource('/actualites', 	'ActualiteController');
		Route::resource('/signalement_categories', 	 'SignalementCategoryController');
		Route::resource('/action_categories', 	 'ActionCategoryController');
		Route::resource('/signalements', 'SignalementController');
		Route::resource('/categories',	'CategoryController',['except' => ['create']]);
		
		Route::get('/userapp', ['as' => 'users.app', 'uses' => 'UserappController@index']);

		Route::post('/logout', ['as'=> 'logout' , 'uses' => 'LoginController@logout']);

		Route::get('/', ['as'=>'dashboard', function(){ return view('dashboard.pages.dashboard'); }]);

		Route::get('/search/{search}', ['as'=>'search', 'uses' => 'SearchController@search']);
		Route::post('/search/', ['as'=>'search', 'uses' => 'SearchController@search']);
	});

