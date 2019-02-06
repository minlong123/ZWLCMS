<?php
namespace Admin\Controller;
use Think\Controller;
class RollController extends CommonController {
    public function index(){
        $this->display();
    }


    public function add(){
        $roll=D('Roll');
        if(IS_AJAX){
          if($roll->create()){
            $roll->rotim=time();
            if($roll->add()){
               $this->success("添加成功",U('index'));
            }else{
               $this->error("添加失败,请稍后再添加");
            }
          }
          return;
        }
        $this->display();
    }


    // 轮播图数据展示
    public function lists(){
        $videodata=D('Roll');
        $page=$_GET['page']?$_GET['page']:1;
        $limit=$_GET['limit']?$_GET['limit']:20;
        $dass=$videodata->order('rosor asc')->page($page,$limit)->select();
        $count=$videodata->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }


    public function deleteRow(){
        $caross=D('Roll');
        header("Content-Type: text/html; charset=UTF-8");
        if(IS_POST){
            $ids=htmlspecialchars_decode(I('id'));
            $ids=json_decode($ids,true);
            if(!empty($ids)){
                for($i=0;$i<count($ids);$i++){
                    $res=$caross->delete($ids[$i]);
                }
                echo json_encode(array('success'=>'删除成功'));
            }
        }else{
            return;
        }
    }
}