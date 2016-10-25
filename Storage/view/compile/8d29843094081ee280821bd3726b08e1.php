<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/persona/personalsettings.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/persona/editpassword.css"/>
		<!--上传文件插件-->
	    <link rel="stylesheet" type="text/css" href="./Public/uploadify/uploadify.css">
	    	
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/personalsettings.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/editpassword.js" type="text/javascript" charset="utf-8"></script>

		<!--上传文件插件-->
    	<script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
		
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
					                
					<!--判断是否是求职者-->
					
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> www123456 </span>-->
						<span class="unick"> www123456 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="Persona_user.html">
									账号设置
								</a>
							</li>
							<li>
								<a href="Company_adm.html" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!--                
					<li class="showUser">
						<span class="unick" style="border: 0;margin-right: -15px;"> www123456 </span>
					</li>
					<li>
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=out">
							退出登录
						</a>
					</li>
					
               -->


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
	<!--顶部黑色区域-->
	<!--主体部分-->
	<div id="Create_container">
		<!--左侧 我收到的简历-->
		 <div class="sidebar">
		 	<!--我收到的简历-->
		 	<dl class="company_center_aside">
		 		<dt>账号设置</dt>
		 		<dd><a href="Persona.html">个人信息</a></dd>
		 		<!--<dd><a href="">邮箱绑定</a></dd>-->
		 		<dd class="active"><a href="Persona_password.html">修改密码</a></dd>
		 	</dl>
		 </div>
		<!--左侧 我收到的简历  结束-->
		 
		 <!--中间主体内容-->
		 <div class="content">
		 	<dl class="c_section">
		 		<dt>
		 			<h1>
		 				<em></em>修改密码
		 			</h1>
		 		</dt>
		 		<dd>
		 			<form action="<?php echo U('Persona/editpassword')?>" method="post">
		 				<table class="savepassword">
		 					<tr>
		 						<td>登录帐号</td>
		 						<td style="padding-left: 15px;"><?php echo $userData['account']?></td>
		 					</tr>
		 					<tr>
		 						<td class="label">当前密码</td>
		 						<td>
		 							<input type="password" name="oldPassword" maxlength="16" />
		 							<span class="error" style="display: none;"></span>
		 						</td>
		 					</tr>
		 					<tr>
		 						<td class="label">新密码</td>
		 						<td>
		 							<input type="password" name="newPassword" maxlength="16" />
		 							<span class="error" style="display: none;"></span>
		 						</td>
		 					</tr>
		 					<tr>
		 						<td class="label">确认密码</td>
		 						<td>
		 							<input type="password" name="confirmPassword" maxlength="16" />
		 							<span class="error" style="display: none;"></span>
		 						</td>
		 					</tr>
		 					<tr>
		 						<td>
		 							<input type="submit" value="保存" />
		 						</td>
		 					</tr>
		 				</table>
		 			</form>
		 		</dd>
		 	</dl>
		 </div>
		 <!--中间主体内容 结束-->
	</div>
	<!--主体部分结束-->
	
	<!--回到顶部-->
	<a href="javascript:void(0);" id="back"></a>
	<!--回到顶部结束-->
	

	<!--底部区域-->
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
	<!--底部区域结束-->
	
	
	
	</body>
</html>

















