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

Route::get('/','LinkController@feed')->name('home');

Auth::routes();

Route::get('/home', 'LinkController@feed')->name('home');

Route::resource('links','LinkController');

// UPVOTE/DOWNVOTE & SHARE  ROUTES

Route::get('/links/{id}/upvote','LinkController@upvote')->name('upvote');
Route::get('/links/{id}/downvote','LinkController@downvote')->name('downvote');
Route::get('/links/{id}/share','LinkController@share')->name('share');

Route::get('/logout',function(){
	Auth::logout();
	return view('auth.login');
})->name('newlogout');


