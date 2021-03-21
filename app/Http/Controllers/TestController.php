<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\View;
 use DB;


class TestController extends Controller
{  



    public function store(){
        //var_dump(Request::all());
        $input=Request::all();
        echo $input['a'].PHP_EOL;
        echo $input['b'].PHP_EOL;
        echo $input['c'].PHP_EOL;
    }





	// 添加数据
   public function insert(){
    return DB::table('user')
    ->insert([
      "name"=>"小敏给",
      "age"=>18,
      "content"=>"你好的啊"
    ]);

   }

   //修改数据
   public function update(){
  return DB::table('user')
  ->where("id",1)
  ->update(['name'=>'小刚']);

   }
   // 查询数据
   public function select(){
     $user = DB::table('user')
  ->get();
  // dd($user);
   
return view('index',compact('user'));
   }
   //删除数据
   public function delete(){
   return DB::table('user')
   ->where('id','2')
   ->delete();

   }


}
