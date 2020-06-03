                     @foreach($admin as $v)
                      <tr  align="center" admin_id="{{$v->admin_id}}"  admin_name="{{$v->admin_name}}">
                      <td><input type="checkbox" class="box" name="id" value="1"></td>
                      <td>{{$v->admin_id}}</td>
                      <td  class="admin_name">{{$v->admin_name}}</td>
					 
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