<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use DB;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Budgets = Budget::all()->where('user_id', auth()->user()->id);
        return view('budgets.index')->with('Budgets', $Budgets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $categories = DB::select("SELECT * FROM categories WHERE user_id = '$user_id'");
        return view('budgets.create', ['Categories' => $categories]);
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
            'budget_period' => 'required',
            'amount'  => 'required',
            'categories'  => 'required',
         ]);

         //Create Budget
         $budget = new Budget;
         $budget->user_id = auth()->user()->id;
         $budget->budget_name = ucfirst($request->input('budget_name'));
         $budget->amount = $request->input('amount');
         $budget->amount_remaining = $request->input('amount');
         $budget->budget_period = date("Y-m-d H:i:s", strtotime($request->input('budget_period')));
         $budget->categories="";
         foreach($request->input('categories') as $category){
            $budget->categories = $budget->categories." ".$category;
         }
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
        $user_id = auth()->user()->id;
        $budget = Budget::find($id);
        $budget_categories = explode(" ", $budget->categories);
        $categories = DB::table('categories')->where('user_id', $user_id)->whereIn('id', $budget_categories)->get();
        $expenses = DB::table('expenses')->where('user_id', $user_id)->whereIn('id', $budget_categories)->orderBy('amount', 'desc')->get();
        return view('budgets.show',['budget' => $budget, 'Expenses' => $expenses, 'Categories' => $categories]);
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
        $budget = Budget::find($id);
        $budget_categories = explode(" ", $budget->categories);
        $categories = DB::table("categories")->where('user_id', $user_id)->whereNotIn('id', $budget_categories)->get();
        $selected_categories = DB::table("categories")->where('user_id', $user_id)->whereIn('id', $budget_categories)->get();
        return view('budgets.edit',['budget' => $budget, 'Categories' => $categories, 'Selected' => $selected_categories]);
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
            'amount'  => 'required',
            'categories' => 'required'
         ]);

         //Update Budget
         $budget = Budget::find($id);
         $budget->budget_name = ucfirst($request->input('budget_name'));
         $budget->amount_remaining += $budget->amount - $request->input('amount');
         $budget->amount = $request->input('amount');
         $budget->budget_period = date("Y-m-d H:i:s", strtotime($request->input('budget_period')));
         $budget->categories="";
         foreach($request->input('categories') as $category){
            $budget->categories = $budget->categories." ".$category;
         }
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
