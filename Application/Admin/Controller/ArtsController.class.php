<?php
namespace Admin\Controller;
use Think\Controller;
class ArtsController extends CommonController {
    public function index(){
 
    
        // 查询所有列表页类型的分类数据
        $cate=D('Cateart');
        $cates=$cate->where(array('typs'=>2))->select();
        $this->assign('cates',$cates);
        $this->display();
    }

// 一、这里有一个layui图片上传的问题，图片和其他字段信息不能同时上传。因为图片上传是异步的。所以这里还需要给图片上传专门备一个接口
// 二、图片上传到另一个接口的时候，将图片的保存路径返回给前台，设置到隐藏字段里。和其他字段一起提交。
// 三、可以直接通过add接口获取图片的保存路径和其他字段的信息进行数据验证，然后上传到数据库。
// 采集标识和多图上传。上传成功后，能够在前台显示小图
    // 这里有一个问题，因为是异步的，如果上传图片后，用户不提交表单，那怎么判断删除它呢。那这个图片会一直存在下载目录里。
    // 将图片上传到数据库之后，将突破保存到新的文件夹upload内。把原来文件夹uploads的所有图片都删除掉

    public function add(){
        $cate=D('Cateart');
        $cates=$cate->where(array('typs'=>2))->select();
        $this->assign('cates',$cates);


        $arts=D('Arts');
        // 其他信息类获取
        if(IS_AJAX){
          if($arts->create()){
            $arts->timess=time();
            if($arts->add()){
               cookie('filan',null);
               $this->success("添加成功",U('index'));
            }else{
               $this->error("添加失败,请稍后再添加");
            }
          }
          return;
        }
        $this->display();
    }


// 先把图片提交到临时目录，提交到服务器后，用正则提取图片路径，和上传过的图片比较，如果用到就把图片移动到实际目录。
// 将每次上传的图片的路径保存在cookies中,下一次提交的时候，就先将cookie中保存的图片路径，也就是上一次提交的图片删除掉，然后将刚上传的图片路径保存到cookie中。
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
            if(!empty(cookie('filan'))){
                unlink("./".cookie('filan'));
            }
            cookie('filan',$filename,7200);
            
            // $image = new \Think\Image(); 
            // $image->open('./'.$filename);
            // // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
            // $image->thumb(180,236,\Think\Image::IMAGE_THUMB_FIXED)->save('./'.$filename);

            $res['msg']="上传成功";
            $res['data']['src']=$filename;

            echo json_encode($res);
        }
    }


    // 文章数据展示
    public function lists(){
        $arts=D('ArtsView');

        $page=$_GET['page']?$_GET['page']:1;
        $limit=$_GET['limit']?$_GET['limit']:20;
        $lartit=$_GET['lartit'] ? urldecode($_GET['lartit']):"";
        $catid=$_GET['catid'] ? urldecode($_GET['catid']):"";
        $updas=$_GET['updas'] ? urldecode($_GET['updas']):"";
        // 如果没有获取到toke的话，就说明正常数据显示，如果获取到toke，那就是用户在搜索,只获取查询到数据的总数

        // 按照标题的搜索，模糊查询所有负荷需要的文章
        if($lartit!=""){
            // 用户在表单搜索回复规则
            $where['lart']=array('like','%'.$lartit.'%');
            $count=$arts->where($where)->count();

            if($count>0){
                $dass=$arts->where($where)->page($page,$limit)->select();
            }else{
                $dass="";
            }

            // 检索某某分类下的所有文章
        }else if($catid != ""){
            $dass=$arts->where(array('catid'=>$catid))->page($page,$limit)->select();
            $count=$arts->where(array('catid'=>$catid))->count();

            // 按照更新时间排序
        }else if($updas != ""){

            $dass=$arts->order('updas desc')->page($page,$limit)->select();
            $count=$arts->count();

            // 按照最新发表的时间来排序
        }else{
            $dass=$arts->order('id desc')->page($page,$limit)->select();
            $count=$arts->count();
        }
        $data=array('code'=>0,'msg'=>'','count'=>$count,'data'=>$dass);
        echo json_encode($data);
    }




    public function edit(){
        $cateart=D('cateart');
        $catarts=$cateart->where(array('typs'=>2))->select();
        $this->assign('catarts',$catarts);
        

        $arts=D('Arts');
        $id=trim(I('id'));
        $res=$arts->where(array('id'=>$id))->find();
        $this->assign('dasss',$res);

// 如何这里修改了原来的图片，必须将原来的图片删除掉
        if(IS_AJAX){
          if($arts->create()){
            $arts->updas=time();
            if($arts->artimg!=$res['artimg']){
                unlink("./".$res['artimg']);
            }
            if($arts->save()){
               cookie('filan',null);
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
        $arts=D('Arts');
        $id=trim(I('id'));

        if($id==0){
            return false;
        }else{
            $result=$arts->where(array('id'=>$id))->find();
            unlink("./".$result['artimg']);
            $res=$arts->delete($id);
            if($res){
                $this->success("删除成功",U('index'));
            }else{
                $this->error("删除失败",U('index'));
            }
        }


    }


    public function deleteRow(){
        $videodata=D('Arts');
        header("Content-Type: text/html; charset=UTF-8");
        if(IS_POST){
            $ids=htmlspecialchars_decode(I('id'));
            $ids=json_decode($ids,true);
            if(!empty($ids)){
                for($i=0;$i<count($ids);$i++){
                    $result=$videodata->where(array('id'=>$ids[$i]))->find();
                    unlink("./".$result['artimg']);
                    $res=$videodata->delete($ids[$i]);
                }
                echo json_encode(array('success'=>'删除成功'));
            }
        }else{
            return;
        }
    }
}