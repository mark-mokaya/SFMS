<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Receipt;

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
         $Categories = DB::table('categories')->select('id','category_name')->where('user_id', auth()->user()->id)->get();
         return view('receipts.create', ['Categories' => $Categories]);
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
            'receipt' => 'required',
         ]);

         //Add Receipt
         $receipt = new Receipt;
         $receipt->user_id = auth()->user()->id;
         $receipt->category_id = ucfirst($request->input('category'));
         //$receipt->expense_id = ucfirst($request->input('expense_id'));
         $receipt->amount = 0;
         $receipt->description = ucfirst($request->input('description'));
         $receipt->save();

         return redirect('/receipts')->with('success', 'New Receipt Added');
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
