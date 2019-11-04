<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
     public static function getuserData($id=0){

    if($id==0){
      $value=DB::table('users')->orderBy('id', 'asc')->get(); 
    }else{
      $value=DB::table('users')->where('id', $id)->first();
    }
    return $value;
  }
    public static function deleteData($id=0){
        DB::table('users')->where('id', '=', $id)->delete();
      }
}
