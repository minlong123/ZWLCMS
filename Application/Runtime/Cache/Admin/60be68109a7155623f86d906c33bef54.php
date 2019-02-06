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
        <a><cite>邮箱配置</cite></a>
      </span>
    </div>


<div class="layui-container">  
  <div class="layui-row">
    <div class="layui-col-md6">
      
<blockquote class="layui-elem-quote">发件人邮箱账号：<span style="color:#FF5722"><?php echo ((isset($confiss[0]['sendemil']) && ($confiss[0]['sendemil'] !== ""))?($confiss[0]['sendemil']):"尚未配置"); ?></span></blockquote>
<blockquote class="layui-elem-quote">发件人用于登录第三方邮件客户端的专用密码：<span style="color:#FF5722"><?php echo ((isset($confiss[0]['sendpass']) && ($confiss[0]['sendpass'] !== ""))?($confiss[0]['sendpass']):"尚未配置"); ?></span></blockquote>
<blockquote class="layui-elem-quote">发件人昵称：<span style="color:#FF5722"><?php echo ((isset($confiss[0]['sendrena']) && ($confiss[0]['sendrena'] !== ""))?($confiss[0]['sendrena']):"尚未配置"); ?></span></blockquote>
<blockquote class="layui-elem-quote">收件人邮箱账号：<span style="color:#FF5722"><?php echo ((isset($confiss[0]['shouemil']) && ($confiss[0]['shouemil'] !== ""))?($confiss[0]['shouemil']):"尚未配置"); ?></span></blockquote>

    </div>
    <div class="layui-col-md6">

<div style="text-align: center;
    margin-bottom:14px;"><span class="layui-badge layui-bg-cyan">发送测试</span></div>

<form class="layui-form layui-formss" action="" method="post">

  <div class="layui-form-item">
    <label class="layui-form-label">发件标题:</label>
    <div class="layui-input-block">
      <input type="text" name="tits" autocomplete="off" placeholder="请输入要测试的待发邮件标题" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">发送内容:</label>
    <div class="layui-input-block">
      <textarea class="layui-textarea" name="conn" placeholder="请输入要测试的内容"></textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo2">立即发送</button>
    </div>
  </div>
</form>

    </div>
  </div>


<blockquote style="text-align:center;color:red;" class="layui-elem-quote layui-quote-nm">用于接收邮箱的邮箱账号(需要将发邮箱的账号设置为受信任列表中,以免进入垃圾箱,而无法接收到邮件)</blockquote>


<form class="layui-form" action="" method="post">

  <div class="layui-form-item">
    <label class="layui-form-label">发件人邮箱:</label>
    <div class="layui-input-block">
      <input type="text" name="sendemil" lay-verify="email" autocomplete="off" placeholder="请输入发件人的邮箱账户" value="<?php echo ($confiss[0]['sendemil']); ?>" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">登陆授权码:</label>
    <div class="layui-input-block">
      <input type="text" name="sendpass" value="<?php echo ($confiss[0]['sendpass']); ?>" autocomplete="off" placeholder="请输入发件人邮箱的第三方登陆授权码" class="layui-input">
      <input type="hidden" name="id" value="<?php echo ($confiss[0]['id']); ?>">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">发件人昵称:</label>
    <div class="layui-input-block">
      <input type="text" name="sendrena" value="<?php echo ($confiss[0]['sendrena']); ?>" autocomplete="off" placeholder="请输入发送邮件时会显示的昵称" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">收件人邮箱:</label>
    <div class="layui-input-block">
      <input type="text" name="shouemil" value="<?php echo ($confiss[0]['shouemil']); ?>" lay-verify="email" autocomplete="off" placeholder="请输入接收邮件的账号" class="layui-input">
    </div>
  </div>




  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即配置</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>


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
    if(data.field.sendemil==''){
      layer.open({
        title: '提交信息'
        ,content: '发件邮箱不能为空'
      });
    }else if(data.field.sendpass==''){
      layer.open({
        title: '提交信息'
        ,content: '发件授权码不能为空'
      });
    }else if(data.field.sendrena==''){
      layer.open({
        title: '提交信息'
        ,content: '发件昵称不能为空'
      });
    }else if(data.field.shouemil==''){
      layer.open({
        title: '提交信息'
        ,content: '收件人邮箱不能为空'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Emais/index',
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
 
  
  // 发送邮件测试
  form.on('submit(demo2)', function(datas){
    if(datas.field.tits==''){
      layer.open({
        title: '提交信息'
        ,content: '请填写发送的标题再点击测试'
      });
    }else if(datas.field.conn==''){
      layer.open({
        title: '提交信息'
        ,content: '请填写发送的内容再点击测试'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Emais/emaiest',
        type:'post',
        data:$('.layui-formss').serialize(),
        dataType:"json",
        success:function(dataa){

          layer.msg(dataa.info,{
            anim: 2,
            time:2000
          },function(){
            window.location.href=data.url;
          });
        },
        error:function(dataa){
          layer.open({
            title: '提交信息'
            ,content: dataa.info
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