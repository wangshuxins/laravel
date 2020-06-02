     @extends('layouts.shop')
	 @section('title','会议列表')
     @section('content') 
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
        <fieldset class="layui-elem-field">
            <legend>会议管理 - 会议列表</legend>
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
              <div class="layui-btn-group">
                  <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html" dw-title="新增用户" dw-width="100%" dw-height="100%">
                      <i class="layui-icon">&#xe654;</i>新增
                  </button>
                  <button class="layui-btn layui-btn-xs layui-btn-danger dw-batch-delete" dw-url="./delete.json">
                      <i class="layui-icon">&#xe640;</i>删除
                  </button>
                  <button class="layui-btn layui-btn-xs dw-refresh">
                      <i class="layui-icon">&#x1002;</i>刷新
                  </button>
              </div>
              <hr>
              <table class="layui-table">
                  <colgroup>
                      <col width="150">
                      <col width="150">
                      <col width="200">
                      <col>
                      <col>
                  </colgroup>
                  <thead>
                      <tr>
                      <th class="selectAll"><input type="checkbox"></th>
                      <th>昵称</th>
                      <th>加入时间</th>
                      <th>签名</th>
                      <th style="text-align:center;">操作</th>
                      </tr> 
                  </thead>
                  <tbody>
                      <tr>
                      <td><input type="checkbox" name="id" value="1"></td>
                      <td>贤心</td>
                      <td>2016-11-29</td>
                      <td>人生就像是一场修行</td>
                      <td class="text-center">
                        <div class="layui-btn-group">
                          <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html?id=1" dw-title="编辑用户">
                            <i class="layui-icon">&#xe642;</i>编辑
                          </button>
                          <button class="layui-btn layui-btn-xs layui-btn-danger dw-delete" dw-url="delete.html?id=1" dw-title="小明">
                            <i class="layui-icon">&#xe640;</i>删除
                          </button>
                        </div>
                      </td>
                      </tr>
                      <tr>
                      <td><input type="checkbox" name="id" value="2"></td>
                      <td>许闲心</td>
                      <td>2016-11-28</td>
                      <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                      <td class="text-center">
                          <div class="layui-btn-group">
                              <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html?id=1" dw-title="编辑用户">
                                <i class="layui-icon">&#xe642;</i>编辑
                              </button>
                              <button class="layui-btn layui-btn-xs layui-btn-danger dw-delete" dw-url="delete.html?id=1" dw-title="小明">
                                <i class="layui-icon">&#xe640;</i>删除
                              </button>
                            </div>
                      </td>
                      </tr>
                      <tr>
                      <td><input type="checkbox" name="id" value="3 "></td>
                      <td>sentsin</td>
                      <td>2016-11-27</td>
                      <td> Life is either a daring adventure or nothing.</td>
                      <td class="text-center">
                          <div class="layui-btn-group">
                              <button class="layui-btn layui-btn-xs layui-btn-normal dw-dailog" dw-url="create.html?id=1" dw-title="编辑用户">
                                <i class="layui-icon">&#xe642;</i>编辑
                              </button>
                              <button class="layui-btn layui-btn-xs layui-btn-danger dw-delete" dw-url="delete.html?id=1" dw-title="小明">
                                <i class="layui-icon">&#xe640;</i>删除
                              </button>
                            </div>
                      </td>
                      </tr>
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