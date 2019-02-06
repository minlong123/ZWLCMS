<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>品牌营销策划</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge" >
	<link rel="stylesheet" type="text/css" href="http://localhost:85/Application/Home/public/css/reset.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:85/Application/Home/public/css/brand.css">
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

	<!-- 品牌营销策划banner图内容开始 -->
	<div id="banner6">
		<div class="banner6_img"></div>
	</div>
	<!-- 品牌营销策划banner图内容结束 -->

	<!-- 品牌营销策划第一栏内容开始 -->
	<div id="brand_column">
		<div class="brand_column_content">
			<div class="brand_column_content1">品牌<span>战略</span></div>
			<div class="brand_column_content2">让品牌成为消费者第一选择</div>
			<div class="brand_column_content3">直指竞争本质，构建第一认知</div>
			<div class="brand_column_content4">直抵消费者心理，能记忆搜索，新品牌变成老朋友</div>

			<div class="brand_column_content5">

				<div class="brand_column_left brand_column_content7">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_one1.jpg" height="225" width="447"></div>
					<div class="brand_column_content6">品牌1直营</div>
				</div>


				<div class="brand_column_right brand_column_content7">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_one2.jpg" height="225" width="447"></div>
					<div class="brand_column_content6">超级大创意</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 品牌营销策划第一栏内容结束 -->

	<!-- 品牌营销策划第二栏内容开始 -->
	<div id="brand_column1">
		<div class="brand_column1_content">

			<div class="brand_column1_top"><span>关键点</span>落地</div>

			<div class="brand_column1_middle">100%力量干5%的事</div>

			<div class="brand_column1_bottom">

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand1.jpg"></div>
					<div class="brand_column1_bottom2">促销品牌化策划</div>
				</div>

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand2.jpg"></div>
					<div class="brand_column1_bottom2">网络微营销策划</div>
				</div>

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand3.jpg"></div>
					<div class="brand_column1_bottom2">新品上市策划</div>
				</div>

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand4.jpg"></div>
					<div class="brand_column1_bottom2">终端营销策划</div>
				</div>

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand5.jpg"></div>
					<div class="brand_column1_bottom2">渠道招商策划</div>
				</div>

				<div class="brand_column1_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand6.jpg"></div>
					<div class="brand_column1_bottom2">传播策划</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 品牌营销策划第二栏内容结束 -->

	<!-- 品牌营销策划第三栏内容开始 -->
	<div id="brand_column2">
		<div class="brand_column2_top">商业<span>模式设计</span></div>

		<div class="brand_column2_middle">聚焦核心 多点盈利</div>

		<div class="brand_column2_bottom">
			<div class="brand_column2_bottom1"></div>

			<div class="brand_column2_bottom2">

				<div class="brand_column2_bottom3">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_three1.jpg" width="226" height="280"></div>
					<div class="brand_column2_bottom4">顶层设计</div>
				</div>

				<div class="brand_column2_bottom3">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_three2.jpg" width="226" height="280"></div>
					<div class="brand_column2_bottom4">在哪儿买的呢</div>
				</div>

				<div class="brand_column2_bottom3">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_three3.jpg" width="226" height="280"></div>
					<div class="brand_column2_bottom4">价值链梳理</div>
				</div>

				<div class="brand_column2_bottom3">
					<div><img src="http://localhost:85/Application/Home/public/images/brand_three4.jpg" width="226" height="280"></div>
					<div class="brand_column2_bottom4">资源配置</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 品牌营销策划第三栏内容结束 -->

	<!-- 品牌营销策划第四栏内容开始 -->
	<div id="brand_column3">
		<div class="brand_column3_content">
			<div class="brand_column3_top"><span>合作</span>模式</div>

			<div class="brand_column3_bottom">



				<div class="brand_column3_bottom1">
					<div class="brand_column3_bottom2"><img src="http://localhost:85/Application/Home/public/images/aaa.jpg"></div>

					<div class="brand_column3_bottom3">品牌全案策划服务</div>

					<div class="brand_column3_bottom4 brand_column3_bottom8">
					
						<div class="brand_column3_bottom9">
							<div class="brand_column3_bottom5"><span>定义：</span>以产品为基础、品牌为核心全面调整企业与市场经营的策划活动，其中包括品牌策划、产品策划、渠道和招商策划、终端策划、新品上市策划等，并负责实施落地执行。</div>

							<div class="brand_column3_bottom6"><span>适用情况：</span>企业对品牌全案策划体系建设要求强烈，团队执行能力需要外脑助力。</div>

							<div class="brand_column3_bottom7"><span>特点：</span>策划师是主导，企业团队配合，成果模块清晰。</div>
						</div>
					</div>
				</div>



				<div class="brand_column3_bottom1">
					<div class="brand_column3_bottom2"><img src="http://localhost:85/Application/Home/public/images/bbb.jpg"></div>

					<div class="brand_column3_bottom3">品牌项目模块服务
