@extends('layouts.shop')
	 @section('title','管理员添加')
     @section('content') 
<div class="layui-container">  
    <div class="layui-row">
        <div class="layui-col-lg12">
            <fieldset class="layui-elem-field">
			</br>

                <legend>管理员 - 新增管理员</legend>
                <div class="layui-field-box">
                    <form class="layui-form" action="{{url('/update/'.$arr->admin_id)}}" method="post">
					@csrf
                        <div class="layui-form-item"> 
                            <label class="layui-form-label">管理员名称</label>
                            <div class="layui-input-block">
                            <input type="text" name="admin_name" required style="width:190px" value="{{$arr->admin_name}}" admin_id="{{$arr->admin_id}}" lay-verify="required" placeholder="请输入管理员名称" autocomplete="off" class="layui-input">
							<b style="color:red">{{$errors->first('admin_name')}}</b> 
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码</label>
                            <div class="layui-input-inline">
                            <input type="password" name="admin_pwd" value="{{$arr->admin_pwd}}"  required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
							<b style="color:red">{{$errors->first('admin_pwd')}}</b> 
                            </div>
                            <div class="layui-form-mid layui-word-aux">辅助文字</div>

                        </div>
						<div class="layui-form-item">
                            <label class="layui-form-label">确认密码</label>
                            <div class="layui-input-inline">
                            <input type="password" name="admin_pwds"  value="{{$arr->admin_pwd}}" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
							<b style="color:red">{{$errors->first('admin_pwds')}}</b> 
                            </div>
                            <div class="layui-form-mid layui-word-aux">辅助文字</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">单选框</label>
                            <div class="layui-input-block">
							@if($arr->admin_role==1)
                            <input type="radio" name="admin_role" value="1" title="系统管理员" checked>
                            <input type="radio" name="admin_role" value="2" title="主管">
							<input type="radio" name="admin_role" value="3" title="业务员">
							@endif
							@if($arr->admin_role==2)
                            <input type="radio" name="admin_role" value="1" title="系统管理员">
                            <input type="radio" name="admin_role" value="2" title="主管" checked>
							<input type="radio" name="admin_role" value="3" title="业务员">
							@endif
							@if($arr->admin_role==3)
                            <input type="radio" name="admin_role" value="1" title="系统管理员">
                            <input type="radio" name="admin_role" value="2" title="主管">
							<input type="radio" name="admin_role" value="3" title="业务员" checked>
							@endif

                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">

                            <button type="button" class="layui-btn">立即修改</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<script>
$('input[name="admin_name"]').blur(function(){

   var admin_name = $(this).val();

   var admin_id = $(this).attr('admin_id');

  // alert(admin_id);
    
     $(this).next().empty();

  if(!(/^[\u4e00-\u9fa5}\w]{2,60}$/.test(admin_name))){
  
     $(this).next().text('管理员名称格式不正确');
	 return;
   }

    $.ajaxSetup({headers:{
   
   'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   
   }
   })
   $.post('/updatename',{admin_id:admin_id,admin_name:admin_name},function(res){
   
  if(res>0){
  
  $('input[name="admin_name"]').next().text('管理员名称已存在!');
 
  
     }
   });
 });




$('input[name="admin_pwd"]').blur(function(){



 var admin_pwd = $('input[name="admin_pwd"]').val();

 
 $(this).next().empty();
  
 
 if(admin_pwd==''){
 
  $('input[name="admin_pwd"]').next().text('管理员密码不能为空!');

  return;
 
 }else if(!(/^[0-9a-zA-Z]{6,12}$/.test(admin_pwd))){
 
 $('input[name="admin_pwd"]').next().text('管理员密码格式不正确!');

  return;

 }
});


$('input[name="admin_pwds"]').blur(function(){

$(this).next().empty();

 var admin_pwds = $('input[name="admin_pwds"]').val();

  var admin_pwd = $('input[name="admin_pwd"]').val();

 
 if(admin_pwds==''){
 
  $('input[name="admin_pwds"]').next().text('管理员密码不能为空!');

  return;
 
 }else if(admin_pwds!=admin_pwd){
 
 $('input[name="admin_pwds"]').next().text('两次密码不一致!');

  return;


 }
});

 $("button").click(function(){

	 
   var admin_name = $('input[name="admin_name"]').val();

    var admin_id =  $('input[name="admin_name"]').attr('admin_id');


  if(!(/^[\u4e00-\u9fa5}\w]{2,60}$/.test(admin_name))){
  
    $('input[name="admin_name"]').next().text('管理员名称格式不正确');
	 return;
   }
  
   var flag = true;
   $.ajaxSetup({headers:{
   
   'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') 
   }
   })
   
   $.ajax({

	type:'post',

	data:{admin_id:admin_id,admin_name:admin_name},

    url:'/updatename',

	async:false,
	
	success:function(msg){

		 
	
	if(msg>0){
	
	$('input[name="admin_name"]').next().text('管理员名称已存在s!');
	
	flag = false;
	}
	
	}
	
   });
  if(!flag) return;

  var admin_pwd = $('input[name="admin_pwd"]').val();

 
 $('input[name="admin_pwd"]').next().empty();
  
 
 if(admin_pwd==''){
 
  $('input[name="admin_pwd"]').next().text('管理员密码不能为空!');

  return;
 
 }else if(!(/^[0-9a-zA-Z]{6,12}$/.test(admin_pwd))){
 
 $('input[name="admin_pwd"]').next().text('管理员密码格式不正确!');

  return;

 }

 $('input[name="admin_pwds"]').next().empty();

 var admin_pwds = $('input[name="admin_pwds"]').val();

  var admin_pwd = $('input[name="admin_pwd"]').val();

 
 if(admin_pwds==''){
 
  $('input[name="admin_pwds"]').next().text('管理员密码不能为空!');

  return;
 
 }else if(admin_pwds!=admin_pwd){
 
 $('input[name="admin_pwds"]').next().text('两次密码不一致!');

  return;


 }

  $('form').submit();
});


</script>
 @endsection