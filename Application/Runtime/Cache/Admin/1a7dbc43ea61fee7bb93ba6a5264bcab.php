<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统-轮播图列表管理主界面</title>
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
        <a><cite>滚动信息管理主面板</cite></a>
      </span>

      <div class="layui-fluid">  
        <div class="layui-row">
          <div class="layui-col-md3">
            <div class="layui-btn-group">
                <a href="javascript:void(0)" class="layui-btn layui-deleteds" data-type="getCheckData">删除</a> 
                <a href="/index.php/Admin/Roll/add" class="layui-btn">增加信息</a>
            </div>
          </div>
          
        </div>
      </div>

      <div class="layui-form">

        <table id="demo" lay-filter="test"></table>




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
    ,url: 'http://localhost:85//index.php/Admin/Roll/lists' //数据接口
    ,loading: true
    ,limit:20
    ,page: true //开启分页
    ,cols: [[ //表头
      {checkbox: true},
      {field: 'id',align:'center',title: 'ID',width:70},
      {field:'rosor',align:'center',title:'排序',width:100},
      {field:'rohref',align:'center',title:'跳转地址',width:400},
      {field:'rocon',align:'center',title:'滚动内容',width:300},
      {field:'rotim',align:'center',title:'滚动时间',width:300,templet:function(d){
            var tim=new Date(parseInt(d.rotim)*1000);
            var years=tim.getFullYear();
            var months=tim.getMonth()+1;
            var data=tim.getDate();
            var hours=tim.getHours();
            var minutes=tim.getMinutes();
            var seconds=tim.getSeconds();
            return years+"-"+months+"-"+data+" "+hours+":"+minutes+":"+seconds;
      }},
    ]]
    ,id:'testReload'
  });



  // 单行数据删除
  table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
    // 编辑数据
    if(layEvent === 'edit'){ 
       window.location.href="/index.php/Admin/Roll/edit/id/"+data.id;
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
          url:"/index.php/Admin/Roll/deleteRow",
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


});
</script>
</body>
</html>