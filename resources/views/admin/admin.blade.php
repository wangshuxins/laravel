     @extends('layouts.shop')
	 @section('title','管理员列表')
     @section('content')
	<style>
	/*pages*/ .pagination-wrapper{ margin: 20px 0; } .pagination{ height: 34px; text-align: center; } .pagination li { display: inline-block; height: 34px; margin-right: 5px; } .pagination li a{ float: left; display: block; height: 32px; line-height: 32px; padding: 0 12px; font-size: 16px; border: 1px solid #dddddd; color: #555555; text-decoration: none; } .pagination li a:hover{ background:#f5f5f5; color:#0099ff; } .pagination li.thisclass { background: #09f; color: #fff; } .pagination li.thisclass a,.pagination li.thisclass a:hover{ background: transparent; border-color: #09f; color: #fff; cursor: default; }
	</style>
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <fieldset class="layui-elem-field">
            <legend>管理员管理 - 管理员列表</legend>
            <div class="layui-field-box">
              <form class="layui-form" action="">
                <div class="layui-form-item" style="text-align:center;">
                  <div class="layui-inline">
                    <div class="layui-input-inline">
                      <input autocomplete="off" class="layui-input" placeholder="请输入名称" type="text" name="admin_name" value="{{$admin_name}}">
                    </div>
                  </div>
                  <div class="layui-inline" style="text-align:left;">
                    <div class="layui-input-inline">
                      <button class="layui-btn"><i class="layui-icon">&#xe615;</i>查询</button>
                    </div>
                  </div>
                </div>
              </form>
              <hr>
              <div class="layui-btn-group">
                  <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html" dw-title="新增用户" dw-width="100%" dw-height="100%">
                      <i class="layui-icon">&#xe654;</i><a href="{{url('/create')}}"><font color="white">新增</font></a>
                  </button>
                  <button class="layui-btn layui-btn-xs layui-btn-danger dw-batch-delete" dw-url="./delete.json">
                      <i class="layui-icon">&#xe640;</i><a href="javascript:void(0)" id="delMany"><font color="white">删除</font></a>
                  </button>
                  <button class="layui-btn layui-btn-xs dw-refresh">
                      <i class="layui-icon">&#x1002;</i><a href="{{url('/admin')}}"><font color="white">刷新</font></a>
                  </button>
              </div>
              <hr>
              <table class="layui-table"  align="center">
			 
                  <colgroup >
                      <col width="150">
                      <col width="150">
                      <col width="200">
                      <col>
                      <col>
                  </colgroup>
				   
                  <thead >
                      <tr >
                      <th style="text-align:center;" class="selectAll"><input id="all" type="checkbox"></th>
                      <th style="text-align:center;">管理员ID</th>
                      <th style="text-align:center;">管理员名字</th>
                      <th style="text-align:center;">角色</th>
                      <th style="text-align:center;">操作</th>
                      </tr> 
                  </thead>
				 
                  <tbody>
				   @foreach($admin as $v)
                      <tr  align="center" admin_id="{{$v->admin_id}}" admin_name="{{$v->admin_name}}">
                      <td><input type="checkbox" class="box" name="id" value="1"></td>
                      <td>{{$v->admin_id}}</td>
                      <td><span class="admin_name">{{$v->admin_name}}</span></td>
					 
                      <td>
					   @if($v->admin_role==1)系统管理员@endif
					   @if($v->admin_role==2)主管@endif
					   @if($v->admin_role==3)业务员@endif
					  </td>
					  
                      <td class="text-center">
                        <div class="layui-btn-group">
                          <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html?id=1" dw-title="编辑用户">
                            <i class="layui-icon">&#xe642;</i><a href="{{url('/edit/'.$v->admin_id)}}"><font color='white'>编辑</font></a>
                          </button>
                          <button class="layui-btn layui-btn-xs layui-btn-danger dw-delete" dw-url="delete.html?id=1" dw-title="小明">
                            <i class="layui-icon">&#xe640;</i><a class="del" admin_id="{{$v->admin_id}}"  href="javascript:void(0)"><font color="white">删除</font></a>
                          </button>
				
                        </div>
                      </td>
                    </tr>
					@endforeach
					<tr ><td colspan="5" align="center">{{$admin->appends(['admin_name'=>$admin_name])->links()}}</td></tr>
                  </tbody><!-- ->appends(['name'=>$name]) -->
				  	
                   
              </table>
			 
            </div>
        </fieldset>
    </div>
  </div>
  

  
  <div class="layui-footer">

  <script>
  $(document).on("click",'.page-item a',function(){
//alert('1234');

var url = $(this).attr('href');

$.get(url,function(res){
  
  $('tbody').html(res);

});
return false;
});

$(document).on("click",'.del',function(res){



var admin_id = $(this).attr("admin_id");

if(confirm('你确定要删除此条记录吗？')){
//alert(admin_id);

$.get('/destroy/'+admin_id,function(res){

//alert(res);
if(res.code=='0'){

location.href="/admin";

}
},'json');
}
});
    //复选框
	$(document).on("click",".box",function(){
	
	//alert('4');

	var _this = $(this);

	var status = _this.prop('checked');

	if(status == true){
	
	_this.parents('tr').css('background-color','orange');
	
	}else{
	
	_this.parents('tr').css('background-color','');
	
	}
	
	});


    //点击全选
	$(document).on("click","#all",function(){

	 var _this = $(this);

	 var status = $("#all").prop("checked");

     $(".box").prop("checked",status);

     if(status == true){
	 
     $(".box").parents("tr").css('background-color','orange');
	 
	 }else{
	 
	 $(".box").parents("tr").css('background-color','');
	 
	 }
	});

		//删除选中的商品
	$(document).on("click","#delMany",function(){

	var _this = $(this);
	//alert('7');

	var _box = $(".box:checked");
	//console.log(_box);return false;

	
	var admin_id = "";

	_box.each(function(index){
	
	admin_id=admin_id+$(this).parents("tr").attr("admin_id")+',';


	
	});

	//console.log(admin_id);return false;

	 admin_id = admin_id.substring(0,admin_id.length-1);

	 if(admin_id == ''){
	
	     return;
	
	  }

	 //alert(admin_id);return;

	//console.log(admin_id);return false;
    var is_del = confirm('确定要删除此条商品吗?');

	if(is_del == true){

	$.ajax({

    url:"{{url('/alldel?admin_id=')}}"+admin_id,
	
    data:{},
	
	type : 'get',

	dataType : 'json',

	success:function(res){
	
	//concole.log(res);

	if(res.error_no==0){
	
	_box.each(function(index){
	
	_box.parents("tr").remove();

	
	});
	
	}else{
	
	alert(res.error_msg);
	
	}
	}
	});
	}
	});
	//即点即改

	//点击变为文本框
	$(document).on('click',".admin_name",function(){

	var _this = $(this);

	text = _this.parent().text();

	//alert(text);return;
	

	

	 _this.parent().html("<input type='text' value='"+text+"' class='name'>");
     
	
	});

	 $(document).on('blur',".name",function(){

	 var obg = $(this).parent();

     var td = $(this).val();

	 var admin_id = $(this).parents('tr').attr('admin_id');

	 var admin_name = $(this).parents('tr').attr('admin_name');

	 //alert(admin_id);

	 if(td==''||(!(/^[\u4e00-\u9fa5}\w]{2,60}$/.test(td)))){
	 
	 $(this).parent().html("<span  class='admin_name'>"+text+"</span>");return;
	 
	 }else{
	 
	 $(this).parent().html("<span  class='admin_name'>"+td+"</span>");
	 
	 }

	 //alert(td);return;

	 $.ajax({
         
		 url:"{{url('/point')}}",

         type:'get',
	     
		 dataType:'json',

		 async:false,

		 data:{'td':td,'admin_id':admin_id},

		 success:function(res){
		 
		 if(res.error_no=='0'){
		 
		 console.log(res.error_msg);
		 
		  }else{
          //var old = $(".name").parent().attr('old');
		  alert(res.error_msg);
		  obg.html("<span  class='admin_name'>"+admin_name+"</span>");return;
		  
		  }
		 }
	 
	 });
    });
  </script>


    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
    @endsection