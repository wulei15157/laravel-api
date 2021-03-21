<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

 
class BaseController extends Controller
{
    //生成api的方法  受保护的
    protected function creat($data,$msg='',$code=200)
    {

//返回api結果
$result = [
//状态码
	'code' => $code,
	//自定义信息
	'msg' => $msg,
	//数据返回
	'data' => $data
 ];
return response($result);

    }
}
