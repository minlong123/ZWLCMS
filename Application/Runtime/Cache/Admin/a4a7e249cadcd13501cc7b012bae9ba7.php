<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统-留言管理主界面</title>
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
        <a><cite>留言管理主面板</cite></a>
      </span>

      <div class="layui-fluid">  

        <div class="layui-row">
          <div class="layui-col-md3">
            <div class="layui-btn-group">
                <a href="javascript:void(0)" class="layui-btn layui-deleteds" data-type="getCheckData">删除</a> 
            </div>
          </div>

          <div class="layui-col-md9">
<style type="text/css">
  .demoTable .layui-form-pane .layui-form-radio, .layui-form-pane .layui-form-switch{
    margin-top:6px!important;
  }
</style>
<form class="layui-form layui-form-pane" action="">
 
    <label class="layui-form-label" style="width:auto;">收到留言邮件提醒</label>
    <div class="layui-input-block">
      <input type="checkbox" name="swiemai" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php if(!empty($statu['swiemai'])): ?>checked=""<?php endif; ?> >
  </div>
</form>


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

layui.use(['table','form','element', 'layedit', 'laydate'], function(){
  var table=layui.table;
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate
  ,ele=layui.element;
// 数据表格渲染
  table.render({
     elem: '#demo'
    ,url: 'http://localhost:85//index.php/Admin/Mesgs/lists' //数据接口
    ,loading: true
    ,limit:30
    ,page: true //开启分页
    ,cols: [[ //表头
      {checkbox: true},
      {field: 'id',align:'center',title: 'ID<br>(id)',width:70},
      {field:'messname',align:'center',title:'留言人<br>(messname)',width:120},
      {field: 'mestim',align:'center',width:150,title:'留言时间<br>(mestim)',templet:function(d){
            var tim=new Date(parseInt(d.mestim)*1000);
            var years=tim.getFullYear();
            var months=tim.getMonth()+1;
            var data=tim.getDate();
            var hours=tim.getHours();
            var minutes=tim.getMinutes();
            var seconds=tim.getSeconds();
            return years+"-"+months+"-"+data+" "+hours+":"+minutes+":"+seconds;
      }},
      {field: 'mesip',align:'center',title: '留言ip地址<br>(mesip)',width:150},
      {field: 'mescon',align:'center',title: '留言内容<br>(mescon)',width:300},
      {field: 'mestel',align:'center',title: '留言电话<br>(mestel)',width:150},
      {field: 'mesemai',align:'center',title: '留言邮箱<br>(mesemai)',width:150},
    ]]
    ,id:'testReload'
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
          url:"/index.php/Admin/Mesgs/deleteRow",
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


  form.on('switch(switchTest)', function(data){
    this.checked ? 'true' : 'false'

    if(this.checked){
      $.ajax({
          url:"/index.php/Admin/Mesgs/switcEmail",
          type:"post",
          dataType:"json",
          data:{statu:"contru"},
          success:function(data){
              layer.msg(data.info);
              if(data.url){
                setTimeout(function(){
                  window.location.href=data.url;
                },2500)
              }
          },
          error:function(data){
            console.log(data);
              layer.msg(data.info);
          }
      });
    }else{
      $.ajax({
          url:"/index.php/Admin/Mesgs/switcEmail",
          type:"post",
          dataType:"json",
          data:{statu:"conflse"},
          success:function(data){
            console.log(data);
              layer.msg(data.info);
              setTimeout(function(){

              },500)
          },
          error:function(data){
            console.log(data);
              layer.msg(data.info);
          }
      });
    }

      
  });
  


});
</script>
</body>
</html>