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

Route::get('/account', 'PagesController@account');

Route::get('/budget', 'PagesController@budget');

Route::get('/expense', 'PagesController@expense');

Route::get('/addAccount', 'PagesController@addAccount');

Route::get('/addExpense', 'PagesController@addExpense');

Route::get('/addReceipt', 'PagesController@addReceipt');

Route::get('/addBudget', 'PagesController@addBudget');



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