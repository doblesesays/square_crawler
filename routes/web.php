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

Auth::routes();

Route::get('/', 'MainController@inventory');

Route::get('/home', 'HomeController@index');

//Profile routes
Route::get('/updateProfile', 'ProfileController@updateProfile');
Route::post('/updateProfile', [ 'as' => 'updateProfile', 'uses' => 'ProfileController@updateSave']);
