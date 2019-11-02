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


//Routing - Other Controllers

Route::resource('accounts', 'AccountsController');

Route::resource('budgets', 'BudgetsController');

Route::resource('expenses', 'ExpensesController');

Route::resource('categories', 'CategoriesController');

Route::resource('receipts', 'ReceiptsController');



/*Extra

// Route::get('/home/{id?}', 'PagesController@home');

Route::get('/', function () {
    return view('index');
});


Route::get('/contact/{id?}', function ($id="No user") {
    return view('contact', ['id'=>$id]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'THIS IS THE ABOUT PAGE']);
});

Route::redirect('/ok', '/');

*/

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('users', 'UserChartController@index');
Route::get('devices', 'DevicesController@index');$router->post('product','ProductController@createProduct');   //for creating product
// $router->get('product/{id}','ProductController@updateProduct'); //for updating product
// $router->post('product/{id}','ProductController@deleteProduct');  // for deleting product
// $router->get('product','ProductController@index'); // for retrieving 


Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm');
Route::get('/admin/register', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::get('/home', 'HomeController@index')->middleware('auth');
Route::view('/admin', 'admin');