<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统-文章修改</title>
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
            <dd><a href="/index.php/Admin/Cat/index">分类管理</a></dd>
            <dd><a href="/index.php/Admin/Cat/add">添加分类</a></dd>
            <dd><a href="/index.php/Admin/Arts/index">文章管理</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:void(0)">权限管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/index.php/Admin/Jurisdiction/index">创建管理员</a></dd>
            <dd><a href="/index.php/Admin/Jurisdiction/groups">创建用户组</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item layui-nav-itemed">
          <a href="javascript:void(0)">基础功能</a>
          <dl class="layui-nav-child">
            <dd><a href="/index.php/Admin/Mesgs/index">留言管理</a></dd>
            <dd><a href="/index.php/Admin/Roll/index">滚动消息管理</a></dd>
            <dd><a href="/index.php/Admin/Caross/index">轮播图管理</a></dd>
          </dl>
        </li>
 
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
      <span class="layui-breadcrumb">
        <a href="/index.php/Admin/Index/index">控制台</a>
        <a href="/index.php/Admin/Arts/index">文章列表管理主面板</a>
        <a><cite>文章修改</cite></a>
      </span>

    <form class="layui-form editfm" method="post" enctype="multipart/form-data" >

      <div class="layui-form-item">
        <label class="layui-form-label">文章标题</label>
        <div class="layui-input-block">
          <input type="text" name="lart" value="<?php echo ($dasss["lart"]); ?>" required lay-verify="required" lay-verify="title" autocomplete="off" placeholder="请输入文章的长标题" class="layui-input">
        </div>
      </div>


      <div class="layui-form-item">

        <div class="layui-inline">
          <label class="layui-form-label">文章分类</label>
          <div class="layui-input-inline">
            <select name="catid" required lay-verify="required" lay-filter="aihao">
              <option value="">请选择文章分类</option>

              <?php if(is_array($catarts)): $i = 0; $__LIST__ = $catarts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($dasss["catid"] == $vo['id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["catena"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select>
          </div>
        </div>

        <div class="layui-inline">
          <label class="layui-form-label">副标题</label>
          <div class="layui-input-block">
            <input type="text" name="shot" value="<?php echo ($dasss["shot"]); ?>" placeholder="选填" autocomplete="off" class="layui-input">
          </div>
        </div>


      </div>


      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">浏览人数</label>
          <div class="layui-input-inline">
            <input type="text" placeholder="请输入整数" value="<?php echo ($dasss["bors"]); ?>" name="bors" lay-verify="number" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-inline">
          <label class="layui-form-label">作者</label>
          <div class="layui-input-inline">
            <input type="text" name="autos" value="admin" value="<?php echo ($dasss["autos"]); ?>" autocomplete="off" class="layui-input">
            <input type="hidden" name="id" value="<?php echo ($dasss["id"]); ?>">
          </div>
        </div>

      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">文章关键词</label>
        <div class="layui-input-block">
          <input type="text" name="kws" required lay-verify="required" lay-verify="title" autocomplete="off" placeholder="请输入文章的关键词" value="<?php echo ($dasss["kws"]); ?>" class="layui-input">
        </div>
      </div>

      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文章描述</label>
        <div class="layui-input-block">
          <textarea placeholder="请输入文章的描述" name="desccc" class="layui-textarea"><?php echo ($dasss["desccc"]); ?></textarea>
        </div>
      </div>



      <div class="layui-form-item">
        <label class="layui-form-label">文章配图</label>
        <div class="layui-input-block">
          <div class="layui-upload-drag" id="test10">
            <i class="layui-icon"></i>
            <p>点击上传，或将文件拖拽到此处</p>
          </div>
           <img src="/<?php echo ($dasss["artimg"]); ?>" class="add_imgss" />
           <input type="hidden" name="artimg" value="<?php echo ($dasss["artimg"]); ?>" class="shopicc" />
        </div>
      </div>



      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文章内容</label>
        <div class="layui-input-block">
          <textarea name="cons" class="layui-textarea" id="containers" style="height:500px;width:800px;"><?php echo ($dasss["cons"]); ?></textarea>
        </div>
      </div>


      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit="" lay-filter="demo1" id="submits">立即提交</button>
        </div>
      </div>
    </form>

    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
      备案相关信息
  </div>
</div>


<script type="text/javascript" src="http://localhost:85//Application/Admin/public/uedit/ueditor.config.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/uedit/ueditor.all.min.js"> </script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/uedit/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
   var ue = UE.getEditor('containers');
</script>
<script src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>
<script type="text/javascript">
layui.use(['upload','form','laydate'], function(){
    var $ = layui.jquery;
    var upload = layui.upload;
    var form = layui.form;
    var layer = layui.layer;
    var layedit = layui.layedit;
    var laydate = layui.laydate;

    laydate.render({
      elem: '#date'
    });

// 图片上传接口问题后面要注意下,图片是在没有提交表单的时候上传的。为了避免多次上传图片，而没有提交的问题，在提交的时候，需要做一个缓存，主要的目的是要删除多余上传的图片，未保存到数据库中的图片
    upload.render({
      elem: '#test10'
      ,url: 'http://localhost:85//index.php/Admin/Arts/uploads'
      ,accept:"images"
      ,method: 'post'
      ,done: function(res){
        $('.add_imgss').attr('src',"http://localhost:85/"+res.data.src);
        $('.shopicc').val(res.data.src);
        layer.open({
          content:res.msg,
        });
      }
    });

      //监听提交，提交后，检索关键几个字段的值是否存在，如果不存在，则使用ajax方式提交
  form.on('submit(demo1)', function(data){
    if(data.field.lart==''){
      layer.open({
        title: '提交信息'
        ,content: '标题不能为空'
      });
    }else if(data.field.catid==''){
      layer.open({
        title: '提交信息'
        ,content: '文章所属分类不能为空'
      });
    }else if(data.field.cons==''){
      layer.open({
        title: '提交信息'
        ,content: '文章内容不能为空'
      });
    }else{
      $.ajax({
        url:'/index.php/Admin/Arts/edit',
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