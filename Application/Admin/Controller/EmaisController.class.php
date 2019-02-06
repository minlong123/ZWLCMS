<?php
namespace Admin\Controller;
use Think\Controller;
class EmaisController extends CommonController {
    public function index(){
        $configs=D('Configs');
        $ress=$configs->select();
        if($ress){
            $this->assign('confiss',$ress);
        }
        if(IS_AJAX){
            if($configs->create()){
              if(empty($configs->id)){

                  if($configs->add()){
                     $this->success("配置成功",U('index'));
                  }else{
                     $this->error("配置失败,请稍后再尝试!");
                  }

              }else{
                  if($configs->save()){
                     $this->success("修改配置成功");
                  }else{
                     $this->error("修改配置失败,请修改任意一项再配置!");
                  }

              }
            }
        return;
      }
      $this->display();
    }

    // 调用邮箱发送的接口
    public function emaiest(){
        $tits=I('tits')?I('tits'):"测试";
        $conn=I('conn')?I('tits'):"测试";
        $flag=sendMail($tits,$conn);
        if($flag){
            $this->success("发送成功,请注意查收",U('index'));
        }else{
            $this->error("发送失败,请检查配置或者稍后再尝试!");
        }
   
    }

}