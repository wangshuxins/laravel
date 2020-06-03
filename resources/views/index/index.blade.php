     @extends('layouts.shop')
	 @section('title','业务员列表')
     @section('content') 
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <fieldset class="layui-elem-field">
            <legend>业务员管理 - 业务员列表</legend>
            <div class="layui-field-box">
              <form class="layui-form" action="">
                <div class="layui-form-item" style="text-align:center;">
                  <div class="layui-inline">
                    <div class="layui-input-inline">
                      <input autocomplete="off" class="layui-input" placeholder="请输入名称" type="text" name="name" value="">
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
             <center>
              <h2>
                <span style="float:right"><a class="btn btn-default" href="{{'/create'}}">添加</a></span>
              </h2>
            </center><hr/>
              <table class="layui-table">
                  <colgroup>
                      <col width="80">
                      <col width="150">
                      <col width="200">
                      <col>
                      <col>
                  </colgroup>
                  <thead>
                      <tr>
                      <th class="selectAll"><input type="checkbox"></th>
                      <th>业务员id</th>
                      <th>名称</th>
                      <th>性别</th>
                      <th>电话号</th>
                      <th>手机</th>
                      <th style="text-align:center;">操作</th>
                      </tr> 
                  </thead>
                  
                  <tbody>
                    @foreach ($salesman as $k=>$v)
                      <tr>
                      <td><input type="checkbox" name="id" value="1"></td>
                      <td>{{$v->sal_id}}</td>
                      <td>{{$v->sal_name}}</td>
                      <td>{{$v->sal_sex==1?'男':'女'}}</td>
                      <td>{{$v->sal_office}}</td>
                      <td>{{$v->sal_tel}}</td>
                      <td class="text-center">
                        <div class="layui-btn-group">
                          <a href="{{url('/edit/'.$v->sal_id)}}" class="layui-btn layui-btn-xs layui-btn-normal dw-dailog"  dw-url="create.html?id=1" dw-title="编辑用户">
                            <i class="layui-icon" >&#xe642;</i>编辑
                          </a>
                          <a href="{{url('/destroy/'.$v->sal_id)}}" class="layui-btn layui-btn-xs layui-btn-danger dw-delete" dw-url="delete.html?id=1" dw-title="小明">
                            <i class="layui-icon">&#xe640;</i>删除
                          </a>
                        </div>
                      </td>
                      </tr>
                      @endforeach
                  </tbody>
                  
              </table>
            </div>
        </fieldset>
    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  @endsection