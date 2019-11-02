<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Account;

class AccountsController extends Controller
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
        $Accounts = Account::all()->where('user_id', auth()->user()->id);
        return view('accounts.index')->with('Accounts', $Accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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
            'account_name' => 'required',
            'account_type' => 'required',
            'amount'  => 'required'
         ]);

         //Create Account
         $account = new Account;
         $account->user_id = auth()->user()->id;
         $account->acc_name = ucfirst($request->input('account_name'));
         $account->acc_type = ucfirst($request->input('account_type'));
         $account->amount = $request->input('amount');
         $account->description = ucfirst($request->input('description'));
         $account->save();
         return redirect('/accounts')->with('success', 'New Account Created');
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
        $account = Account::find($id);
        $expenses = DB::select("SELECT * FROM expenses WHERE acc_id = '$id' AND user_id = '$user_id' ORDER BY date_created DESC");

        $categorized_expenses = DB::select("SELECT category_id, SUM(amount) amount FROM expenses WHERE acc_id = '$id' AND user_id = '$user_id' GROUP BY category_id ORDER BY amount DESC");

        $expense_categories = "";
        foreach($expenses as $expense){
            $expense_categories = $expense_categories." ".$expense->category_id;
        }
        $expense_categories = explode(" ", $expense_categories);

        $categories = DB::table("categories")->where('user_id', $user_id)->whereIn('id', $expense_categories)->get();
        return view('accounts.show',['Account' => $account, 'Expenses' => $expenses, 'Categories' => $categories, 'Categorized_expenses' => $categorized_expenses]);
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
        $accounts = DB::Select("SELECT * FROM accounts WHERE id != '$id' AND user_id = '$user_id'");
        $account = Account::find($id);
        return view('accounts.edit',['account'=> $account, 'Accounts'=>$accounts]);
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
        $transaction_type = $request->input('transaction_type');

        switch($transaction_type){
            case 'edit_account':
                $this->validate($request, [
                    'account_name' => 'required',
                    'account_type' => 'required',
                    'amount'  => 'required',
                ]);
        
                //Update Account
                $account = Account::find($id);
                $account->acc_name = ucfirst($request->input('account_name'));
                $account->acc_type = ucfirst($request->input('account_type'));
                $account->amount = $request->input('amount');
                $account->description = ucfirst($request->input('description'));
                $account->save();
                return redirect('/accounts')->with('success', $account->acc_name.' Account Updated');
            break;

            case 'add_income':
                $this->validate($request, [
                    'account_name' => 'required',
                    'amount'  => 'required',
                ]);
        
                //Update Account
                $account = Account::find($id);
                $account->amount += $request->input('amount');
                $account->save();
                return redirect('/accounts')->with('success', $account->acc_name.' Account Updated');
            break;

            case 'make_transfer':
                $this->validate($request, [
                    'source_account_name' => 'required',
                    'receiver_account_name' => 'required',
                    'amount'  => 'required',
                ]);
        
                //Update Account
                $source_account = Account::find($id);
                $receiver_account = Account::find($request->input('receiver_account_name'));

                //$account->user_id = $request->input('user_id');

                if($source_account->amount > $request->input('amount')){
                    $source_account->amount -= $request->input('amount');
                    $receiver_account->amount += $request->input('amount');
                    $source_account->save();
                    $receiver_account->save();
                    return redirect('/accounts')->with('success', $source_account->acc_name." and ".$receiver_account->acc_name." Accounts Updated");
                }else{
                    return redirect('/accounts')->with('error', $source_account->acc_name.' Account has Insufficient Funds');
                }
         
            break;

            default:
                return redirect('/accounts')->with('error', 'An Unexpected Error has occured. Please try again');
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
        $account = Account::find($id);
        $account->delete();
        return redirect('/accounts')->with('success', $account->acc_name.' Account Deleted');
    }
}
