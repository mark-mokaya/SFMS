<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    // User Module Navigation
    public function home($id = "No user"){
        $data = ['name' => $id];
        return view('pages.home')->with($data);
    }

    public function account($id = "No user"){
        $data = ['name' => $id];
        return view('pages.account')->with($data);
    }

    public function budget($id = "No user"){
        $data = ['name' => $id];
        return view('pages.budget')->with($data);
    }

    public function addExpense($id = "No user"){
        $data = ['name' => $id];
        return view('pages.addExpense')->with($data);
    }

    public function addAccount($id = "No user"){
        $data = ['name' => $id];
        return view('pages.addAccount')->with($data);
    }

    public function addReceipt($id = "No user"){
        $data = ['name' => $id];
        return view('pages.addReceipt')->with($data);
    }

    //Admin Module Navigation
}
