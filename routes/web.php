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



//Landing Page Navigation

Route::get('/', function () { 
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/support', function () {
    return view('support');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });



// User Module Navigation

Route::get('/home', 'HomeController@home');


//Routing - Other Controllers

Route::resource('accounts', 'AccountsController');

Route::resource('budgets', 'BudgetsController');

Route::resource('expenses', 'ExpensesController');

Route::resource('categories', 'CategoriesController');

Route::resource('receipts', 'ReceiptsController');

Auth::routes();
Route::get('users', 'UserChartController@index');
Route::get('devices', 'DevicesController@index');$router->post('product','ProductController@createProduct');   //for creating product
Route::get('/deleteUser/{id}','DevicesController@index');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::view('/admin', 'admin');