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

Route::get('/', 'JobsController@index');

Route::resource('job', 'JobsController');
Route::resource('category', 'CategoriesController');

Route::post('/search/findjob', 'JobsController@search');
Route::get('/search/findjob/{category_name}/{cateogry_id}', 'JobsController@searchByCategory');
// Route::get('/search/findjob/key/{job_title}', 'JobsController@searchByTtile');









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
