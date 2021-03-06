<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户组管理</title>
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
    <button class="layui-btn layui-btn-md newUser">添加用户组</button>
  </div>
</script>
 
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-sm" lay-event="edit">分配权限</a>
  <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="delete">删除</a>
</script>




<script type="text/html" id="checRule">
  <a class="layui-btn layui-btn-sm layui-btn-normal" lay-event="checkRul">查看权限</a></script>

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
    <label class="layui-form-label">用户组名</label>
    <div class="layui-input-inline">
      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入用户组名" class="layui-input">
    </div>
  </div>
</div>
</form>
</div>



<!-- 分配权限弹出框 -->
<div id="ffff" style="display:none;padding-top: 15px;
    padding-right: 15px;">

<form class="layui-form layui-fff" lay-filter="formTests" action="" method="post">
  <div class="layui-form-item">

    <div class="layui-input-block" style="margin-left:0;padding:0 15px 15px;">




      <?php foreach($aut as $vo){ ?>

      <div style="border-bottom:1px solid #eee;padding-bottom:6px;margin-bottom:20px;">

        <input class="sta_to" type="checkbox" title="<?php echo ($vo["title"]); ?>" name="id[]" value="<?php echo ($vo["id"]); ?>" data-statu="to">

        <div style="padding:0 50px;">

          <?php foreach($vo['child'] as $voo){ ?>

          <div class="chilnod" style="display:inline-block;">
            <input type="checkbox" name="id[]" value="<?php echo ($voo["id"]); ?>" title="<?php echo ($voo["title"]); ?>" data-statu="bo">
          </div>

          <?php } ?>

        </div>


      </div>
      <?php } ?>

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
    ,url:'http://localhost:85//index.php/Admin/Jurisdiction/listss'
    ,toolbar: '#toolbarDemo'
    ,cols: [[
    {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:80}
      ,{field:'title', title:'用户组名', width:100}
      ,{field:'rules', title:'待定', width:150,toolbar:'#checRule',align:'center'}
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
  



form.on('checkbox()', function(data){
  // console.log(data.elem.checked); //是否被选中，true或者false
  var dom=data.elem;


  // 选中状态时发生的事情
  if(dom.checked==true){


    // 选中的是顶级的时候
    if($(dom).data('statu')=="to"){

      $(dom).parent().find('input').prop("checked",true);
      form.render();

    // 选中是子节点的时候，需要将所有兄弟节点找出来，并确定是否都选中了，如果都选中了，则给他的顶级节点一个选中状态
    }else{

      var _stat=true;
      $(dom).parent().parent().find('input').each(function(index,item){
        if($(this).is(':checked')==false){
          _stat=false;
        }
      });
      if(_stat){
        $(dom).parent().parent().parent().find('input').prop("checked",true);
      }
      form.render();
    }



  // 取消选中状态时发生的事情
  }else{

    // 取消选中状态是顶级的时候
    if($(dom).data('statu')=="to"){

      $(dom).parent().find('input').prop("checked",false);
      form.render();


    }else{

      var _stat=false;
      $(dom).parent().parent().find('input').each(function(index,item){
        if($(this).is(':checked')==false){
          _stat=true;
        }
      });
      if(_stat){
        $(dom).parent().parent().parent().find('.sta_to').prop("checked",false);
      }
      form.render();

    }
  }
  // console.log((data.elem).data('statu'));
  // console.log(data.elem.data('statu')); //得到checkbox原始DOM对象
  
  // console.log(data.value); //复选框value值，也可以通过data.elem.value得到
  // console.log(data.othis); //得到美化后的DOM对象
});




  // 点击工具框的时候获取该行所有数据
  table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
    // 编辑数据

    // 分配用户组权限
    var rules=data.rules;
    if(rules){
      
      var ar=rules.split(",");
      $('.layui-fff input').each(function(){
          if(ar.indexOf($(this).val())!=-1){
              $(this).attr("checked",true);
              form.render();
          }
      })
    }else{
      $('.layui-fff input').attr("checked",true);
      form.render();
    }




    if(layEvent === 'edit'){ 
        layer.open({
          type: 1, 
          title:"分配改组权限",
          offset: 'auto',
          btn: ['保存', '取消'],
          area: ['1400px', '600px'],
          content:$('#ffff'),

          yes: function(index, layero){
            var str=new Array();
            // 点击保存的时候，获取选中的复选框数据，通过ajax将数据传输到后台进行更新,并返回处理状态
            $('.layui-fff input').each(function(){
                if($(this).is(":checked")){
                    str.push($(this).val());
                }
            })
            str=JSON.stringify(str);
            $.ajax({
              url:'/index.php/Admin/Jurisdiction/AssignAuthority',
              type:'post',
              data:{id:data.id,aut:str},
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
            window.history.go(0);
            $('#ffff').css("display",'none');
            //return false 开启该代码可禁止点击该按钮关闭
          },cancel: function(){ 
            $('#ffff').css("display",'none');
          }

        });



    }else if(layEvent === 'delete'){ //删除
      layer.confirm('真的删除行么', function(index){
        $.ajax({
            url:"/index.php/Admin/Jurisdiction/deletes/id/"+data.id,
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
          title:"创建新用户组",
          offset: 'auto',
          btn: ['保存', '取消'],
          area: ['400px', '200px'],
          content:$('#fff'),

          yes: function(index, layero){
            // 点击保存的时候，通过ajax将数据传输到后台进行更新,并返回处理状态
            
            $.ajax({
              url:'/index.php/Admin/Jurisdiction/groups',
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