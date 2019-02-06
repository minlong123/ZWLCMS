<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends CommonController{


    // 修改数据用弹出层,请求的依然是当前方法，使用ajax方式传输数据
    public function index(){
      $cat=D('Cateart');
      $res=$cat->order('sors asc')->select();
      $res=trees($res);

      $result=redafil();
      $this->assign('files',$result);

      $artlist=redaart();
      $this->assign('artfiles',$artlist);

      $this->assign('res',$res);

      if(IS_AJAX){
        if($cat->create()){
          if($cat->save()){
             $this->success("修改成功",U('index'));
          }else{
             $this->error("修改失败,请修改一项再提交~");
          }
        }
        return;
      }
      $this->display();
        
    }





// 在添加分类的时候，需要查询前台view文件夹下的所有文件。遍历进一个数组，传输给前台模版
    public function add(){
      $cat=D('Cateart');
      $res=$cat->order('sors asc')->select();
      $res=trees($res);

      $result=redafil();
      $this->assign('files',$result);

      $artlist=redaart();
      $this->assign('artfiles',$artlist);

      $this->assign('res',$res);

      if(IS_AJAX){
        if($cat->create()){
          if($cat->add()){
             $this->success("添加成功",U('index'));
          }else{
             $this->error("添加失败,请稍后再添加");
          }
        }
        return;
      }
      $this->display();
        
    }

    // 分类数据展示
    public function lists(){
        $cat=D('Cateart');
        $dass=$cat->order('sors asc')->select();
        $dass=trees($dass);
        $count=$cat->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }




    // 删除分类数据,删除的问题如果删除父类，或者中间一个分类的时候，将要删除的这个分类的pid给他的下一级pid，
    public function delete(){
        $cat=D('Cateart');
        $id=trim(I('id'));
        if($id==0){
            return false;
        }else{
            $ress=$cat->where(array('id'=>$id))->find();//当前要删除的该分类信息
            $result=$cat->where(array('pid'=>$id))->select();//要删除的分类下的下级分类数据
            // 有下一级，循环将要删除的分类的pid更新给下一级的pid
            if(!empty($result)){
              foreach($result as $k=>$v){
                $data['id']=$v['id'];
                $data['pid']=$ress['pid'];
                $cat->save($data);
              }
              $res=$cat->delete($id);
              if($res){
                  $this->success("删除成功",U('index'));
              }else{
                  $this->error("删除失败",U('index'));
              }

            // 没有下一级
            }else{
              $res=$cat->delete($id);
              if($res){
                  $this->success("删除成功",U('index'));
              }else{
                  $this->error("删除失败",U('index'));
              }
            }
        }
    }


    // 分类数据可编辑表格接口
    public function editCell(){
      $cat=D('Cateart');
      $fields=I('fields');
      if(IS_AJAX){
        if($cat->create()){
          $fields=I('fields');
          $data['id']=I('id');
          $data[$fields]=intval(I('val'));
          if($cat->save($data)){
             $this->success("修改成功",U('index'));
          }else{
             $this->error("修改失败,请修改一项再提交~");
          }
        }
        return;
      }




    } 

}