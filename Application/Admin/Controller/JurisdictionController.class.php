<?php
namespace Admin\Controller;
use Think\Controller;
class JurisdictionController extends CommonController {
    public function index(){
      $auto=D('Auth_group');
      $resu=$auto->select();
      $this->assign('resu',$resu);
      $admins=D('Admins');


      if(IS_AJAX){
        if($admins->create($_AJAX,1)){
          $admins->adminpwd=md5('123456');
          if($admins->add()){
             $this->success("创建管理员身份成功",U('index'));
          }else{
             $this->error("创建失败,请稍后再尝试~");
          }
        }else{
            $this->error($admins->getError());
        }
        return;
      }
      $this->display();
    }

    public function lists(){
        $cat=D('AdminsView');
        $dass=$cat->order('lastmap desc')->select();
        $count=$cat->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }


    public function delete(){
        $arts=D('Admins');
        $auth=D('Auth_group_access');
        $id=trim(I('id'));

        if($id==0){
            return false;
        }else{

            $result=$auth->where(array('uid'=>$id))->find();

            if($result){
                $auth->where(array('uid'=>$id))->delete();
            }

            $res=$arts->delete($id);
            if($res){
                $this->success("删除成功",U('index'));
            }else{
                $this->error("删除失败",U('index'));
            }
        }
    }


    // 划分用户组权限
    public function divide(){
        $arts=D('Auth_group_access');
        if(IS_AJAX){
            $data['uid']=I('id');
            $data['group_id']=html_entity_decode(I("aut"));
            $data['group_id']=json_decode($data['group_id']);
            $data['group_id']=implode(',',$data['group_id']);


            $data['group_tit']=html_entity_decode(I("stt"));
            $data['group_tit']=json_decode($data['group_tit']);
            $data['group_tit']=implode(',',$data['group_tit']);

            if(empty($data['group_id'])){
                $data['group_id']=0;
            }
            $ress=$arts->where(array('uid'=>$data['uid']))->find();

            if($ress){
                $res=$arts->where(array('uid'=>$data['uid']))->save($data);
                // $res=$arts->execute("update rr_auth_group_access set group_id='".$data['group_id']."',group_tit='".$data['group_tit']."' where uid=".$data['uid']);

                if($res){
                    $this->success("划分用户组成功");
                }else{
                    $this->error("划分用户组失败,请划分新组在提交!");
                }

            }else{
                $res=$arts->add($data);
                if($res){
                    $this->success("划分用户组成功");
                }else{
                    $this->error("划分用户组失败,请划分新组在提交!");
                }

            }
            return;
        }
    }











    // 用户组增删改查
    public function groups(){
      // 查询所有权限
      $Aut=D('Auth_rule');
      $res=$Aut->select();
      $res=ar($res);
      $this->assign('aut',$res);

      $admins=D('Auth_group');
      if(IS_AJAX){
        if($admins->create()){


          if($admins->add()){
             $this->success("创建用户组成功",U('groups'));
          }else{
             $this->error("创建失败,请稍后再尝试~");
          }


        }else{
            $this->error($admins->getError());
        }
        return;
      }
      $this->display();
    }



    // 用户组数据
    public function listss(){
        $cat=D('Auth_group');
        $dass=$cat->select();
        $count=$cat->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }


    public function deletes(){
        $arts=D('Auth_group');
        $auto=D('Auth_group_access');
        $id=trim(I('id'));

        if($id==0){
            return false;
        }else{
            $auto->where(array('group_id'=>$id))->delete();
            $res=$arts->delete($id);

            if($res){
                $this->success("删除成功",U('index'));
            }else{
                $this->error("删除失败",U('index'));
            }
        }
    }


    // 为用户组分配权限
    public function AssignAuthority(){
        $arts=D('Auth_group');
        if(IS_AJAX){
            $data['id']=I('id');
            $data['rules']=html_entity_decode(I("aut"));
            $data['rules']=json_decode($data['rules']);
            $data['rules']=implode(',',$data['rules']);
            $res=$arts->save($data);
            if($res){
                $this->success("分配权限成功");
            }else{
                $this->error("分配权限失败,请修改后再进行分配");
            }
            return;
        }
    }




}