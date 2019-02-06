<?php
namespace Admin\Model;
use Think\Model;
class AuthGroupModel extends Model{
	protected $_validate=array(
		// 新增用户组的时候
		array('title','',"添加的用户组名已存在",0,'unique',1),


	);


}
	

?>