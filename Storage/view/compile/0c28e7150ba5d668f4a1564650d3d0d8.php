<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>找工作-Goo-</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/hunt.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/home.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--首页头部-->
		<!--顶端头部黑条-->
<header>
	<!--个人信息-->
	<div class="lg_tbar">
		<div class="inner">
			<!--左侧企业版-->
			<div class="lg_tbar_l">
				<ul>
					<li>
						<a href="SurprisePeas" style="border-left: none;padding-left: 0;">
							首页 (∩_∩)
						</a>
					</li>
					<li>
						<a href="Company_adm.html">
							进入企业版
						</a>
					</li>
				</ul>

			</div>
			<!--左侧企业版-->

			<!--右侧个人信息-->
			<div class="lg_tbar_r">
				<ul>

					<!--判断有session的时候显示内容-->
										<li>
						<a href="http://goojob.com/index.php?m=Home&c=Login&a=index" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="http://goojob.com/index.php?m=Home&c=Login&a=register"  target="_blank">
							注册
						</a>
					</li>
					
               					<!--/#判断有session的时候显示内容-->

				</ul>
			</div>
			<!--右侧个人信息-->
		</div>
	</div>
	<!--个人信息-->

	<!--导航栏-->
	<div class="lg_tnav">
		<div class="inner">
			<!--logo-->
			<div class="lg_tnav_l">
				<h1 class="logoclass">
				<a href="SurprisePeas">
					<img src="./Public/home/imgs/logo_d0915a9.png" draggable="false"/>
				</a></h1>
			</div>
			<!--//首页公司-->
			<ul class="lg_tnav_wrap">
				<li>
					<a href="SurprisePeas" id="noBorder" class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="http://goojob.com/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
		<!--#首页头部-->

		<!--主体-->
		<div id="container">
			<!--左侧分类-->
			<div id="sidebar">
				<div class="Navs">
					<!--['技术1']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>技术<span></span></h2>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=JAVA" target="_blank">
								JAVA
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=PHP" class="hotJob" target="_blank">
								PHP
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=C" class="hotJob" target="_blank">
								C++
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=C" target="_blank">
								C
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=iOS" class="hotJob" target="_blank">
								iOS
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=前端开发" target="_blank">
								前端开发
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=技术经理" target="_blank">
								技术经理
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=技术总监" target="_blank">
								技术总监
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=架构师" target="_blank">
								架构师
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=CTO" target="_blank">
								CTO
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=Android" target="_blank">
								Android
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn">
							<?php foreach ($jishuData as $jishu){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$jishu['cname']])?>" target="_blank">
									<?php echo $jishu['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($jishu['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['技术1']块状分类********-->
					
					<!--['产品2']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>产品<span></span></h2>
							<a href="<?php echo U('huntlist',['keyword'=>'产品总监'])?>" target="_blank">
								产品总监
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'产品经理'])?>" class="hotJob" target="_blank">
								产品经理
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'移动产品经理'])?>" class="hotJob" target="_blank">
								移动产品经理
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'游戏策划'])?>" target="_blank">
								游戏策划
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -35px;">
							<?php foreach ($chanpinData as $chanpin){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$chanpin['cname']])?>" target="_blank">
									<?php echo $chanpin['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($chanpin['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['产品2']块状分类********-->
					
					<!--['设计3']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>设计<span></span></h2>
							<a href="<?php echo U('huntlist',['keyword'=>'设计总监'])?>" target="_blank">
								设计总监
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'UI'])?>" class="hotJob" target="_blank">
								UI
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'UE'])?>" target="_blank">
								UE
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'交互设计'])?>" target="_blank">
								交互设计
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'数据分析'])?>" target="_blank">
								数据分析
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -70px;">
							<?php foreach ($shejiData as $sheji){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$sheji['cname']])?>" target="_blank">
									<?php echo $sheji['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($sheji['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['设计3']块状分类********-->
				
					<!--['运营4']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>运营<span></span></h2>
							<a href="<?php echo U('huntlist',['keyword'=>'新媒体运营'])?>" target="_blank">
								新媒体运营
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'数据运营'])?>" target="_blank">
								数据运营
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'运营总监'])?>" target="_blank">
								运营总监
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'编辑'])?>" target="_blank">
								编辑
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'COO'])?>" target="_blank">
								COO
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -45px;">
							<?php foreach ($yunyingData as $yunying){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$yunying['cname']])?>" target="_blank">
									<?php echo $yunying['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($yunying['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['运营4']块状分类********-->
					
					<!--['市场与销售5']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>市场与销售<span></span></h2>
							<a href="<?php echo U('huntlist',['keyword'=>'市场推广'])?>" target="_blank">
								市场推广
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'市场总监'])?>" target="_blank">
								市场总监
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'市场策划'])?>" target="_blank">
								市场策划
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'BD'])?>" target="_blank">
								BD
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'销售总监'])?>" target="_blank">
								销售总监
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -91px;">
							<?php foreach ($shichangData as $shichang){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$shichang['cname']])?>" target="_blank">
									<?php echo $shichang['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($shichang['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['市场与销售[5]']块状分类********-->
					
					<!--['职能[6]']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>职能<span></span></h2>
							<a href="<?php echo U('huntlist',['keyword'=>'HR'])?>" target="_blank">
								HR
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'行政'])?>" class="hotJob" target="_blank">
								行政
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'会计'])?>" target="_blank">
								会计
							</a>
							<a href="<?php echo U('huntlist',['keyword'=>'出纳'])?>" target="_blank">
								出纳
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -201px;">
							<?php foreach ($zhinengData as $zhineng){?>
							<dl>
								<dt>
								<a href="<?php echo U('huntlist',['keyword'=>$zhineng['cname']])?>" target="_blank">
									<?php echo $zhineng['cname']?>
								</a>
								</dt>
								<dd>
									<?php foreach ($zhineng['son'] as $Son){?>
									<a href="<?php echo U('huntlist',['keyword'=>$Son['cname']])?>" target="_blank">
										<?php echo $Son['cname']?>
									</a>
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--/#['职能[6]']块状分类********-->
					
				</div>
				
				<!--查看更多职位-->
				<div class="subscribe">
					<a href="<?php echo U('huntlist')?>" target="_blank"><span>查找更多职位</span><i></i></a>
				</div>
				<!--/#查看更多职位-->
				
			</div>
			<!--/#左侧分类-->
				
			<!--中间内容主体-->
			<div class="content">
				<!--搜索-->
				<div id="search_box">
					<p id="searchForm">
						<input type="text" id="keyword" autocomplete="off" maxlength="64" placeholder="搜索职位、公司或地点" value="" class="ui-autocomplete-input">
						<input type="button" name="submit" id="submit" value="搜索" />
					</p>
				</div>
				<!--搜索-->
				<!--热门搜索-->
				<dl class="hotSearch">
					<dt>
					热门搜索:
					</dt>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'PHP'])?>" target="_blank">
							PHP
						</a>
					</dd>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'产品经理'])?>" target="_blank">
							产品经理
						</a>
					</dd>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'HTML5'])?>" target="_blank">
							HTML5
						</a>
					</dd>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'设计师'])?>" target="_blank">
							设计师
						</a>
					</dd>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'易橙天下'])?>" target="_blank">
							易橙天下
						</a>
					</dd>
					<dd>
						<a href="<?php echo U('huntlist',['keyword'=>'腾讯'])?>" target="_blank">
							腾讯
						</a>
					</dd>
				</dl>
				<!--热门搜索-->

				<!--轮播图-->
				<div id="home_banner">
					<ul class="banner_bg">
						<li  class="banner_bg_1 current" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fDwZ6APaUWAADrqGper3g881.png" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
						<li  class="banner_bg_2" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/CgqKkVen-3iAVtnEAAI_LYklj0g045 (1).JPG" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
						<li  class="banner_bg_3" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/CgqKkVekCRuAYkKTAAEvdGlZx60873 (1).JPG" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
					</ul>
					<div class="banner_control">
						<em></em>
						<ul class="thumbs">
							<li  class="thumbs_1 current" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fDwaCAJIMpAAAZCAwxQmI485.JPG"  width="113" height="42" />
							</li>
							<li  class="thumbs_2" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fAMa2AMjVlAAAjgD48FRE513.JPG" width="113" height="42" />
							</li>
							<li  class="thumbs_3" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fFPuOAFbt3AAACY0fRdhk161.PNG" width="113" height="42" />
							</li>
						</ul>
					</div>
				</div><!--/#main_banner-->
				<!--轮播图-->

				<!--大缩略图-->
				<ul id="da-thumbs" class="da-thumbs">
					<li >
						<a href="Company_1.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/08f790529822720e984871c17ecb0a46f21fab03.jpg" width="113" height="113" alt="腾讯" />
							<div class="hot_info">
								<h2 title="腾讯">腾讯</h2>
								<em></em>
								<p title="连接一切，从连接人才开始！">
									连接一切，从连接人才开始！
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_2.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/ac345982b2b7d0a2d167badfc3ef76094a369ac2.jpg" width="113" height="113" alt="饿了吗" />
							<div class="hot_info">
								<h2 title="饿了吗">饿了吗</h2>
								<em></em>
								<p title="to do really SMALL things, and grow them bigger.">
									to do really SMALL things, and grow them bigger.
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_3.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgqLKVXsHgGANdDuAAAfIDoIUFI096.png" width="113" height="113" alt="优酷土豆" />
							<div class="hot_info">
								<h2 title="优酷土豆">优酷土豆</h2>
								<em></em>
								<p title="专注于视频领域，是中国网络视频行业领军企业">
									专注于视频领域，是中国网络视频行业领军企业
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_4.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgpzWlXs99OASRG8AAAVkJavO_Q545.jpg" width="113" height="113" alt="易橙天下" />
							<div class="hot_info">
								<h2 title="易橙天下">易橙天下</h2>
								<em></em>
								<p title="一家全球信息技术服务公司">
									一家全球信息技术服务公司
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_5.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgYXBlW4pW-AL-CcAAAStAoXnEI801.jpg" width="113" height="113" alt="乔大招" />
							<div class="hot_info">
								<h2 title="乔大招">乔大招</h2>
								<em></em>
								<p title="海量个人行为轨迹数据进行消费趋势判断">
									海量个人行为轨迹数据进行消费趋势判断
								</p>
							</div>
						</a>
					</li>
					<li  class="last" >
						<a href="Company_6.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/Cgo8PFTUWAeAFPHrAABw9Dg7c1Q567.jpg" width="113" height="113" alt="薄荷" />
							<div class="hot_info">
								<h2 title="薄荷">薄荷</h2>
								<em></em>
								<p title="我们的梦想是为女性提供最好的健康产品">
									我们的梦想是为女性提供最好的健康产品
								</p>
							</div>
						</a>
					</li>
				</ul>
				<!--大缩略图-->

				<!--工作职位-->
				<ul id="job_tab">
					<li class="current hotTab">
						热门职位
					</li>
					<li class="newTab">
						最新职位
					</li>
				</ul>
				<!--工作职位-->

				<!--最热列表-->
				<div class="job_list hot_posHotPosition ">
					<ul class="clearfix">
						<?php foreach ($hotData as $job){?>
						<li class="position_list_item">
							<!--上部分-->
							<div class="pli_top">
								<!--左-->
								<div class="fl pli_top_l">
									<!--职位名称-->
									<div class="postion_name">
										<h2 class="fl">
										<a href="Job_<?php echo $job['jid']?>.html" class="position_link" target="_blank">
											<?php echo $job['jname']?><span>[<?php echo $job['district_name']?>]</span>
										</a></h2>
										<!--时间-->
										<span class="fl"><?php echo date('m月d日 H:i',$job['pubdate']) ?> 发布</span>
									</div>
									<!--薪资,要求-->
									<div>
										<span class="salary fl"><?php echo $job['money']?>k</span>
										<span> 经验<?php echo $job['experience']?>
										/ <span><?php echo $job['education']?></span> </span>
									</div>
								</div>
								<!--右-->
								<div class="fr pli_top_r">
									<div class="company_name wordCut">
										<a href="Company_<?php echo $job['cpid']?>.html" target="_blank">
											<?php echo $job['cpshortName']?$job['cpshortName']:$job['cpname']?>
										</a>
									</div>
									<div class="industry wordCut">
										<span><?php echo $job['industry']?></span> / <span><?php echo $job['financing']?></span>
									</div>
								</div>
							</div>

							<!--下部分-->
							<div class="pli_btm">
								<div class="pli_btm_l">
									<?php echo $job['tempt']?>
								</div>
								<div class="pli_btm_r">
									<!--<span>股票期权</span><span>绩效奖金</span><span>五险一金</span>-->
								</div>
							</div>
						</li>
						<?php }?>
					</ul>
					<a href="javascript:;" class="list_more">
						没有更多了哦~ (⊙o⊙)
					</a>
				</div>
				<!--/#最热列表-->
				
				<!--最新职位 hid-->
				<div class="job_list new_posHotPosition hid">
					<ul class="clearfix">
						<?php foreach ($data as $job){?>
						<li class="position_list_item">
							<!--上部分-->
							<div class="pli_top">
								<!--左-->
								<div class="fl pli_top_l">
									<!--职位名称-->
									<div class="postion_name">
										<h2 class="fl">
										<a href="Job_<?php echo $job['jid']?>.html" class="position_link" target="_blank">
											<?php echo $job['jname']?><span>[<?php echo $job['district_name']?>]</span>
										</a></h2>
										<!--时间-->
										<span class="fl"><?php echo date('m月d日 H:i',$job['pubdate']) ?> 发布</span>
									</div>
									<!--薪资,要求-->
									<div>
										<span class="salary fl"><?php echo $job['money']?>k</span>
										<span> 经验<?php echo $job['experience']?>
										/ <span><?php echo $job['education']?></span> </span>
									</div>
								</div>
								<!--右-->
								<div class="fr pli_top_r">
									<div class="company_name wordCut">
										<a href="Company_<?php echo $job['cpid']?>.html" target="_blank">
											<?php echo $job['cpshortName']?$job['cpshortName']:$job['cpname']?>
										</a>
									</div>
									<div class="industry wordCut">
										<span><?php echo $job['industry']?></span> / <span><?php echo $job['financing']?></span>
									</div>
								</div>
							</div>

							<!--下部分-->
							<div class="pli_btm">
								<div class="pli_btm_l">
									<?php echo $job['tempt']?>
								</div>
								<div class="pli_btm_r">
									<!--<span>股票期权</span><span>绩效奖金</span><span>五险一金</span>-->
								</div>
							</div>
						</li>
						<?php }?>
						<!--/#数据-->
					</ul>
					<a href="javascript:;" class="list_more">
						没有更多了哦~ (⊙o⊙)
					</a>
				</div>
				<!--职位列表-->

				<!--友情链接 未添加的内容---->

			</div>
			<!--中间内容主体-->
		</div>
		<!--主体-->

		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>

		<!--底部备案信息-->
		<!--回到顶部-->
