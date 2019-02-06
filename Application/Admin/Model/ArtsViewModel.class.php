<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class ArtsViewModel extends ViewModel{
	protected $viewFields = array(
		'Arts'=>array('*','_type'=>'LEFT'),
		'Cateart'=>array('catena','_on'=>'Arts.catid=Cateart.id'),
	);
}
?>