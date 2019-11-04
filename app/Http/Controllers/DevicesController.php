<?php

namespace App\Http\Controllers;
use DB;
use App\device;

use Illuminate\Http\Request;

class DevicesController extends Controller
{ 
    public function index($id=0){
 
        // Fetch all records
        $users = device::getuserData();
    
        // Pass to view
        return view('devices.index',['users'=>$users]);
      }
    
    // public function index(){
    //     $users =DB::select('select * from users');
    //     return view('devices.index',['users'=>$users]);
    // }
    public function deleteUser($id){

        if($id != 0){
          // Delete
          device::deleteData($id);
    
          Session::flash('message','Delete successfully.');
          
        }
        return redirect()->action('DevicesController@index',['id'=>0]);
      }
}
