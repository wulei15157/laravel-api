<?php 
$result = [
//状态码
	'code' => 404,
	//自定义信息
	'msg' => '资源不存在',
	//数据返回
	'data' => []
 ];

echo json_encode($result);

?>