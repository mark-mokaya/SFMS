<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Budgets = Budget::all();
        return view('budgets.index')->with('Budgets', $Budgets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budgets.create');
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
            'budget_name' => 'required',
            'amount'  => 'required'
         ]);

         //Create Budget
         $budget = new Budget;
         $budget->budget_name = ucfirst($request->input('budget_name'));
         $budget->amount = $request->input('amount');
         $budget->description = $request->input('description');
         $budget->save();
         return redirect('/budgets')->with('success', 'New Budget Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::find($id);
        return view('budgets.show')->with('budget', $budget);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = Budget::find($id);
        return view('budgets.edit')->with('budget', $budget);
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
        $this->validate($request, [
            'budget_name' => 'required',
            'amount'  => 'required'
         ]);

         //Update Budget
         $budget = Budget::find($id);
         $budget->budget_name = ucfirst($request->input('budget_name'));
         $budget->amount = $request->input('amount');
         $budget->description = ucfirst($request->input('description'));
         $budget->save();
         return redirect('/budgets')->with('success', $budget->budget_name.' Budget Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::find($id);
        $budget->delete();
        return redirect('/budgets')->with('success', $budget->budget_name.' Budget Deleted');
    }
}
