<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
我是个模板
 
 @if(1==2)
@foreach($user as $val)

{{$val->name}}
{{$val->age}}
{{$val->content}}
 
@endforeach 
@else
不进入循环
 @endif


</body>
</html>