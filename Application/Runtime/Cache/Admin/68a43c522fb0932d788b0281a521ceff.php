<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理系统</title>
  <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/layui.css">
  <link rel="stylesheet" href="http://localhost:85//Application/Admin/public/css/common.css">
  <style type="text/css">
    .layui-form-item .layui-input-inline{
      width:233px;
    }
  </style>
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
        <a><cite>分类管理</cite></a>
      </span>

      <div class="layui-fluid">  
        <div class="layui-row">
          <div class="layui-col-md5">

            <div class="layui-btn-group demoTable">
                <a href="/index.php/Admin/Cat/add" class="layui-btn" data-type="getCheckData">添加分类</a>
            </div>
          </div>

          <div class="layui-col-md7">
          <span style="color:#009688">删除存在上下级的分类的时候,它的下一级会继承当前删除的分类的位置关系</span>
          <hr>
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


<div id="fff" style="display:none;padding-top: 15px;
    padding-right: 15px;">

<form class="layui-form layui-ff" lay-filter="formTest" action="" method="post">

<div class="layui-form-item">
  <div class="layui-inline">
    <label class="layui-form-label">分类名</label>
    <div class="layui-input-inline">
      <input type="text" name="catena" lay-verify="title" autocomplete="off" placeholder="请输入分类名" class="layui-input">
    </div>
  </div>

  <div class="layui-inline">
    <label class="layui-form-label">分类类型</label>
    <div class="layui-input-inline">
      <input type="radio" name="typs" value="1" title="单页" checked="">
      <input type="radio" name="typs" value="2" title="列表页">
    </div>
  </div>
</div>



  <div class="layui-form-item">

    <label class="layui-form-label">上级分类</label>
    <div class="layui-input-block">
      <select name="pid" lay-verify="required" lay-filter="parcat" lay-search="">
        <option value="">选择一个父节点</option>
        <option value="0">顶级分类</option>
        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- 修改上一级分类的时候，不能选择他自己，所以必须隐藏自身分类或者通过监听选择框，选择自身则触发警告 -->
          <!-- 现在知道自身id,然后在判断相等即可 -->
          <option value="<?php echo ($vo["id"]); ?>">
            <?php  $str=""; for($i=0;$i<$vo['level'];$i++){ $str.="----"; } echo $str; ?>

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
        <select name="uls" lay-verify="required" lay-search="">
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
  <div class="layui-inline">
    <label class="layui-form-label">文章模版</label>
    <div class="layui-input-inline">

      <select name="arttem" lay-verify="required" lay-search="">
          <option value="">选择一个文章模版</option>
          <?php foreach($artfiles as $k){ ?>
          <option value="<?php  $ar=explode('.',$k); $arr=explode('_',$ar[0]); echo $arr[0].'/'.$arr[1]; ?>"><?php echo ($k); ?></option>
          <?php } ?>
      </select>

    </div>
  </div>

  <div class="layui-inline">
    <label class="layui-form-label">分类标题</label>
    <div class="layui-input-inline">
      <input type="text" name="tits" lay-verify="title" autocomplete="off" placeholder="请输入分类名(列表类型不需要)" class="layui-input">
      <input type="hidden" name="id">
    </div>
  </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分类关键词</label>
    <div class="layui-input-block">
      <input type="text" placeholder="请输入分类单页的关键词(列表类型不需要)" name="kws" lay-verify="title" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">分类描述</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入该分类单页的描述(列表类型不需要)" name="descc" class="layui-textarea"></textarea>
    </div>
  </div>


</form>
</div>



<script type="text/javascript" src="http://localhost:85//Application/Admin/public/layui.all.js"></script>
<script src="http://localhost:85//Application/Admin/public/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost:85//Application/Admin/public/js/common.js"></script>
<script>

layui.use(['table','form','layedit','laydate'], function(){
  var table=layui.table;
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;
// 数据表格渲染
  table.render({
     elem: '#demo'
    ,url: 'http://localhost:85//index.php/Admin/Cat/lists' //数据接口
    ,loading: true
    ,page: false //开启分页
    ,cols: [[ //表头
 
      {field: 'id',align:'center',title: 'ID',width:70},
      {field: 'sors',align:'center',title: '排序',width:100,edit: 'text'},
      {field:'catena',align:'left',title:'分类名',width:300,templet:function(d){
        var str="";
        for(var i=0;i<d.level;i++){
          str+=" ↑---- "
        }
        return str+d.catena;
      }},
      {field:'typs',align:'center',title:'类型',width:150,templet:function(d){
            if(d.typs=='1'){
              return '单页';
            }else if(d.typs=='2'){
              return '列表页';
            }
      }},

      {align:'center',title: '操作',width:200, align:'center', toolbar: '#barDemo'}
    ]]
    ,id:'testReload'
  });



  // 单行数据删除
  table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）


    // 编辑数据，获取该行所有数据，显示在表单的内容中
    if(layEvent === 'edit'){ 
        form.val("formTest", {
          "id":data.id,
          "catena":data.catena,
          "pid":data.pid,
          "uls":data.uls,
          "sors":data.sors,
          "typs":data.typs,
          "arttem":data.arttem,
          "tits":data.tits,
          "descc":data.descc,
          "kws":data.kws,
        })
      form.on('select(parcat)', function(datas){


        // 禁止编辑的时候选择自己为上一级分类
        if(parseInt(datas.value)==data.id){

          form.val("formTest", {
            "pid":data.pid,
          })


        }

      });

        layer.open({
          type: 1, 
          title:"正在修改分类："+data.tits,
          offset: 'auto',
          btn: ['保存', '取消'],
          area: ['800px', '530px'],
          content:$('#fff'),

          yes: function(index, layero){
            // 点击保存的时候，通过ajax将数据传输到后台进行更新,并返回处理状态
            
            $.ajax({
              url:'/index.php/Admin/Cat/index',
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
     

    }else if(layEvent === 'delete'){ //删除
      layer.confirm('真的删除行么', function(index){
        $.ajax({
            url:"/index.php/Admin/Cat/delete/id/"+data.id,
            type:"get",
            dataType:"json",
            success:function(data){
                layer.msg(data.info,{
                  anim:2,
                  time:1000
                },function(){
                  window.history.go(0);
                });
                // 删除这条数据的dom
            },
            error:function(data){
                console.log(data);
            }
        });
      });
    }
  });

  //监听单元格编辑，首先需要三个数据，该行数据的id、修改后的内容、修改的是哪个字段的值
  table.on('edit(test)', function(obj){
    var value = obj.value //得到修改后的值
    ,data = obj.data //得到所在行所有键值
    ,field = obj.field; //得到字段
    
    $.ajax({
      url:'/index.php/Admin/Cat/editCell',
      type:'post',
      data:{id:data.id,fields:field,val:value},
      dataType:"json",
      success:function(datas){
          layer.msg('修改成功',{
            time:500
          },function(){
            
          });
      },
      error:function(datas){
          layer.msg('修改失败,请稍后再试!',{
            time:500
          },function(){
            window.history.go(0);
          });
      }

    })



  });



});
</script>


</body>



</html>