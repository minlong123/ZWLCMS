<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>专家顾问</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge" >
	<link rel="stylesheet" type="text/css" href="http://localhost:85/Application/Home/public/css/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:85/Application/Home/public/css/export.css">
</head>
<body>

		<!-- 导航内容开始 -->
	<div id="header">
		<div class="navigator">
			
			<div class="navigator_logo"><img src="http://localhost:85/Application/Home/public/images/cehuaren.jpg" height="80"></div>
			
			<div class="navigator_nav">
				<ul class="navigator_nav_ul">


					<?php foreach($res as $k=>$v){ ?>
					<li>
						<a <?php if(!empty($v['child'])): ?>href="javascript:void(0)"<?php else: ?>href="/index.php/Home/<?php echo ($v["uls"]); ?>/id/<?php echo ($v["id"]); ?>"<?php endif; ?> ><?php echo ($v["catena"]); ?></a>
						<ol class="hover_li">

							<?php foreach($v['child'] as $a){ ?>
							<li><a href="/index.php/Home/<?php echo ($a["uls"]); ?>/id/<?php echo ($a["id"]); ?>"><?php echo ($a["catena"]); ?></a></li>
							<?php }?>

						</ol>
					</li>
					<?php }?>

<!-- 					<li class="select_black"><a href="#">首页</a></li>
					<li>
						<a href="#">企业营销</a>
						<ol class="hover_li">
							<li><a href="">网站开发</a></li>
							<li><a href="">小程序建设</a></li>
							<li><a href="">电商运营</a></li>
						</ol>
					</li>
					<li>
						<a href="#">策划服务</a>
						<ol class="hover_li">
							<li><a href="">品牌营销策划</a></li>
							<li><a href="">营销全案策划</a></li>
							<li><a href="">营销推广策划</a></li>
							<li><a href="">会务活动策划</a></li>
						</ol>
					</li>
					<li><a href="#">专家顾问</a></li>
					<li>
						<a href="#">新闻动态</a>
						<ol class="hover_li">
							<li><a href="">行业动态</a></li>
							<li><a href="">公司动态</a></li>
						</ol>
					</li>
					<li>
						<a href="#">客户案例</a>
						<ol class="hover_li">
							<li><a href="">营销策划案例</a></li>
							<li><a href="">网站建设案例</a></li>
							<li><a href="">小程序开发案例</a></li>
							<li><a href="">电商运营案例</a></li>
						</ol>
					</li>
					<li class="last_child"><a href="#">关于世阳</a></li>
 -->

				</ul>
			</div>
		</div>
	</div>
	<!-- 导航栏内容结束 -->


	<script type="text/javascript" src="http://localhost:85/Application/Home/public/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript">
       $(function(){
         $('.navigator_nav_ul').children(":first").addClass('select_black');
         $('.navigator_nav_ul').children(":last").addClass('last_child');
 
       })
	</script>

	<!-- 专家顾问banner图内容开始 -->
	<div id="banner11">
		<div class="banner11_img"></div>
	</div>
	<!-- 专家顾问banner图内容结束 -->

	<!-- 专家顾问主体内容开始 -->
	<div id="export_by">
		<div class="export_by_con">

			<div class="export_by_top">
				<img src="http://localhost:85/Application/Home/public/images/case_line.jpg"/>
				专家<span>顾问</span>
				<img src="http://localhost:85/Application/Home/public/images/case_line.jpg"/>
			</div>

			<div class="export_by_middle">EXPERT ADVISOR</div>

			<div class="export_by_bottom">




				<?php if(is_array($ress)): $i = 0; $__LIST__ = $ress;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="export_by_bottom1">
					<div class="export_by_bottom2"><a href="/index.php/Home/<?php echo ($vo["arttem"]); ?>/catid/<?php echo ($vo["id"]); ?>"><img src="/<?php echo ($vo["artimg"]); ?>" width="162" height="216"></a></div>

					<div class="export_by_bottom3">
						<div class="export_by_bottom4"><?php echo (msubstr($vo["lart"],0,7,'utf8')); ?></div>
						<div class="export_by_bottom5"><?php echo (msubstr($vo["lart"],0,10,'utf8')); ?></div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php echo ($fenye); ?>
			</div>
		</div>
	</div>
	<!-- 专家顾问主体内容结束-->
	<div class="clearfix"></div>

<!-- 底部图片引入内容开始 -->
	<div id="banner1">
		<div class="banner1_img"></div>
	</div>
	<!-- 底部图片引入内容结束 -->

	<!-- 底部信息栏内容设置开始 -->
	<div id="footer">
		<div class="footer_content">
			<div class="footer_content_top">
				<div class="footer_top_left">

					<div class="footer_left_one">
						<ul class="footer_left_ul">
							<li>宜昌老板商务信息咨询服务有限公司
</li>
							<li>0717-6348888</li>
							<li>13871378888  1354537686</li>
							<li>duchaoping@ssdfsx.com</li>
							<li>湖北宜昌市西陵区西陵发展大道111号</li>
						</ul>
					</div>

					<div class="footer_left_two">
						<ul class="footer_left_ul">
							<li>About Us</li>
							<li><a href="">服务项目</a></li>
							<li><a href="">关于我们</a></li>
							<li><a href="">公司动态</a></li>
							<li><a href="">行业资讯</a></li>
							<li><a href="">专家顾问</a></li>
						</ul>
					</div>
				</div>

				<div class="footer_top_right">

					<div class="footer_right_one">
						<ul class="footer_left_ul">
							<li>Service</li>
							<li><a href="">品牌营销咨询</a></li>
							<li><a href="">营销推广策略</a></li>
							<li><a href="">会务活动策划</a></li>
							<li><a href="">营销全案策划</a></li>
						</ul>

					</div>


					<div class="footer_right_two">
						<div class="footer_right_top">关于我们</div>
						<div class="footer_right_bottom">
							<span><img src="http://localhost:85/Application/Home/public/images/footer1.jpg" height="97" width="114"></span>
							<span><img src="http://localhost:85/Application/Home/public/images/footer2.jpg" height="97" width="114"></span>
						</div>
					</div>


				</div>
			</div>

			<div class="footer_content_bottom">
				<div>宜昌老板商务信息咨询服务有限公司 服务电话：0717-6340809 版权所有 © 2008-2018 Inc.</div>
				<div>鄂ICP备17016655号-3</div>
			</div>
		</div>
	</div>

	<!-- 底部信息栏内容设置结束 -->

</body>
</html>