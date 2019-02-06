<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统-文章管理主界面</title>
  <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/layui.css">
  <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/common.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">

  <div class="layui-header">
    <div class="layui-logo">致未来后台管理系统</div>
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="/index.php/Admin/Index/index">控制台</a></li>

      <li class="layui-nav-item">
        <a href="javascript:void(0);">
          接口配置
        </a>
        <dl class="layui-nav-child">
          <dd><a href="/index.php/Admin/Emais/index">邮箱接口配置</a></dd>
          <dd><a href="javascript:void(0)">公众号接口配置</a></dd>
          <dd><a href="/index.php/Admin/Tels/index">短信接口配置</a></dd>
        </dl>
      </li>

      <li class="layui-nav-item"><a href="javascript:void(0);" class="clearun">清除缓存</a></li>


    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">上次登录时间：<?php echo (date("Y-m-d",$_SESSION['lastmap'])); ?></li>
      
      <li class="layui-nav-item">
        <a href="javascript:void(0);">
          管理员：<?php echo $_SESSION['adminuser'] ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="/index.php/Admin/Index/editd">修改账户密码</a></dd>
        </dl>
      </li>

      <li class="layui-nav-item"><a href="/index.php/Admin/Login/logout">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">

        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:void(0)">分类管理</a>
          <dl class="layui-nav-child">

            <?php echo tpl_AuthCheck('Cat/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Cat/index">分类管理</a></dd>','');?>

            <?php echo tpl_AuthCheck('Cat/add',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Cat/add">添加分类</a></dd>','');?>

            <?php echo tpl_AuthCheck('Arts/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Arts/index">文章管理</a></dd>','');?>

          </dl>
        </li>


        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:void(0)">权限管理</a>
          <dl class="layui-nav-child">

            <?php echo tpl_AuthCheck('Jurisdiction/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Jurisdiction/index">用户管理</a></dd>','');?>


            <?php echo tpl_AuthCheck('Jurisdiction/groups',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Jurisdiction/groups">创建用户组</a></dd>','');?>

          </dl>
        </li>



        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:void(0)">基础功能</a>
          <dl class="layui-nav-child">

            <?php echo tpl_AuthCheck('Mesgs/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Mesgs/index">留言管理</a></dd>','');?>


            <?php echo tpl_AuthCheck('Roll/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Roll/index">滚动消息管理</a></dd>','');?>

            <?php echo tpl_AuthCheck('Caross/index',$_SESSION['idsss'],'or','<dd><a href="/index.php/Admin/Caross/index">轮播图管理</a></dd>','');?>

          </dl>
        </li>
 
      </ul>
    </div>
  </div>
<!--   <script type="text/javascript">
      var ss=document.querySelectorAll('.layui-nav-itemed');
      console.log(ss);
  </script> -->
  
  <div class="layui-body lay-das">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
      <span class="layui-breadcrumb">
        <a href="/index.php/Admin/Index/index">控制台</a>
        <a><cite>文章列表管理主面板</cite></a>
      </span>


      <div class="layui-fluid">
        <div class="layui-row">
          <div class="layui-col-md12 demoTable">
            
            <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#" class="layui-btn layui-btn-primary layui-aaa" data-type="reload"><input class="layui-input" id="demoReloadssss" value='<?php echo ($vo["id"]); ?>' type="hidden" name="catid" autocomplete="off"><?php echo ($vo["catena"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

            <a href="#" class="layui-btn layui-bg-orange layui-ddd" data-type="reload"><input class="layui-input" id="demoReloadss" value="updat" type="hidden" name="updas" autocomplete="off">最近更新</a>
            <a href="javascript:window.history.go(0)" class="layui-btn layui-bg-orange">刷新</a>
          </div>
        </div>
      </div>

      <div class="layui-fluid">  

        <div class="layui-row">
          <div class="layui-col-md3">
            <div class="layui-btn-group">
                <a href="/index.php/Admin/Arts/add" class="layui-btn">添加文章</a>
                <a href="javascript:void(0)" class="layui-btn layui-deleteds" data-type="getCheckData">删除</a> 



            </div>
          </div>

          <div class="layui-col-md9">
            <div class="demoTable">
              搜索文章标题：
              <div class="layui-inline">
                <input class="layui-input" name="lartit" id="demoReload" autocomplete="off">
              </div>
              <div class="layui-btn" data-type="reload">搜索</div>
            </div>
          </div>


        </div>


      </div>

      <div class="layui-form">

        <table id="demo" lay-filter="test"></table>



<script type="text/html" id="barDemo">
    <button class="layui-btn layui-btn-sm" lay-event="edit"><i class="layui-icon layui-icon-edit"></i> 修改</button>
    <button class="layui-btn layui-btn-sm layui-btn-danger" lay-event="delete"><i class="layui-icon layui-icon-delete"></i> 删除</button>
</script>


      </div>
    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
      备案相关信息
  </div>
</div>
<script src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>
<script>

layui.use(['table'], function(){
  var table=layui.table;
// 数据表格渲染
  table.render({
     elem: '#demo'
    ,url: 'http://localhost:85//index.php/Admin/Arts/lists' //数据接口
    ,loading: true
    ,limit:30
    ,page: true //开启分页
    ,cols: [[ //表头
      {checkbox: true},
      {field: 'id',align:'center',title: 'ID',sort: true,width:70},
      {field:'lart',align:'center',title:'长标题',width:600},
      {field: 'artimg',align:'center',width:100,title:'文章配图',templet:'<div class="layer-photos-demo"><img style="height:60px;" src="http://localhost:85/{{d.artimg}}"></div>'},
      {field: 'bors',align:'center',title: '点击',width:60},
      {field: 'catena',align:'center',title: '文章分类',width:100},
      {align:'center',title: '操作',width:200, align:'center', toolbar: '#barDemo'}
    ]]
    ,id:'testReload'
  });

  // 搜索的数据重载
  var $ = layui.$, active = {
    reload: function(){
      var demoReload = $('#demoReload');
      //执行重载
      table.reload('testReload', {
        page: {
          curr: 1 //重新从第 1 页开始
        }
        ,where: {
            lartit: demoReload.val()
        }
      });
    }
  };
  $('.demoTable .layui-btn').on('click', function(){
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
  });


  // 单行数据删除
  table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
    // 编辑数据
    if(layEvent === 'edit'){ 
       window.location.href="/index.php/Admin/Arts/edit/id/"+data.id;
    }else if(layEvent === 'delete'){ //删除
      layer.confirm('真的删除行么', function(index){
        $.ajax({
            url:"/index.php/Admin/Arts/delete/id/"+data.id,
            type:"get",
            dataType:"json",
            success:function(data){
                layer.msg(data.info);
                layer.close(index);
                obj.del();
                // 删除这条数据的dom
            },
            error:function(data){
                console.log(data);
            }
        });
      });
    }
  });


  // 删除多行、单行、全选数据
  var $ = layui.$, activ = {
    getCheckData: function(){ //获取选中数据
      var checkStatus = table.checkStatus('testReload')
      ,data = checkStatus.data;
      var arrs=[];
      for(var i=0;i<data.length;i++){
        arrs.push(data[i].id);
      }
      $.ajax({
          url:"/index.php/Admin/Arts/deleteRow",
          type:"post",
          dataType:"json",
          data:{id:JSON.stringify(arrs)},
          success:function(data){
              layer.msg(data.success);
              setTimeout(function(){
                location.reload();
              },500)
          },
          error:function(data){
              layer.msg("请选择一项删除");
          }
      });
    }
  };
  $('.layui-deleteds').on('click', function(){
    var type = $(this).data('type');
    activ[type] ? activ[type].call(this) : '';
  });


// 分类文章数据查询
  $.ajaxSetup({cache:false});
  $('.demoTable .layui-aaa').on('click', function(){
      var demoReloadd = $(this).children('input');
      //执行重载
      table.reload('testReload', {
        page: {
          curr: 1 //重新从第 1 页开始
        }
        ,where: {
            catid: demoReloadd.val()
        }
      });
  });




// 最近更新的文章检索
  $('.demoTable .layui-ddd').on('click', function(){
      var demoReloadd = $(this).children('input');
      //执行重载
      table.reload('testReload', {
        page: {
          curr: 1 //重新从第 1 页开始
        }
        ,where: {
            updas: demoReloadd.val()
        }
      });
  });

});
</script>
</body>
</html>