</div>

					<div class="brand_column3_bottom4 brand_column3_bottom8">
						<div class="brand_column3_bottom9">
							<div class="brand_column3_bottom5"><span>定义：</span>按照项目模块界定服务内容，由顾问师为主导设计方案和编制计划，并对企业人员进行宣贯辅导，由企业自身团队完成方案的实施。</div>

							<div class="brand_column3_bottom6"><span>适用情况：</span>企业对体系建设要求强烈，阶段性任务明晰，团队的执行力强，需要咨询公司搭建体系、策划形象和编制方案。</div>

							<div class="brand_column3_bottom7"><span>特点：</span>策划师是主导，企业团队指导，成果模块清晰</div>
						</div>
					</div>
				</div>


				<div class="brand_column3_bottom1">
					<div class="brand_column3_bottom2"><img src="http://localhost:85/Application/Home/public/images/ccc.jpg"></div>

					<div class="brand_column3_bottom3">品牌年度顾问服务</div>

					<div class="brand_column3_bottom4">
						<div class="brand_column3_bottom9">
							<div class="brand_column3_bottom5"><span>定义：</span>按照时间和范畴服务内容，以年度的为主。由企业团队为主体，顾问师在界定的范围内以商定的形式给予指导和参考意见的咨询方式。</div>

							<div class="brand_column3_bottom6"><span>适用情况：</span>企业对模块要求不具体不清晰，但有明确的阶段任务目标品牌营销需要外脑助力。</div>

							<div class="brand_column3_bottom7"><span>特点：</span>企业团队是主导，策划师作为外脑参与，企业开括眼界得到专业指导和协助，提升企业的发展。</div>
						</div>
					</div>
				</div>


			</div>

		</div>
	</div>
	<!-- 品牌营销策划第四栏内容结束 -->

	<!-- 品牌营销策划第五栏内容开始 -->
	<div id="brand_column4">
		<div class="brand_column4_content">
			<div class="brand_column4_top"><span>合作</span>原则</div>


			<div class="brand_column4_bottom">

				<div class="brand_column4_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand-1.jpg" width="89" height="89"></div>
					<div class="brand_column4_bottom2">因为我们关注现在，更放眼未来。</div>
					<div class="brand_column4_bottom3">因为客户的成功才是我们的成功</div>
				</div>


				<div class="brand_column4_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand-2.jpg" width="89" height="89"></div>
					<div class="brand_column4_bottom2">我们没有尽力而为，只要全力以赴</div>
					<div class="brand_column4_bottom3">因为我们是一群以"品牌强国"为己任的顾问团队。</div>
					<div class="brand_column4_bottom4">因为我们深知国家之间的经济竞争，就是品牌之间的竞争。</div>
				</div>


				<div class="brand_column4_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand-3.jpg" width="89" height="89"></div>
					<div class="brand_column4_bottom2">我们不接受无偿的比稿招标!</div>
					<div class="brand_column4_bottom3">因为合作双方是同舟共济的战略伙伴，而非"应声虫"。</div>
					<div class="brand_column4_bottom4">因为相互尊重、互利双赢才能促进合作精益化</div>
				</div>


				<div class="brand_column4_bottom1">
					<div><img src="http://localhost:85/Application/Home/public/images/brand-4.jpg" width="89" height="89"></div>
					<div class="brand_column4_bottom2">我们绝不参与恶心价格竞争!</div>
					<div class="brand_column4_bottom3">因为我们本着诚信原则，为客户"量身定制"法宝。</div>
					<div class="brand_column4_bottom4">因为我们更注重的是卓越的品牌落地效应。</div>
				</div>

			</div>
		</div>
	</div>

	<!-- 品牌营销策划第五栏内容结束 -->
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