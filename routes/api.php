<?php

use Illuminate\Http\Request;
use App\Job;

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

Route::get('jobs', 'jobsApiController@index');
Route::post('jobs', 'jobsApiController@store');
Route::put('job/{id}', 'jobsApiController@store');
Route::resource('job', 'jobsApiController');