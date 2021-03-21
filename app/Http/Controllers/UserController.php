<?php  

namespace App\Http\Controllers;
use App\Models\api\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
  *路由在routers 里面的api.php

     */
    public function index()
    {
     //查看json
        // return 'index';  //html
        // return response([1,2,3],200);//默认就是json   
       // return $this->creat([1, 2, 3],'数据获取成功',200);
     return $this->creat(User::orderBy('id', 'desc')->get(),'数据获取成功',200);   //数据库表全获取
      //return $this->creat(User::select('id','name')->get(),'数据获取成功',200); //根据字段获取  
   //return $this->creat(User::select('id','name')->paginate(5),'数据获取成功',200);//详细分页
    //return $this->creat(User::select('id','name')->simplePaginate(5),'数据获取成功',200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //新增数据
    //获取提交的数据
 
       $data =  $request->all();
        //数据验证
      $validator = Validator::make($data, ['ip' => 'required','thisurl' => 'required']);

        //验证并提示
        if ($validator->fails()) {
            # code...
   // return $this->creat([],'提交的数据有误',400);
        
    return $this->creat([],$validator->errors(),400);
        }else{
            //写入数据 
         $addData = User::create($data);
  //存在说明成功了
         if($addData){
         return $this->creat($data,'数据请求成功',200);

         }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //数据获取
        $data = User::select('id','name')->find($id);
        // 判断id是否合法
        if (!is_numeric($id)) {
            # code...
            return $this->creat([],'id参数错误',400);
        }

        //判断是否为空
        if(empty($data)){
            return $this->creat([],'无数据',204);
      }else{
    return $this->creat($data,'数据请求成功',200);

        }

  return $this -> creat(User::select('id','name','age')->find($id),'数据请求成功',200);
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
        //sss
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!is_numeric($id)) {
            # code...
            return $this->creat([],'id参数错误',400);
        }


        //删除
                $users = User::find($id);
                if(empty($users)){
                    return $this->creat([],'数据不存在',400);
                }

                if($users->delete()){
                return $this->creat([],'数据删除成功',200);

                }

    }
}
   