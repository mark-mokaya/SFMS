<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index')->with('Expenses', $expenses);
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
        return view('expenses.create')->with('Accounts', $Accounts)->with('Categories', $Categories);
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
            'amount'  => 'required'
         ]);

         //Create expense
         $expense = new Expense;
         $expense->category_id = 1;
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
        //
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
        //
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
