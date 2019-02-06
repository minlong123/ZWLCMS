<?php
namespace Admin\Controller;
use Think\Controller;
class TelsController extends CommonController {
    public function index(){
        $tels=D('Tels');
        $ress=$tels->select();
        if($ress){
            $this->assign('confiss',$ress);
        }
        if(IS_AJAX){
            if($tels->create()){
              if(empty($tels->id)){

                  if($tels->add()){
                     $this->success("配置成功",U('index'));
                  }else{
                     $this->error("配置失败,请稍后再尝试!");
                  }

              }else{
                  if($tels->save()){
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


// 对接的接口http://lianluxinxi.com/logins.html
    // 账户：13545774974
    // 密码:woaini007


// 接口
// http://lianluxinxi.com/sms.aspx?dataType=json&action=send&userid=4392&account=minmin&password=woaini007&mobile=13545774974,18001911753&content=【签名】这里是短信的内容&sendTime=&extno=

/**
接收到的是xml格式的数据结构。
关于短信的接口，后面在弄，这里面主要涉及到短信内容审查的问题，在需要具体实现某功能的时候再来做。

*/

    public function sendTest(){
      $tels=D('Tels');
      $ress=$tels->select();
      $id=$ress[0]['id'];
      $mobile="13545774974";
      $tits="你好";
      $content="【'".$tits."'】测试";
      $url="http://lianluxinxi.com/sms.aspx?dataType=json&action=send&userid=4392&account=minmin&password=woaini007&mobile=13545774974&content=这里内容&sendTime=&extno=";
      $result=$this->http_curl($url,'post');
      // $result=simplexml_load_string($result);
      // echo $result->message;

      // $mess=$result->message;
      
      // if($this->unicodeDecode($mess)=="ok"){
      //   $this->success("发送成功,请留意短信");
      // }else{
      //   $this->error($this->unicodeDecode($mess));
      // }
      
    }


      function unicodeDecode($unicode_str){
          $json = '{"str":"'.$unicode_str.'"}';
          $arr = json_decode($json,true);
          if(empty($arr)) return '';
          return $arr['str'];
      }

    // curl封转的一个函数，会经常使用到
    // $url 接口url string
    // $type 请求类型 string
    // $res 返回数据类型 string
    // $arr post请求参数 string
    public function http_curl($url,$type='get',$res='json',$arr=''){
        // 初始化curl
        $ch=curl_init();
        // 设置curl参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if($type=='post'){
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
        }
        // 采集
        $output=curl_exec($ch);
        // 关闭curl
        curl_close($ch);
        return $output;
    }

}