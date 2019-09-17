<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='WELCOME TO MY APP';
        return view('pages.index')->with('title',$title);
    }
    public function account(){
        return view('pages.account');
    }
    public function transactions()
    {
        return view('pages.transactions');
    } 
    public function statistics()
    {
        return view('pages.statistics');
    
    }
    public function receipt(){
        return view('pages.receipt');
    }

}
