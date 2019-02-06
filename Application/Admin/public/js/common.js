layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer
  ,layedit = layui.layedit
  ,laydate = layui.laydate;


  $('.clearun').on('click',function(){
      $.ajax({
        url:'/Admin/Index/clears',
        type:'post',
        data:{},
        dataType:"json",
        success:function(data){
          layer.msg(data.info,{
            anim: 2,
            time:2000
          },function(){
            window.history.go(0);
          });
        },
        error:function(data){
          layer.open({
            title: '提交信息'
            ,content: data.info
          });
        }

      })
  });
});

// 权限管理补充,如果子节点都没有了，父节点就没有存在的必要了
$(function(){
  $('.layui-nav-itemed').each(function(index,item){
    if($(this).find('dd').length==0){
      $(this).css("display","none");
    }
  })
})