<a href="javascript:void(0);" id="back"></a>
<!--回到顶部结束-->
<!--底部备案信息-->
<footer>
	<div class="wrapper">
		<i></i>
		<div class="copyright">
			<span>唯一可以抱怨的,只是不够努力的自己</span>
			<br />
			<br />
			<span>少一点抱怨,多一点努力!</span>
		</div>
	</div>
</footer>
		<!--/#底部备案信息-->

		<?php if(empty($_SESSION['info'])){?>
                
				
<!--底部登录条-->
		<div id="logintool">
			<div>
				<em></em>
				<img src="./Public/home/imgs/login/footbar_logo_e2fde1b.png"/>
				<!--<span class="companycount"> <i style="background-position-y: -30px;"></i><i style="background-position-y: -60px;"></i><i style="background-position-y: -60px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: -180px;"></i><i style="background-position-y: -60px;"></i> </span>
				<span class="jobscount"> <i style="background-position-y: -30px;"></i><b></b><i style="background-position-y: -240px;"></i><i style="background-position-y: -90px;"></i><i style="background-position-y: -270px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: 0px;"></i><i style="background-position-y: 0px;"></i> </span>-->
				<span class="companycount"> 8</span>
				<span class="jobscount">39</span>
				
				<a href="javascript:;" class="bar_login">
					<i></i>
				</a>
				<div class="lt_r">
					<a href="http://goojob.com/index.php?m=Home&c=Login&a=register" target="_blank">
						<i></i>
					</a>
				</div>
			</div>
		</div>
		<!--底部登录条结束-->

		<!--登录界面部分-->
		<div id="all_cover"></div>
		<div id="colorbox">
			<div id="box_m">
				<div class="box_content">
					<div class="bctitle">
						登录
					</div>
					<div class="bcdown">
						<div class="bcdcenter">
							<form id="bcd_login" action="javascript:;" method="">
								<div class="username">
									<input type="text" id="email" name="account" maxlength="16" placeholder="请输入登录账号" />
									<span id="input_tips"></span>
								</div>
								<div class="password">
									<input type="password" id="ipassword" maxlength="16" name="password" placeholder="请输入密码" />
									<span id="input_tips"></span>
								</div>
								<p style="color: red;line-height: 13px;display: none;" id="msg_p"><img src="./Public/home/imgs/error.png"/>账号和密码不匹配</p><br />
								<!--<a href="" id="foget" target="_blank">
									忘记密码？
								</a>-->
								<input type="submit" value="登     录" id="sub_btn"/>
							</form>
							<script type="text/javascript">
								$("#bcd_login").submit(function(){
									var allre = $("#bcd_login").serialize();
									$.ajax({
										type:"post",
										url:"http://goojob.com/index.php?m=Home&c=Login&a=modalAjax",
										dataType:"JSON",
										data:allre,
										success:function(phpData){
											if(phpData){
												window.location.reload();
											}else{
												$(".password #input_tips").hide();
												$("#msg_p").show();
											}
										}
									});
								})
							</script>
							<div class="bcd_right">
								<div>
									还没有拉勾帐号？
								</div>
								<a href="http://goojob.com/index.php?m=Home&c=Login&a=register" class="registor_now" target="_blank">
									立即注册
								</a>
								<div class="login_others">
									使用以下帐号直接登录:
								</div>
								<a href="javascript:alert('功能即将开通,敬请期待');" id="icon_wb"></a>
								<a href="javascript:alert('功能即将开通,敬请期待');" id="icon_qq"></a>
							</div>
						</div>
					</div>
					<input type="button" id="close"/>
				</div>
			</div>
		</div>
		<!--登录界面部分结束-->
		
               <?php }?>

	</body>
</html>