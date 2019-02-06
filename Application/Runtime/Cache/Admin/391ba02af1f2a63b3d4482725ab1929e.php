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
        <a href="/index.php/Admin/Cat/index">分类管理</a>
        <a><cite>添加分类</cite></a>
      </span>
    </div>

<form class="layui-form" action="" method="post">

  <blockquote class="layui-elem-quote">单页请在模版文件名前加Index_,列表页文件名请加List_,文章模版名请加Artic_开头<br>
  </blockquote>
  <div class="layui-form-item">
    <label class="layui-form-label">分类名</label>
    <div class="layui-input-block">
      <input type="text" name="catena" lay-verify="title" autocomplete="off" placeholder="请输入分类名" class="layui-input">
    </div>
  </div>


  <div class="layui-form-item">

    <label class="layui-form-label">上级分类</label>
    <div class="layui-input-block">
      <select name="pid" lay-verify="required" lay-search="">
        <option value="">选择一个父节点</option>
        <option value="0">顶级分类</option>
        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">
            <?php  $str=""; for($i=0;$i<$vo['level'];$i++){ $str.="---"; } echo $str; ?>

          <?php echo ($vo["catena"]); ?>
        </option><?php endforeach; endif; else: echo "" ;endif; ?>

      </select>
    </div>
  </div>
  



  <div class="layui-form-item">

   <!-- 后面改成下拉列表，选择前台view文件下模版 -->
    <div class="layui-inline">
      <label class="layui-form-label">跳转模版</label>
      <div class="layui-input-inline">
        <select name="uls" lay-search="">
          <option value="">根据当前分类类型，选择单页或列表模版</option>
          <?php foreach($files as $k){ ?>
          <option value="<?php  $ar=explode('.',$k); $arr=explode('_',$ar[0]); echo $arr[0].'/'.$arr[1]; ?>"><?php echo ($k); ?>
            <?php  if(strpos($k,'Index_')!==false){ echo "单页"; }else{ echo "列表页"; } ?>

          </option>
          <?php } ?>
        </select>
      </div>

    </div>


    <div class="layui-inline">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-inline">
        <input type="text" lay-verify="required|number" autocomplete="off"  placeholder="请给分类排序" name="sors" id="date" class="layui-input">
      </div>
    </div>
  </div>

  
  <div class="layui-form-item">
    <label class="layui-form-label">分类类型</label>
    <div class="layui-input-block">
      <input type="radio" name="typs" value="1" title="单页" checked="">
      <input type="radio" name="typs" value="2" title="列表页">
    </div>
    <p>如果该分类下还会有一级请一律选择单页</p>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">文章模版</label>
    <div class="layui-input-block">
      <select name="arttem" lay-search="">
          <option value="">选择一个文章模版(仅限列表页类型)</option>
          <?php foreach($artfiles as $k){ ?>
          <option value="<?php  $ar=explode('.',$k); $arr=explode('_',$ar[0]); echo $arr[0].'/'.$arr[1]; ?>"><?php echo ($k); ?></option>
          <?php } ?>


      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分类标题</label>
    <div class="layui-input-block">
      <input type="text" name="tits" lay-verify="title" autocomplete="off" placeholder="请输入分类名(列表类型不需要)" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">分类描述</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入该分类单页的描述(列表类型不需要)" name="descc" class="layui-textarea"></textarea>
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">分类关键词</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入分类单页的关键词(列表类型不需要)" name="kws" class="layui-textarea"></textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
  
  //监听提交，提交后，检索关键几个字段的值是否存在，如果不存在，则使用ajax方式提交
  form.on('submit(demo1)', function(data){
    if(data.field.pid==''){
      layer.open({
        title: '提交信息'
        ,content: '上级分类不能为空'
      });
    }else if(data.field.catena==''){
      layer.open({
        title: '提交信息'
        ,content: '分类名不能为空'
      });
    }else if(data.field.typs==''){
      layer.open({
        title: '提交信息'
        ,content: '请为当前分类选择一个类型'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Cat/add',
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