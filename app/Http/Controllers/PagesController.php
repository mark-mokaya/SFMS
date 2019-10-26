<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Account;
use App\Expense;
use App\Category;
use App\Budget;

class PagesController extends Controller
{
    public function home(){
        $accounts = Account::all()->take(4);
        $budgets = Budget::all()->take(4);
        $expenses = Expense::orderBy('amount', 'desc')->get();
        $categories = Category::all();
        return view('pages.home',['Expenses' => $expenses,'Categories' => $categories, 'Accounts' => $accounts, 'Budgets' => $budgets]);
    }
}
