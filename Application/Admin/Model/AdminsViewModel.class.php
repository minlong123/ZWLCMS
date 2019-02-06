<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class AdminsViewModel extends ViewModel{
	protected $viewFields = array(
		'Admins'=>array('*','_type'=>'LEFT'),
		'AuthGroupAccess'=>array('*','_on'=>'Admins.id=AuthGroupAccess.uid'),
	);
}


?>