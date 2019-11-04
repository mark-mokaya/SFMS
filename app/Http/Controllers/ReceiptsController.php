<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Receipt;
use App\Account;
use App\Budget;
use App\Expense;

class ReceiptsController extends Controller
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
        $receipts = Receipt::all()->where('user_id', auth()->user()->id);
        return view('receipts.index')->with('Receipts', $receipts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $categories = DB::table('categories')->select('id','category_name')->where('user_id', $user_id)->get();
         return view('receipts.create', ['Categories' => $categories]);
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
            'receipt' => 'required|image',
         ]);

         //handle file upload
            $fileNameWithExt = $request->file('receipt')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt = $request->file('receipt')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;

         // upload image
            $path = $request->file('receipt')->storeAs('public/receipts', $fileNameToStore);

         //Add Receipt
            $receipt = new Receipt;
            $receipt->user_id = auth()->user()->id;
            $receipt->category_id = ucfirst($request->input('category'));
            $receipt->expense_id = $request->input('expense');
            $receipt->amount = 0;
            $receipt->description = ucfirst($request->input('description'));
            $receipt->img_path = $fileNameToStore;
            $receipt->save();

         // Find Expense and Account
            if($request->input('expense')){
                $expense = Expense::find($request->input('expense'));
                return view('/receipts/results',['success' => 'New Receipt Added', 'Receipt' => $receipt, 'Expense' => $expense]);
            }

          //scan receipt
            return view('/receipts/results',['success' => 'New Receipt Added', 'Receipt' => $receipt]);
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $receipt = Receipt::find($id);
        $categories = DB::table('categories')->select('id','category_name')->where('user_id', $user_id)->get();
        return view('receipts.edit',['Receipt'=> $receipt, 'Categories'=>$categories]);
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
            switch ($request->input('action')) {
                case 'ADD TOTAL':
                    $this->validate($request, [
                        'amount' => 'required',
                    ]);


                    $receipt = Receipt::find($id);
                    $receipt->amount = $request->input('amount');
                    $receipt->save();


                    if($request->input('expense')){

                        $expense = Expense::find($request->input('expense'));
                        $expense->amount = $request->input('amount');
                        $expense->receipt = $id;
                        $expense->save();
                    
                        $account_update = Account::find($request->input('account'));
                        $account_update->amount -=  $request->input('amount');
                        $account_update->save();

                        $budgets = DB::table('budgets')->select('id', 'categories', 'amount')->where('user_id', auth()->user()->id)->get();
                        
                        foreach($budgets as $budget){
                            $categories = explode(" ", $budget->categories);
                            foreach($categories as $category){
                                if($category == $expense->category_id){
                                    $budget_update = Budget::find($budget->id);
                                    $budget_update->amount_remaining -= $request->input('amount');
                                    $budget_update->save();
                                }
                            }
                        }
                    }
                    return redirect('/receipts')->with('success', 'New Receipt Added');
                    break;
        
                case 'EDIT RECEIPT':
                    $this->validate($request, [
                        'category' => 'required',
                        'amount' => 'required',
                    ]);

                    $receipt = Receipt::find($id);

                    if($receipt->expense_id != NULL){
                        $expense = Expense::find($receipt->expense_id);

                        //update prev account
                        $account_update = Account::find($expense->acc_id);
                        $account_update->amount +=  $expense->amount;
                        $account_update->amount -=  $request->input('amount');
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
                        
                        $expense->category_id = $request->input('category');
                        $expense->amount = $request->input('amount');
                        $expense->save();
                    }

                    $receipt->category_id = $request->input('category');
                    $receipt->amount = $request->input('amount');
                    $receipt->save();
                    
                    return redirect('/receipts')->with('success', 'Receipt Updated');
                    break;
             }
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt = Receipt::find($id);
        if($receipt->expense_id != NULL){
            $expense = Expense::find($receipt->expense_id);
            $expense->receipt = NULL;
        }
        Storage::delete('public/receipts/'.$receipt->img_path);
        $receipt->delete();
        return redirect('/receipts')->with('success', 'Receipt Deleted'); 
    }
}
