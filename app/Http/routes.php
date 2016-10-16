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

Route::get('/', function(){
	return redirect('auth/login');
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => ['auth', 'auth.basic']], function (){
	// Chamadas web
    Route::get('/', 'SintegraController@index');
    Route::get('/consultas', 'SintegraController@consultas');
    Route::get('/deletar-consulta/{id}', 'SintegraController@deletarConsulta');
    Route::get('/visualizar-consulta/{id}', 'SintegraController@visualizarConsulta');

    // Chamadas api
	Route::post('/consultar', 'SintegraController@consultar');
});

