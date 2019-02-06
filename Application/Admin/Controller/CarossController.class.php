<?php
namespace Admin\Controller;
use Think\Controller;
class CarossController extends CommonController {
    public function index(){
        $this->display();
    }


    public function add(){
        $caross=D('Caross');
        if(IS_AJAX){
          if($caross->create()){
            if($caross->add()){
               cookie('filans',null);
               $this->success("添加成功",U('index'));
            }else{
               $this->error("添加失败,请稍后再添加");
            }
          }
          return;
        }
        $this->display();
    }




    // 大图片和小图片先上传的,所以需要保存两张图片的存储路径带上文件名，发送给前台,在前台设置两个隐藏域字段。将value的值都设置为图片在服务器的保存路径
    // 如果对方没有提交表单，那保存在服务器目录下的指定图片需要删除。跟随上传图片的接口一起上传图片
    public function uploads(){
        $res=array(
            'code'=>'',
            'msg'=>'error',
            'data'=>array(
                'src'=>'http://www.hao124.com'
            )
        );
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     'Public/Uploads/'; // 设置附件上传（子）目录
        $upload->autoSub = false;//不新建日期子目录保存图片
        $upload->saveName = 'time';//使用时间戳命名
        // 图片上传
        $info   =   $upload->upload();
        if(!$info) {
            $res['msg']="上传失败";
            echo json_encode($res);
            return;
        }else{
            $filename=$info['file']['savepath'].$info['file']['savename'];
            if(!empty(cookie('filans'))){
                unlink("./".cookie('filans'));
            }
            cookie('filans',$filename,7200);

            $res['msg']="上传成功";
            $res['data']['src']=$filename;
            echo json_encode($res);
        }
    }


    // 轮播图数据展示
    public function lists(){
        $videodata=D('Caross');
        $page=$_GET['page']?$_GET['page']:1;
        $limit=$_GET['limit']?$_GET['limit']:20;
        $dass=$videodata->order('sorts asc')->page($page,$limit)->select();
        $count=$videodata->count();
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }




    public function edit(){
        $caross=D('Caross');
        $id=trim(I('id'));
        $res=$caross->where(array('id'=>$id))->find();
        $this->assign('dasss',$res);

        if(IS_AJAX){
          if($caross->create()){
            if($caross->imgaddr!=$res['imgaddr']){
                unlink("./".$res['imgaddr']);
            }
            if($caross->save()){
               cookie('filans',null);
               $this->success("修改成功",U('index'));
            }else{
               $this->error("修改失败,请修改一项再提交");
            }
          }
          return;
        }




        $this->display();
    }




    public function delete(){
        $caross=D('Caross');
        $id=trim(I('id'));
        if($id==0){
            return false;
        }else{
            $result=$caross->where(array('id'=>$id))->find();
            unlink("./".$result['imgaddr']);
            $res=$caross->delete($id);
            if($res){
                $this->success("删除成功",U('index'));
            }else{
                $this->error("删除失败",U('index'));
            }
        }


    }


    public function deleteRow(){
        $caross=D('Caross');
        header("Content-Type: text/html; charset=UTF-8");
        if(IS_POST){
            $ids=htmlspecialchars_decode(I('id'));
            $ids=json_decode($ids,true);
            if(!empty($ids)){
                for($i=0;$i<count($ids);$i++){
                    $result=$caross->where(array('id'=>$ids[$i]))->find();
                    unlink("./".$result['imgaddr']);
                    $res=$caross->delete($ids[$i]);
                }
                echo json_encode(array('success'=>'删除成功'));
            }
        }else{
            return;
        }
    }
}