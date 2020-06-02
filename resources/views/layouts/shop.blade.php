<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 微商城 - @yield('title')</title>
  <link rel="stylesheet" href="/static/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">魑魅魍魉</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
	
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="{{url('/')}}">业务员列表</a></li>
      <li class="layui-nav-item"><a href="{{url('/customer')}}">客户列表</a></li>
	  <li class="layui-nav-item"><a href="{{url('/meeting')}}">会议列表</a></li>
      <li class="layui-nav-item"><a href="{{url('/admin')}}">管理员列表</a></li>
	   <li class="layui-nav-item"><a href="{{url('/login')}}">登陆</a></li>
    </ul>
	
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="/static/image/kenan.jpg" class="layui-nav-img">
          柯南
        </a>
        
      </li>
      <li class="layui-nav-item"><a href="">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
<ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item"><a  href="javascript:void(0);"  >控制台</a></li>

        <li class="layui-nav-item">
          <a    href="javascript:void(0);">系统设置</a>
          
        </li>

        <li class="layui-nav-item">
          <a   href="javascript:void(0);">用户管理</a>
          
        </li>
        <li class="layui-nav-item">
            <a   href="javascript:void(0);">权限管理</a>
          
        </li>
        <li class="layui-nav-item">
                <a   href="javascript:void(0);">会员管理</a>
               
            </li>
        <li class="layui-nav-item">
            <a   href="javascript:;">开发者工具</a>
           
        </li>
        <li class="layui-nav-item">
            <a   href="javascript:;">集成Demo</a>
            
        </li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
   @yield('content')

	

	   <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
    <script type="text/javascript" src="/static/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="/static/layui/layui.js"></script>
    <script type="text/javascript" src="/static/javascript/login.js"></script>
</body>
</html>

