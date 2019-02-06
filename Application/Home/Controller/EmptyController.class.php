<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
/**
*单页全部加前缀index_
*列表页全部加前缀list_
*详情页全部加前缀artic_
*一个空控制器+空操作方法，将这些url+自身分类的id访问的时候，会自动定位到本控制器
*构造函数会将所有页面公共的数据查询出来

*空操作方法，会接收get过来的id值，然后通过连贯的查询方法进行并表(分类表和文章表)数据查询
*/
	public function __construct(){
    	parent::__construct();
        // 进行动态配置
        $config =   M('Configs')->find();
        C($config);
    	// 输出导航数据
		$categ=D('Cateart');
		$res=$categ->order('sors asc')->select();
		$res=ar($res);
		$this->assign('res',$res);
    }

/**
*所有单页、列表页、文章页都会通过该空操作方法进行渲染
*每个页面都会带上一个id,接收这个id，然后向数据库进行分类表和文章表并表查询
*查询出来后,如果是列表页，则渲染数据，如果是单页则不用
*然后是从列表页进入文章详情页的时候，还会传递一个cateid数据过来用于查询具体的文章数据


*其他情况：
*一：首页需要展示很多数据的情况下,单独定义一个index控制器来显示内容,
1.可以通过ajax方式来解决这个问题
2.在构造函数内定义一些有限的公共数据,用于各个页面的灵活使用，比如十五条数据的列表数据。等等。
3.设置钩子在模板文件当中，当该模板文件渲染的时候就会触发，则查询数据遍历到前台模板页面中
*二：文章页需要展示与其主要内容无关的列表数据的时候，需要怎么做
*三：前台分页问题解决


*现在重点要解决的问题便是首页和文章详情页要渲染的数据是不相关的。可以通过自定义标签库来解决。2019年1月4日该问题已解决


*接下来要解决列表页的分页问题和详情页问题
*列表页数据暂时不通过自定义标签来实现，这里有一个数据分页的问题。首页和文章详情页及单页的数据可以通过自定义标签实现。

*模版文件名首字母全部需要大写
*模版内跳转的url太长，设法优化下

*每个页面的关键字、描述、标题必须是动态的。用自定义标签实现
*
*分页已经封转。后面直接调用即可fenye();方法即可，放在全局函数里。

*/
    public function _empty($name){
    	$id=I('id');//接收到的是分类id
    	$cateid=intval(I('catid')); //如果接收到了这个文章表id值，说明过来的url是文章详情页,
		$art = D("ArtsView");//用于分类表和文章表并表查询使用
		$arto=D('Arts');//用于专门查询单条文章的实例化模型
		
		// 每个列表页的数据,这里还需要做数据分页
		// 分页数据
		$curpage=I('get.pa',1);
	    $pagenum=2;
	    $count=$art->where(array('catid'=>$id))->count();
	    $pagess=ceil(intval($count)/$pagenum);
		$ress=$art->where(array('catid'=>$id))->page($curpage,$pagenum)->select();
		// 优化各个列表页的分页跳转url,模版页面的分页代码可复用各个列表页面
		$urls=__MODULE__.'/'.CONTROLLER_NAME.'/'.ACTION_NAME.'/id/'.$id;
		// 接收封装的分页html代码
		$fenye=fenye($curpage,$pagenum,$pagess,$urls);
		if(!empty($ress)){
			$this->assign('ress',$ress);
		    $this->assign('fenye',$fenye);
		}



		// 打开文章页的时候查询单条文章数据，和分类表并表查询
		if(!empty($cateid)){
			// 原生的sql语句查询出来是二维数组
			$sql="select * from rr_arts left join rr_cateart on 
rr_arts.catid=rr_cateart.id where rr_arts.id=".$cateid;
			$result=$arto->query($sql);
			$this->assign('result',$result[0]);
		}else{

		}
        $this->display($name);
    }


// 前台留言接口，严谨点需要验证内容长度及内内容是否负荷要求，比如电话正则等
//同时用户在前台提交可能用ajax方式，可能用post或者get方法，要为每一种方式设置接收方式。
// 能访问到这个接口的可以任何一个控制器加mess方法。
    public function mess(){
    	$mes=D('Msg');
    	if(IS_POST){
    		if($mes->create()){
                if(C('swiemai')){
                    $messname=$mes->messname;
                    $mescon=$mes->mescon;
                    $mestel=$mes->mestel;
                    $tits="有新留言来了";
                    $conn=Date('Y-m-d H:i',time())."分有".$messname."留言了,留言电话为：".$mestel.",留言内容为：".$mescon.",请尽快处理";
                    sendMail($tits,$conn);
                }

    			$mes->mestim=time();
    			$mes->mesip=get_client_ip();
    			if($mes->add()){
    				$this->success("留言成功");
    			}else{
    				$mes->error("留言失败");
    			}
    		}
    		return;
    	}

    	if(IS_AJAX){
    		if($mes->create()){
    			$mes->mestim=time();
    			$mes->mesip=get_client_ip();
    			if($mes->add()){
    				$data['info']="success";
    				$this->ajaxReturn($data);
    			}else{
    				$data['info']="error";
    				$this->ajaxReturn($data);
    			}
    		}
    		return;
    	}
    }


/**
*模糊搜索文章标题接口，根据搜索的文章标题，进行模糊匹配所有相关的文章
*如果未搜索内容，直接请求的话，会将所有数据显示到前台页面
*想好怎么返回查询好的内容，是按分页还是一次性。
*接收哪种请求过来的检索需要，可以都检索，还是检索get过来的，还是post过来的数据
*这个方法对应的是一个页面，也就是一个搜索页面。所以必须前提必须新建一个搜索结果页，这个搜索结果页的文件名必须是Index_searart.html.这个根据对方是怎么请求过来的来判断

*/
    public function searart(){
        $art = D("ArtsView");
        $tit=trim(I('tit'));
        $whe['lart']=array('like','%'.$tit.'%');
        $result=$art->where($whe)->select();
        // 如果是get请求,可以跳转到自定义的结果页显示搜索结果
        if(IS_GET){
            $this->assign('artres',$result);
            $this->display();
        }
        // 如果是其他请求，可以通过ajax方式将数据以json的形式返回给前台
        else{
            echo json_encode($result);
        }

       
    }
}