<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $expenses = Expense::orderBy('amount', 'desc')->take(5)->get();
        $categories = Category::all();
        return view('expenses.index',['Expenses' => $expenses,'Categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Accounts = DB::table('accounts')->select('id','acc_name')->get();
        $Categories = DB::table('categories')->select('id','category_name')->get();
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
            'user_id' => 'required',
            'category' => 'required',
            'account_name' => 'required',
            'amount'  => 'required'
         ]);

         //Create expense
         $expense = new Expense;
         $expense->user_id = $request->input('user_id');
         $expense->category_id = $request->input('category');;
         $expense->acc_id = $request->input('account_name');
         $expense->amount = $request->input('amount');
         $expense->save();
         return redirect('/expenses')->with('success', 'New Expense added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::find($id);
        return view('expenses.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        $Accounts = DB::table('accounts')->select('id','acc_name')->get();
        $Categories = DB::table('categories')->select('id','category_name')->get();
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
        //$expense->user_id = $request->input('user_id');
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
