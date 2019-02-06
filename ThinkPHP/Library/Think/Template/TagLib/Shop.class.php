<?php

namespace Think\Template\TagLib;
use Think\Template\TagLib;
class Shop extends TagLib{
    //     // '标签名'=>array('attr'=>'传入参数变量,传入参数变量','close'=>1) //close 是否闭合（0 或者1 默认为1，表示闭合）
    protected $tags   =  array(
      // 定义标签 根据分类调取该分类下的所有文章数据
     'artliss'   =>  array('attr'=>'catid,name,id,offset,length,key,mod,orders','level'=>3,'alias'=>'iterate'),

     // 调取轮播图的自定义标签定义
     'cross'=>array('attr'=>'name,id,offset,length,key,mod,orders','level'=>3,'alias'=>'iterate'),

     // 调取滚动消息的自定义标签定义
     'rolll'=>array('attr'=>'name,id,offset,length,key,mod,orders','level'=>3,'alias'=>'iterate'),


     );



    // 调取滚动消息数据
    public function _rolll($tag,$content){
        $orde  =    isset($tag['orders'])?$tag['orders']:'';//用于字段排序
        $name  =    $tag['name'];//这里很重要,前台传递过来的接收查询结果的变量

        $id    =    $tag['id'];
        $empty =    isset($tag['empty'])?$tag['empty']:'';
        $key   =    !empty($tag['key'])?$tag['key']:'i';
        $mod   =    isset($tag['mod'])?$tag['mod']:'2';
        // 允许使用函数设定数据集 <volist name=":fun('arg')" id="vo">{$vo.name}</volist>
        $parseStr   =  '<?php ';

        // 这里做个判断,判断用户是否设置了排序
        if(!empty($orde)){
            $parseStr .='$'.$name.'=D("Roll")->order("'.$orde.'")->select();';
        }else{
            $parseStr .='$'.$name.'=D("Roll")->select();';
        }

        // 下面的代码都是volist的代码
        if(0===strpos($name,':')) {
            $parseStr   .= '$_result='.substr($name,1).';';
            $name   = '$_result';
        }else{
            $name   = $this->autoBuildVar($name);
        }
        $parseStr  .=  'if(is_array('.$name.')): $'.$key.' = 0;';
        if(isset($tag['length']) && '' !=$tag['length'] ) {
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].','.$tag['length'].',true);';
        }elseif(isset($tag['offset'])  && '' !=$tag['offset']){
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].',null,true);';
        }else{
            $parseStr .= ' $__LIST__ = '.$name.';';
        }
        $parseStr .= 'if( count($__LIST__)==0 ) : echo "'.$empty.'" ;';
        $parseStr .= 'else: ';
        $parseStr .= 'foreach($__LIST__ as $key=>$'.$id.'): ';
        $parseStr .= '$mod = ($'.$key.' % '.$mod.' );';
        $parseStr .= '++$'.$key.';?>';
        $parseStr .= $this->tpl->parse($content);
        $parseStr .= '<?php endforeach; endif; else: echo "'.$empty.'" ;endif; ?>';

        if(!empty($parseStr)) {
            // 这里调试可以返回var_dump()的数据
            return $parseStr;
        }
        return ;  
    }

    // 调取所有轮播图数据
    public function _cross($tag,$content){
        $orde  =    isset($tag['orders'])?$tag['orders']:'';//用于字段排序
        $name  =    $tag['name'];//这里很重要,前台传递过来的接收查询结果的变量

        $id    =    $tag['id'];
        $empty =    isset($tag['empty'])?$tag['empty']:'';
        $key   =    !empty($tag['key'])?$tag['key']:'i';
        $mod   =    isset($tag['mod'])?$tag['mod']:'2';
        // 允许使用函数设定数据集 <volist name=":fun('arg')" id="vo">{$vo.name}</volist>
        $parseStr   =  '<?php ';

        // 这里做个判断,判断用户是否设置了排序
        if(!empty($orde)){
            $parseStr .='$'.$name.'=D("Caross")->order("'.$orde.'")->select();';
        }else{
            $parseStr .='$'.$name.'=D("Caross")->select();';
        }

        // 下面的代码都是volist的代码
        if(0===strpos($name,':')) {
            $parseStr   .= '$_result='.substr($name,1).';';
            $name   = '$_result';
        }else{
            $name   = $this->autoBuildVar($name);
        }
        $parseStr  .=  'if(is_array('.$name.')): $'.$key.' = 0;';
        if(isset($tag['length']) && '' !=$tag['length'] ) {
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].','.$tag['length'].',true);';
        }elseif(isset($tag['offset'])  && '' !=$tag['offset']){
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].',null,true);';
        }else{
            $parseStr .= ' $__LIST__ = '.$name.';';
        }
        $parseStr .= 'if( count($__LIST__)==0 ) : echo "'.$empty.'" ;';
        $parseStr .= 'else: ';
        $parseStr .= 'foreach($__LIST__ as $key=>$'.$id.'): ';
        $parseStr .= '$mod = ($'.$key.' % '.$mod.' );';
        $parseStr .= '++$'.$key.';?>';
        $parseStr .= $this->tpl->parse($content);
        $parseStr .= '<?php endforeach; endif; else: echo "'.$empty.'" ;endif; ?>';

        if(!empty($parseStr)) {
            // 这里调试可以返回var_dump()的数据
            return $parseStr;
        }
        return ;  
    }




    // 根据分类调取该分类下的所有文章数据
    public function _artliss($tag,$content){
        $ids=intval($tag['catid']);//接收分类的id
        $orde  =    isset($tag['orders'])?$tag['orders']:'';//用于字段排序
        $name  =    $tag['name'];//这里很重要,前台传递过来的接收查询结果的变量

        $id    =    $tag['id'];
        $empty =    isset($tag['empty'])?$tag['empty']:'';
        $key   =    !empty($tag['key'])?$tag['key']:'i';
        $mod   =    isset($tag['mod'])?$tag['mod']:'2';
        // 允许使用函数设定数据集 <volist name=":fun('arg')" id="vo">{$vo.name}</volist>
        $parseStr   =  '<?php ';

        // 这里做个判断,判断用户是否设置了排序
        if(!empty($orde)){
            $parseStr .='$where["catid"] ="'.$ids.'";$'.$name.'=D("ArtsView")->where($where)->order("'.$orde.'")->select();';
        }else{
            $parseStr .='$where["catid"] ="'.$ids.'";$'.$name.'=D("ArtsView")->where($where)->select();';
        }

        // 下面的代码都是volist的代码
        if(0===strpos($name,':')) {
            $parseStr   .= '$_result='.substr($name,1).';';
            $name   = '$_result';
        }else{
            $name   = $this->autoBuildVar($name);
        }
        $parseStr  .=  'if(is_array('.$name.')): $'.$key.' = 0;';
        if(isset($tag['length']) && '' !=$tag['length'] ) {
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].','.$tag['length'].',true);';
        }elseif(isset($tag['offset'])  && '' !=$tag['offset']){
            $parseStr  .= ' $__LIST__ = array_slice('.$name.','.$tag['offset'].',null,true);';
        }else{
            $parseStr .= ' $__LIST__ = '.$name.';';
        }
        $parseStr .= 'if( count($__LIST__)==0 ) : echo "'.$empty.'" ;';
        $parseStr .= 'else: ';
        $parseStr .= 'foreach($__LIST__ as $key=>$'.$id.'): ';
        $parseStr .= '$mod = ($'.$key.' % '.$mod.' );';
        $parseStr .= '++$'.$key.';?>';
        $parseStr .= $this->tpl->parse($content);
        $parseStr .= '<?php endforeach; endif; else: echo "'.$empty.'" ;endif; ?>';

        if(!empty($parseStr)) {
            // 这里调试可以返回var_dump()的数据
            return $parseStr;
        }
        return ;
    }

    
}