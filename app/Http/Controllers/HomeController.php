<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use DB;
use App\Category;
use App\Budget;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $accounts = Account::all()->where('user_id', $user_id)->take(4);
        $budgets = Budget::all()->where('user_id', $user_id)->take(4);
        $expenses = DB::select("SELECT category_id, SUM(amount) amount FROM expenses WHERE user_id = '$user_id' GROUP BY category_id ORDER BY amount DESC");
        $categories = Category::all()->where('user_id', $user_id);
        return view('pages.home',['Expenses' => $expenses,'Categories' => $categories, 'Accounts' => $accounts, 'Budgets' => $budgets]);
    }
}
