<?php
namespace Admin\Controller;
use Think\Controller;
class MesgsController extends CommonController {
    public function index(){
        $configs=D('Configs');
        $ress=$configs->find();
        $this->assign('statu',$ress);

        $this->display();
    }


    // 文章数据展示
    public function lists(){
        $msg=D('Msg');

        $page=$_GET['page']?$_GET['page']:1;
        $limit=$_GET['limit']?$_GET['limit']:20;
        $dass=$msg->order('mestim desc')->page($page,$limit)->select();
        $count=$msg->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }


    public function delete(){
        $arts=D('Msg');
        $id=trim(I('id'));

        if($id==0){
            return false;
        }else{

            $res=$arts->delete($id);
            if($res){
                $this->success("删除成功",U('index'));
            }else{
                $this->error("删除失败",U('index'));
            }
        }
    }

    public function deleteRow(){
        $videodata=D('Msg');
        header("Content-Type: text/html; charset=UTF-8");
        if(IS_POST){
            $ids=htmlspecialchars_decode(I('id'));
            $ids=json_decode($ids,true);
            if(!empty($ids)){
                for($i=0;$i<count($ids);$i++){
                    $res=$videodata->delete($ids[$i]);
                }
                echo json_encode(array('success'=>'删除成功'));
            }
        }else{
            return;
        }
    }


    // 开启留言邮件提醒
    public function switcEmail(){
        $configs=D('Configs');
        $ress=$configs->select();
        if($ress){
            $data['swiemai']=I('statu');
            $data['id']=$ress[0]['id'];
            if($data['swiemai']=='contru'){
                if($configs->save($data)){
                    $this->success("开启成功,收到留言会发送到您配置的收件人邮箱内!");
                }else{
                    $this->error("开启失败了");
                }
            }else{
                $data['swiemai']="";
                if($configs->save($data)){
                    $this->success("关闭成功!您的收件人邮箱将不再收到用户的留言!");
                }else{
                    $this->error("开启失败");
                }
            }
        }else{
            $this->error("请先配置邮箱接口再开启通知!",U('Admin/Emais/index'));
        }
    }
}