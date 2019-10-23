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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/stats', function () {
    return view('pages.statistics');
});



// User Module Navigation

Route::get('/home', 'PagesController@home');

Route::get('/expense', 'PagesController@expense');

Route::get('/addExpense', 'PagesController@addExpense');

Route::get('/addReceipt', 'PagesController@addReceipt');



//Routing - Other Controllers

Route::resource('accounts', 'AccountsController');

Route::resource('budgets', 'BudgetsController');
 Route::resource('expenses', 'ExpensesController');

Route::resource('categories', 'CategoriesController');

Route::resource('receipts', 'ReceiptsController');

Auth::routes(['verify' => true]);
Route::get('admin/check',function(){
    return "This route can only be accessed by super admin";
})->middleware('role:super');
// Route::get('about', function () {
//     // Only verified users may enter...
// })->middleware('verified');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

