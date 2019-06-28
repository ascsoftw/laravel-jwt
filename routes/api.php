<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => [
		'jwt.auth',
	]], function() {
	Route::get('patients', 'PatientController@index');
	Route::get('patients/{patient}', 'PatientController@show');
	Route::post('patients', 'PatientController@store');
	Route::put('patients/{patient}', 'PatientController@update');
	Route::delete('patients/{id}', 'PatientController@destroy');
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');