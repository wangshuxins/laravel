  @extends('layouts.shop')
	 @section('title','业务员添加')
     @section('content') 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>业务员管理 - 业务员添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<center>
  <h2>业务员管理<br>
    <span style="float:right"><a class="btn btn-default" href="{{'/'}}">列表</a></span>
  </h2>
</center><hr/>

<form class="form-horizontal" role="form" action="{{url('/store')}}" method="post">
	@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="sal_name" id="firstname"  placeholder="请输入名称">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-8">
			<input type="radio" name="sal_sex" value="1" checked>男
			<input type="radio"  name="sal_sex" value="2">女
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">公共电话</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="sal_office" id="firstname"  placeholder="请输入公共电话">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-8">
			<input type="tel" class="form-control" name="sal_tel" id="firstname"  placeholder="请输入手机号">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>

 <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  @endsection