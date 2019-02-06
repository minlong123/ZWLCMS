<?php
namespace Admin\Model;
use Think\Model;
class AdminsModel extends Model{
	protected $_validate=array(
		// 新增管理员的时候验证
		// 修改管理员信息的时候验证
		array('adminuser','',"添加的管理员名已存在",0,'unique',1),


		// 修改管理员信息的时候验证
		array('adminuser','require',"修改的管理员用户名不能为空",1,'regex',2),
		array('adminpwd','require','密码格式不正确',2,'regex',2),
		// 登录后验证
		array("adminuser",'require',"登录用户名不能为空",1,'regex',4),
		array("adminpwd",'require',"登录密码不能为空",1,'regex',4),
	);

	public function login(){
		$adminpwd=$this->adminpwd;
		$info=$this->where(array("adminuser"=>$this->adminuser))->find();
		if($info){
			if($info['adminpwd']==md5($adminpwd)){
				session('idsss',$info['id']);
				session('adminuser',$info['adminuser']);
				session('lastmap',$info['lastmap']);
				// 过期时间为20分钟
				session('expire',time()+1200);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


}
	

?>