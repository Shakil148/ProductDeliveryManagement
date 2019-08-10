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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//middlewares to controller
Route::get('/admin', function(){
    echo "Hello Admin";
})->middleware('admin');
 
Route::get('/moderator', function(){
    echo "Hello Moderator";
})->middleware('moderator');
 
Route::get('/tsm', function(){
    echo "Hello TSM";
})->middleware('tsm');

Route::get('/accounts', function(){
    echo "Hello Accounts";
})->middleware('accounts');