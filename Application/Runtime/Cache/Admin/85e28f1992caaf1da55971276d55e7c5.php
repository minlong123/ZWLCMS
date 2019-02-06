<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统</title>
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
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
      <span class="layui-breadcrumb">
        <a href="/index.php/Admin/Index/index">控制台</a>
        <a><cite>手机接口配置</cite></a>
      </span>
    </div>


<div class="layui-container">  
  <div class="layui-row">
    <div class="layui-col-md6">
      
<blockquote class="layui-elem-quote">接收信息的手机号：<span style="color:#FF5722"><?php echo ((isset($confiss[0]['telss']) && ($confiss[0]['telss'] !== ""))?($confiss[0]['telss']):"尚未配置"); ?></span></blockquote>
    </div>
    <div class="layui-col-md6">

<form class="layui-form" action="" method="post">

  <div class="layui-form-item">
    <label class="layui-form-label">手机号:</label>
    <div class="layui-input-inline">
      <input type="text" name="telss" lay-verify="" autocomplete="off" placeholder="输入接收通知的11位手机号" value="<?php echo ($confiss[0]['telss']); ?>" class="layui-input">
      <input type="hidden" name="id" value="<?php echo ($confiss[0]['id']); ?>">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即配置</button>
      <button class="layui-btn" lay-submit="" lay-filter="demo2">立即测试</button>
    </div>
  </div>
</form>
      
    </div>
  </div>


<blockquote style="text-align:center;color:red;" class="layui-elem-quote layui-quote-nm">手机号接收通知及相关信息是第三方付费产品,该接口每位客户仅支持试用3次。长期使用请联系微信:minlongdemeng</blockquote>


  </div>
  <div class="layui-footer">
    <!-- 底部固定区域 -->
      备案相关信息
  </div>
</div>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>
<script>

layui.use(['form','element', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate
  ,ele=layui.element;
  
  //监听提交，提交后，检索关键几个字段的值是否存在，如果不存在，则使用ajax方式提交
  // 邮箱信息配置
  form.on('submit(demo1)', function(data){
    if(data.field.telss==''){
      layer.open({
        title: '提交信息'
        ,content: '绑定手机号不能为空'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Tels/index',
        type:'post',
        data:$('.layui-form').serialize(),
        dataType:"json",
        success:function(data){
          layer.msg(data.info,{
            anim: 2,
            time:2000
          },function(){
            window.location.href=data.url;
          });
        },
        error:function(data){
          layer.open({
            title: '提交信息'
            ,content: data.info
          });
        }

      })
    }
    return false;
  });


  // 立即测试
  form.on('submit(demo2)', function(data){
    if(data.field.telss==''){
      layer.open({
        title: '提交信息'
        ,content: '请先绑定手机号!'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Tels/sendTest',
        type:'post',
        data:{},
        dataType:"json",
        success:function(data){
          console.log(data);
          layer.msg(data.info,{
            anim: 2,
            time:2000
          },function(){
            // window.location.href=data.url;
          });
        },
        error:function(data){
          console.log(data);
          layer.open({
            title: '提交信息'
            ,content: data.info
          });
        }

      })
    }
    return false;
  });
 
  
});
</script>


</body>
</html>