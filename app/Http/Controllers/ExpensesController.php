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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $expensesByCategory = DB::select("SELECT category_id, SUM(amount) amount FROM expenses WHERE user_id = '$user_id' GROUP BY category_id ORDER BY amount DESC");
        $expensesByDate = DB::table('expenses')->select(DB::raw('SUM(amount) amount'), 'date_created')->where('user_id', $user_id)->groupBy('date_created')->get();
        $categories = Category::all()->where('user_id', auth()->user()->id);
        return view('expenses.index',['Categories' => $categories, 'ExpensesByCategory' => $expensesByCategory, 'ExpensesByDate' => $expensesByDate]);
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
        switch ($request->input('action')) {
            case 'ADD EXPENSE':
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
                $expense->date_created = $request->input('date_created');
                $expense->save();
                
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
                break;
    
            case 'ADD RECEIPT':
                $this->validate($request, [
                    'category' => 'required',
                    'account_name' => 'required',
                    'amount'  => 'nullable',
                    'date_created'  => 'required'
                ]);

                //Create expense
                $expense = new Expense;
                $expense->user_id = auth()->user()->id;
                $expense->category_id = $request->input('category');;
                $expense->acc_id = $request->input('account_name');
                $expense->date_created = $request->input('date_created');
                $expense->save();
                
                $Categories = DB::table('categories')->select('id','category_name')->where('user_id', auth()->user()->id)->get();
                return view('receipts.create', ['Categories' => $Categories, 'Expense' => $expense]);
                break;
        }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($period)
    {
        $title;
        switch($period){
            case date('Y-m-d'):
                $title = "Today";
            break;
            case date('Y-m-d', strtotime('-1 week')):
                $title = "The last 7 days";
            break;
            case date('Y-m-d', strtotime('-30 days')):
                $title = "the last 30 days";
            break;
            default:
                return redirect('/expenses') ->with('error', 'An unexpected error has occured.');
            break;

        }
        $user_id = auth()->user()->id;
        $expenses = DB::table('expenses')->where('user_id', $user_id)->whereDate('date_created', '>=', $period)->get();
        $expense_categories = "";
        foreach($expenses as $expense){
            $expense_categories = $expense_categories." ".$expense->category_id;
        }
        $expense_categories = explode(" ", $expense_categories);
        $expensesByCategory = DB::select("SELECT category_id, SUM(amount) amount FROM expenses WHERE user_id = '$user_id' AND date_created >= '$period' GROUP BY category_id ORDER BY amount DESC");
        $Categories = DB::table('categories')->select('id','category_name')->whereIn('id', $expense_categories)->get();
        return view('expenses.show', ['Expenses' => $expenses, 'Categories' => $Categories, 'Title' => $title,'ExpensesByCategory' => $expensesByCategory]);
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
        $this->validate($request, [
            'category' => 'required',
            'account_name' => 'required',
            'amount'  => 'required',
            'date_created'  => 'required'
         ]);
        
         $expense = Expense::find($id);

         //update prev account
         $account_update = Account::find($expense->acc_id);
         $account_update->amount +=  $expense->amount;
         $account_update->save();

         //update new account
         $account_update = Account::find($request->input('account_name'));
         $account_update->amount -=  $expense->amount;
         $account_update->save();

         //update prev budget
         $budgets = DB::table('budgets')->select('id', 'categories', 'amount')->where('user_id', auth()->user()->id)->get();

         foreach($budgets as $budget){
             $categories = explode(" ", $budget->categories);
             foreach($categories as $category){
                 if($category == $expense->category_id){
                    $budget_update = Budget::find($budget->id);
                    $budget_update->amount_remaining += $expense->amount;
                    $budget_update->save();
                 }
             }
         }

         //update new budget
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

         $expense->acc_id = $request->input('account_name');
         $expense->category_id = $request->input('category');
         $expense->date_created = $request->input('date_created');
         $expense->amount = $request->input('amount');
         $expense->save();
         
         return redirect('/expenses') ->with('success', 'Expense updated');
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
