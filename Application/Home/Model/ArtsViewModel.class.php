<?php
namespace Home\Model;
use Think\Model\ViewModel;
class ArtsViewModel extends ViewModel{
 public $viewFields = array(
    'Cateart'=>array('*','_type'=>'LEFT'),
    'Arts'=>array('*','_on'=>'Arts.catid=Cateart.id','_type'=>'RIGHT'),
   );

}




?>