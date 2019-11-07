<?php

namespace App\Http\Controllers;
use DB;
use App\device;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevicesController extends Controller
{ 
    // public function index($id=0){
 
    //     // Fetch all records
    //     $users = device::getuserData();
    
    //     // Pass to view
    //     return view('devices.index',['users'=>$users]);
    //   }
    
    public function index(){
        $users =DB::select('select * from users');
        return view('devices.index',['users'=>$users]);
    }
   // public function deleteUser($id=null){

      // if(!empty($id)){
      //   device::where(['id'=>$id])->delete();
      //   return redirect()->back()->with('message','Delete succesfully.');
      // }
      //   if($id != 0){
      //     // Delete
      //     device::deleteData($id);
    
      //     Session::flash('message','Delete successfully.');
          
      //   }
      //   return redirect()->action('DevicesController@index',['id'=>0]);
      // }
     
    // }
    public function destroy($id) {
      DB::delete('delete from users where id = ?',[$id]);
      return redirect()->action('DevicesController@index',['id'=>0]);
   }
}
