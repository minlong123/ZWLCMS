<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/layui.css">
  <!-- <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/common.css"> -->
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
        <a><cite>用户管理主面板</cite></a>
      </span>

      <div class="layui-fluid">  

        <div class="layui-row">


          <div class="layui-col-md12">


<table class="layui-hide" id="test" lay-filter="test"></table>



<script type="text/html" id="toolbarDemo">
  <div class="layui-btn-container">
    <button class="layui-btn layui-btn-md newUser">创建用户</button>
  </div>
</script>
 
<script type="text/html" id="barDemo">

  {{#  if(d.id ==1){ }}
    <span>超级管理员</span>
  {{#  } else{ }}
    <a class="layui-btn layui-btn-sm" lay-event="edit">添加用户组</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="delete">删除</a>
  {{#  } }}

</script>



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







<!-- 添加用户弹出框 -->
<div id="fff" style="display:none;padding-top: 15px;
    padding-right: 15px;">

<form class="layui-form layui-ff" lay-filter="formTest" action="" method="post">

<div class="layui-form-item">
  <div class="layui-inline">
    <label class="layui-form-label">用户名</label>
    <div class="layui-input-inline">
      <input type="text" name="adminuser" lay-verify="title" autocomplete="off" placeholder="请输入用户名" class="layui-input">
      <p style="color:red;padding:5px;">密码默认为123456</p>
    </div>
  </div>
</div>
</form>
</div>







<!-- 分配用户组弹出框 -->
<div id="ffff" style="display:none;padding-top: 15px;
    padding-right: 15px;">
<form class="layui-form layui-fff" lay-filter="formTests" action="" method="post">

  <div class="layui-form-item">
    <div class="layui-input-block" style="margin-left:0;padding-left:15px;">

      <?php if(is_array($resu)): $i = 0; $__LIST__ = $resu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="id[]" value="<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
  </div>
</form>
</div>




<script src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>
 
<script>
layui.use(['form','element', 'layedit', 'laydate','table'], function(){
  var table = layui.table;
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate
  ,ele=layui.element;
  table.render({
    elem: '#test'
    ,url:'http://localhost:85//index.php/Admin/Jurisdiction/lists'
    ,toolbar: '#toolbarDemo'
    ,cols: [[
    {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:80}
      ,{field:'adminuser', title:'用户名', width:100}
      ,{field:'lastmap', title:'上一次登陆时间', width:200,sort:true,templet:function(d){
            if(d.lastmap==null){
              return "";
            }
            var tim=new Date(parseInt(d.lastmap)*1000);
            var years=tim.getFullYear();
            var months=tim.getMonth()+1;
            var data=tim.getDate();
            var hours=tim.getHours();
            var minutes=tim.getMinutes();
            var seconds=tim.getSeconds();
            return years+"-"+months+"-"+data+" "+hours+":"+minutes+":"+seconds;
      }}
      ,{field:'group_tit', title:'所属用户组', width:400}
      ,{title:'操作', toolbar: '#barDemo'}
    ]]
    ,page: true
  });
  



  //头工具栏事件
  table.on('toolbar(test)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        layer.alert(JSON.stringify(data));
      break;
      case 'getCheckLength':
        var data = checkStatus.data;
        layer.msg('选中了：'+ data.length + ' 个');
      break;
      case 'isAll':
        layer.msg(checkStatus.isAll ? '全选': '未全选');
      break;
    };
  });
  


  // 单行数据删除
  table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
    // $('.layui-fff input').attr("checked",false);

    // console.log(data);

    var groupid=data.group_id;
    if(groupid){
      var ar=groupid.split(",");
      $('.layui-fff input').each(function(){
          if(ar.indexOf($(this).val())!=-1){
              $(this).attr("checked",true);
              form.render();
          }
      })
    }

    if(layEvent === 'edit'){
        layer.open({
          type: 1, 
          title:"划分用户组",
          offset: 'auto',
          btn: ['保存', '取消'],
          area: ['400px', '200px'],
          content:$('#ffff'),
// 点击保存的时候，获取选中的复选框数据，通过ajax将数据传输到后台进行更新,并返回处理状态
          yes: function(index, layero){

            var str=new Array();
            var stt=new Array();
            $('.layui-fff input').each(function(){
                if($(this).is(":checked")){
                    str.push($(this).val());
                    stt.push($(this).attr('title'));
                }
            })
            str=JSON.stringify(str);
            stt=JSON.stringify(stt);

            $.ajax({
              url:'/index.php/Admin/Jurisdiction/divide',
              type:'post',
              data:{id:data.id,aut:str,stt:stt},
              dataType:"json",
              success:function(datas){
                layer.msg(datas.info,{
                  anim: 2,
                  time:1000
                },function(){
                  window.location.href=datas.url;
                });
              },
              error:function(datas){
                layer.open({
                  title: '提交信息'
                  ,content: datas.info
                });
              }

            })

            //按钮【按钮一】的回调
          },
          btn2: function(index, layero){

            window.history.go(0);
            //按钮【按钮二】的回调
            $('#ffff').css("display",'none');
            //return false 开启该代码可禁止点击该按钮关闭
          },cancel: function(){
            $('#ffff').css("display",'none');
          }
        });
    }else if(layEvent === 'delete'){ //删除
      layer.confirm('真的删除行么', function(index){
        $.ajax({
            url:"/index.php/Admin/Jurisdiction/delete/id/"+data.id,
            type:"get",
            dataType:"json",
            success:function(data){
                layer.msg(data.info);
                layer.close(index);
                obj.del();
                // 删除这条数据的dom
            },
            error:function(data){
               
            }
        });
      });
    }
  });



// 创建新用户
  $('.newUser').click(function(){
        layer.open({
          type: 1, 
          title:"创建新用户",
          offset: 'auto',
          btn: ['保存', '取消'],
          area: ['400px', '200px'],
          content:$('#fff'),

          yes: function(index, layero){
            // 点击保存的时候，通过ajax将数据传输到后台进行更新,并返回处理状态
            
            $.ajax({
              url:'/index.php/Admin/Jurisdiction/index',
              type:'post',
              data:$('.layui-ff').serialize(),
              dataType:"json",
              success:function(datas){
                layer.msg(datas.info,{
                  anim: 2,
                  time:1000
                },function(){
                  window.location.href=datas.url;
                });
              },
              error:function(datas){
                layer.open({
                  title: '提交信息'
                  ,content: datas.info
                });
              }

            })

            //按钮【按钮一】的回调
          },
          btn2: function(index, layero){
            //按钮【按钮二】的回调
            $('#fff').css("display",'none');
            //return false 开启该代码可禁止点击该按钮关闭
          },cancel: function(){ 
            $('#fff').css("display",'none');
          }

        });
  })
});
</script>

</body>
</html>