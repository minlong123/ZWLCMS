<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    public function _initialize(){
/*
*哪些是公共的权限，全部放行
*放行超级管理员
**/
      // 用户权限检查
      $auth=new \Think\Auth();
      $rule_name=CONTROLLER_NAME.'/'.ACTION_NAME;
      if(CONTROLLER_NAME != "Index" && !in_array($_SESSION['idsss'],C("ADMINISTRATOR"))){
         $result=$auth->check($rule_name,$_SESSION['idsss']);
         if(!$result){
            $this->error('您没有权限访问',U('Login/index'));
         }
     }
   }


    public function __construct(){
        parent::__construct();
		if(!empty(session("expire"))){
            $config =   M('Configs')->find();
            C($config);
            if(session("expire")<time()){
                session(null);
                $this->redirect('Login/index');
            }else{
//                刷新时间戳
                session("expire",time()+1200);
            }
        }else{
             $this->redirect('Login/index');
        }
    }
}

?>