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
Route::get('/','PagesController@index');
Route::get('/addExpense','PagesController@addExpense');
Route::get('/transactions','PagesController@transactions');
Route::get('/account','PagesController@account');
Route::get('/receipt','PagesController@receipt');
Route::get('/statistics','PagesController@statistics');
Route::get('/categories','PagesController@categories');
Route::get('users', 'UserChartController@index');
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
