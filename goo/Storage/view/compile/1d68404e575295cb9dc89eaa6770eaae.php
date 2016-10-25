<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>在招聘职位</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/stylecompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/editcompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/editcompany2.0.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
	    
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/editcompany.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/ajaxHunter.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
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
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=index" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=register"  target="_blank">
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
					<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
	<style type="text/css">
		header div.lg_tnav .inner .lg_tnav_wrap li .current{
			border-bottom: none !important;
		}
	</style>
<form action="" method="post">
	<div class="top_info">
		<!--展示模式-->
		<div class="top_info_wrap" style="display: block;">
			<img src="<?php echo $comData['cplogo'] ? $comData['cplogo'] : './Public/home/imgs/moren/minion.png' ?>" draggable="false" class="mr_headimg" alt="<?php echo $comData['cpshortName']?>">
			<div class="company_info">
				<div class="company_main">
					
					<a href="<?php echo U('Company/index',array('cpid'=>$comData['cpid']))?>" target="_blank" title=""><h1><?php echo $comData['cpshortName']?$comData['cpshortName']:$comData['cpname']?></h1></a>
					<a class="identification">
						<i></i>
						<span>企业认证</span>
					</a>
					<div class="company_word">
						<!--公司简介-->
						<?php echo $comData['cpintro']?$comData['cpintro']:'还没有填写公司简介...'?>
						<!--/#公司简介-->
					</div>
				</div>
				<div class="company_data">
					<ul>
						<li>
							<!--公司职位发布数量-->
							<strong><?php echo $num?> 个</strong>
							<!--/#公司职位发布数量-->
							<br />
							<span title="该公司的在招职位数量">
								<span>招聘职位</span>
								<span class="tip"></span>
							</span>
							
						</li>
						<li>
							<!--登录时间-->
							<strong><?php echo date('Y-m-d',$comData['lastLoginTime'])?></strong>
							<!--/#登录时间-->
							
							<br />
							<span title="该公司职位管理者最近一次登录时间">
								<span>企业最近登录</span>
								<span class="tip"></span>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/#企业头部结束-->
	
	<!--公司主页导航条-->
	<div class="company_navs">
		<div class="company_navs_wrap">
			<ul>
				<li><a href="<?php echo U('Company/indexShow',array('cpid'=>$comData['cpid']))?>">公司主页</a></li>
				<!--发布职位统计-->
				<li class="current"><a href="<?php echo U('Company/jobsShow',array('cpid'=>$comData['cpid']))?>">招聘职位 (<?php echo $num?>)</a></li>
				<!--<?php echo $comData['count']?>-->
				<!--/#发布职位统计-->
			</ul>
		</div>
	</div>
	<!--/#公司主页导航条结束-->
	
	<!--主体部分-->
	<div class="main_container">
		<!--左边部分-->
		<div class="container_left">
			<!-----------------------------------------招聘职位 -------------------------------------------------------->
			<div class="item_container" id="company_intro">
				<div class="item_title">共有 <?php echo $num?> 在招聘职位</div>
				<ul id="onlineJob">
					<?php foreach ($jobData as $v){?>
					<li>
						<p class="item_title_data">
							<a href="<?php echo U('Job/content',array('jid'=>$v['jid']))?>" target="_blank"><?php echo $v['jname']?> [<?php echo $v['city_name']['district_name']?>]</a>
							<span><?php echo date('Y-m-d H:i',$v['pubdate'])?> 发布</span>
						</p>
						<p class="item_detail">
							<span class="item_salary"><?php echo $v['money']?>k</span>
							<span class="item_desc">经验<?php echo $v['experience']?> / <?php echo $v['education']?> / <?php echo $v['nature']?></span>
						</p>
						<i></i>
					</li>
					<?php }?>
					
				</ul>
				
			</div>
			<!--/#---------------------------------------招聘职位 -------------------------------------------------------->
			
			
		</div>
		<!--右边部分-->
		<div class="container_right">
			<div class="item_container">
				<div class="item_ltitle">公司基本信息</div>
				<!--展示模式-->
				<div class="item_content">
					<ul>
						<li>
							<i class="type"></i>
							<!--公司行业领域-->
							<span><?php echo $comData['industry']?></span>
						</li>
						<li>
							<i class="process"></i>
							<!--公司融资阶段-->
							<span><?php echo $comData['financing']?></span>
						</li>
						<li>
							<i class="number"></i>
							<!--公司规模-->
							<span><?php echo $comData['cpscale']?></span>
						</li>
						<li>
							<i class="address"></i>
							<!--公司地址-->
							<span><?php echo $comData['cpaddress']?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--主体部分结束-->

	
</form>
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
	
	</body>
</html>