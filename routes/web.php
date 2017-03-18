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

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// });

Route::get('/', 'MainController@inventory');

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::get('/updateUser', 'UpdateUserController@update');
// Route::get('/updateUser', 'UpdateUserController@index');
// Route::post('/updateUser', 'UpdateUserController@update');
