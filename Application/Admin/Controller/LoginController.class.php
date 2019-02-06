<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(session("idsss")){
            $this->redirect('Index/index');
        }else{
            $this->display();
        } 
        
    }
    public function login(){
        date_default_timezone_set('PRC');
    	$admin=D('Admins');
        $data['lastmap']=time();
        import('ORG.Net.IpLocation');
        $data['lastip']=get_client_ip();
    	if(IS_AJAX){
    		if($admin->create($_POST,4)){
    			if($admin->login()){
                    // 登陆验证通过之后，存储登录的时间和IP地址
                    $admin->where(array('id'=>session('idsss')))->save($data);
    				$this->success("登录成功",U('Index/index'));
    			}else{
    				$this->error("您的用户名或者密码错误!");
    			}
    		}else{
    			$this->error($admin->getError());
    		}
    	}
    	return;
    }




    public function logout(){
        session(null);
        $this->redirect('index');
    }
}