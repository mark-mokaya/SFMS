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
        $accounts = Account::all()->where('user_id', auth()->user()->id)->take(4);
        $budgets = Budget::all()->where('user_id', auth()->user()->id)->take(4);
        $expenses = Expense::orderBy('amount', 'desc')->where('user_id', auth()->user()->id)->get();
        $categories = Category::all()->where('user_id', auth()->user()->id);
        return view('pages.home',['Expenses' => $expenses,'Categories' => $categories, 'Accounts' => $accounts, 'Budgets' => $budgets]);
    }
}
