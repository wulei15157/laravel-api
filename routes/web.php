<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\TestController;
//调用命名空间


 /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//默认主页

Route::get('/', function () {
    return view('welcome');
});

Route::match(['post','get'],'ssda',function(){

echo 'aa';


});

Route::get('/home', function() {
   echo ('welcome');
});
// any代表任何请求方法
Route::any('/any',function(){
 echo "any";

});
// 必选参数  单独的url地址  bixuan带着参数的 bixuan/参数
Route::get('bixuan/{id}',function($id){
echo '必选'.$id;

});
// 可选参数
Route::get('kexuan/{id?}{name?}',function($id = '默认',$name = '小明'){
  echo '可选'.$id.$name;

});
Route::prefix('admin')->group(function(){
  Route::get('sa',function(){
return 'a';

  });

});


Route::get('insert',[TestController::class,'insert']);
Route::get('update',[TestController::class,'update']);
Route::get('select',[TestController::class,'select']);
 Route::get('delete',[TestController::class,'delete']);

// Route::get('insert',[TestController::class,'insert']);
//调用路由
 Route::get('shitu',function(){
return view('index');

 });
 //数组传值
 Route::get('shuzu/{title?}',function($title='我是标题'){
 return view('index',[ 'title' => $title ]);

 });

 //with传值
 Route::get('with/{title?}',function($title='我是标题'){
return view('index')->with('title',$title);
});
//compact
 Route::get('compact/{title?}',function($title='我是标题1',$name='我是name'){

return view('index',compact('title','name'));
 });
// 判断视图文件是否存在
 Route::get('Test2',function(){
if (View::exists('index2')) {
	# code...
	echo '视图存在';
}else{
echo '视图不存在';

}

 });
 //函数案例
 Route::get('hanshu',function(){
$time = strtotime(now());
return view('index',compact('time'));

 });

 