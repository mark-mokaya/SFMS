<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Account;
use App\Budget;
use App\Expense;
use App\Category;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderBy('amount', 'desc')->where('user_id', auth()->user()->id)->get();
        $categories = Category::all()->where('user_id', auth()->user()->id);
        return view('expenses.index',['Expenses' => $expenses,'Categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Accounts = DB::table('accounts')->select('id','acc_name')->where('user_id', auth()->user()->id)->get();
        $Categories = DB::table('categories')->select('id','category_name')->where('user_id', auth()->user()->id)->get();
        return view('expenses.create', ['Accounts' => $Accounts, 'Categories' => $Categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'account_name' => 'required',
            'amount'  => 'required',
            'date_created'  => 'required'
         ]);

         //Create expense
         $expense = new Expense;
         $expense->user_id = auth()->user()->id;
         $expense->category_id = $request->input('category');;
         $expense->acc_id = $request->input('account_name');
         $expense->amount = $request->input('amount');
         $expense->save();
         $expense->date_created = $request->input('date_created');

         $account_update = Account::find($request->input('account_name'));
         $account_update->amount -=  $request->input('amount');
         $account_update->save();

         $budgets = DB::table('budgets')->select('id', 'categories', 'amount')->where('user_id', auth()->user()->id)->get();
         
         foreach($budgets as $budget){
             $categories = explode(" ", $budget->categories);
             foreach($categories as $category){
                 if($category == $request->input('category')){
                    $budget_update = Budget::find($budget->id);
                    $budget_update->amount_remaining -= $request->input('amount');
                    $budget_update->save();
                 }
             }
         }
         return redirect('/expenses') ->with('success', 'New Expense added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($period)
    {
        $user_id = auth()->user()->id;
        $expenses = DB::table('expenses')->where('user_id', $user_id)->whereDate('date_created', '>=', $period)->get();
        $expense_categories = "";
        foreach($expenses as $expense){
            $expense_categories = $expense_categories." ".$expense->category_id;
        }
        $expense_categories = explode(" ", $expense_categories);
        $Category = DB::table('categories')->select('category_name')->whereIn('id', $expense_categories)->get();
        return view('expenses.show', ['Expenses' => $expenses, 'Category' => $Category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $user_id = auth()->user()->id;
        $expense = Expense::find($id);
        $Accounts = DB::table('accounts')->select('id','acc_name')->where('user_id', $user_id)->get();
        $Categories = DB::table('categories')->select('id','category_name')->where('user_id', $user_id)->get();
        return view('expenses.edit', ['Expense'=> $expense, 'Accounts' => $Accounts, 'Categories' => $Categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //->where('user_id', auth()->user()->id)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
