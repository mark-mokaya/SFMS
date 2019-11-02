<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function index(){
        $users =DB::select('select * from users');
        return view('devices.index',['users'=>$users]);
        // $devices = \App\Device::all();
        // return view('users.users',compact('devices'));
    }
}
