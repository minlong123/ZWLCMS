<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>致未来后台管理系统</title>
<link href="http://localhost:85//Application/Admin/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- -->
<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>


<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script>$(document).ready(function(c) {
  $('.alert-close').on('click', function(c){
    $('.message').fadeOut('slow', function(c){
        $('.message').remove();
    });
  });   
});
</script>
</head>
<body>
<!-- contact-form --> 
<div class="message warning">
<div class="inset" style="width: 500px;display: table;
    margin:7% auto;">
  <div class="login-head">
    <h1>致未来后台管理系统</h1>
     <div class="alert-close"> </div>       
  </div>
    <form method="post" class="layui-form">
      <li>
        <input type="text" name="adminuser" class="text" value="管理员账号" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '管理员账号';}"><a href="#" class=" icon user"></a>
      </li>
        <div class="clear"> </div>
      <li>
        <input type="password" name="adminpwd" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"> <a href="#" class="icon lock"></a>
      </li>
      <div class="clear"> </div>
      <div class="submit">
        <input type="submit" value="Sign in" lay-submit="" lay-filter="demo1">
        <h4><a href="#">今天，你开心吗？</a></h4>
              <div class="clear">  </div> 
      </div>
        
    </form>
    </div>          
  </div>
  </div>
  <div class="clear"> </div>


<script type="text/javascript" src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>

<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //监听提交，提交后，检索关键几个字段的值是否存在，如果不存在，则使用ajax方式提交
  form.on('submit(demo1)', function(data){
    console.log(data);
    if(data.field.adminuser=='管理员账号'){
      layer.open({
        title: '提交信息'
        ,content: '管理员账户不能为空'
      });
    }else if(data.field.adminpwd=='Password'){
      layer.open({
        title: '提交信息'
        ,content: '密码不能为空'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Login/login',
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
 
  
  
});
</script>
</body>
</html>