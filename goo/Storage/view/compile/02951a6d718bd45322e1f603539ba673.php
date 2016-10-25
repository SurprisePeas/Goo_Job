<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>申请已成功提交,正在审核中...</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/success.css"/>
		<script src="js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--顶端头部黑条-->
		<!--顶端头部黑条-->
<header>
	<!--个人信息-->
	<div class="lg_tbar">
		<div class="inner">
			<!--左侧企业版-->
			<div class="lg_tbar_l">
				<ul>
					<li>
						<a href="http://localhost/lg/index.php?m=Home&c=Company&a=Index" style="border-left: none;padding-left: 0;">
							拉钩O(∩_∩)O
						</a>
					</li>
					<li>
						<a href="http://localhost/lg/index.php?m=Home&c=Company&a=index">
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
					                
					<!--判断是否是求职者-->
										
					
					                
					<li class="showUser">
						<span class="unick" style="border: 0;margin-right: -15px;"> admin11 </span>
					</li>
					<li>
						<a href="http://localhost/lg/index.php?m=Home&c=Login&a=out">
							退出登录
						</a>
					</li>
					
               					
					
					<!--没有session的时候显示登录注册按钮-->
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
				<a href="http://localhost/lg/index.php?m=Home&c=Index&a=index">
					<img src="./Public/home/imgs/logo_d0915a9.png"/>
				</a></h1>
				<!--城市-->
							</div>
			<!--//首页公司-->
			<ul class="lg_tnav_wrap">
				<li>
					<a href="http://localhost/lg/index.php?m=Home&c=Index&a=index" id="noBorder" class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="http://localhost/lg/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
		</header>
		
		<!--中间提示成功内容-->
		<div id="success">
			<div class="content_mid">
				<dl class="c_section">
					<dt><h2><em></em>没有通过审核</h2></dt>
					<dd class="c_notice">
						<h4>很抱歉,你的申请没有通过审核!</h4>
						<a href="<?php echo U('Company/verify')?>" class="greylink">请重新填写真实企业信息,便于尽快通过审核!</a>
					</dd>
					
				</dl>
			</div>
		</div>
		<!--/#中间提示成功内容-->
		
		<!--底部备案信息-->
		<!--回到顶部-->
<a href="javascript:void(0);" id="back"></a>
<!--回到顶部结束-->
<!--底部备案信息-->
<footer>
	<div class="wrapper">
		<i></i>
		<div class="copyright">
			<a href="javascript:;">京ICP备14023790号-2</a>
			<span>京公网安备11010802017116号</span>
		</div>
	</div>
</footer>
		
	</body>
</html>
