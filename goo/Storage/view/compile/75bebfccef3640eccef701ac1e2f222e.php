<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgLogin.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<!--<script src="./Public/home/js/login.js" type="text/javascript" charset="utf-8"></script>-->
		<script src="./Public/home/js/register.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.input_tips{
				position: relative;
				z-index: 2;
				margin-top: 5px;
				background: url(./Public/home/imgs/login/error.png) left center no-repeat;
				padding-left: 20px;
				line-height: 18px;
				color: #fd5f39;
				/*display: none;*/
				font-size: 12px;
			}
		</style>
	</head>
	<body>
		<header class="top_header">
			<a href="<?php echo U('Index/index')?>" class="logo"></a>
		</header>
		<!--中间登录主体部分-->
		<section class="content_box" id="login_box">
			<!--登陆区域-->
			<div class="left_area">
				<center><h3 style="color: #00b38a;margin-bottom: 20px;font-weight: 400;" >登 录 账 号 </h2></center>
				<form action="" method="post">
					<div class="form_body">
						<div class="input_item">
							<input type="text" placeholder="请输入账号" maxlength="16" name="account" class="input input_white email account" />
							<!--错误提示-->
							<div class="input_tips"></div>
						</div>

						<div class="input_item input2">
							<input type="password" placeholder="输入密码" maxlength="16" name="password" autocomplete="off" class="input input_white password" />
							<div class="input_tips"></div>
						</div>

						<!--验证码-->
						<div class="input_item input2" >
							<input type="text" placeholder="请证明你不是机器人" maxlength="4" autocomplete="off" name="code" class="input input_white" style="width: 130px;"/>
							<img src="<?php echo U('Login/code')?>" class="code_check" onclick="this.src='<?php echo U('Login/code')?>&i='+Math.random()"/></a>
						</div>
						<!--验证码-->

						<!--<div class="input_item input2" style="overflow: hidden;">
							<a href="#" class="forget_pwd">忘记密码？</a>
						</div>-->
						<div class="input_item input2">
							<input type="submit" class="btn_green" value="登 录" />
						</div>
						<div class="input_item input2" style="overflow: hidden;">
							<h5 class="reg_now">
								还没有Goo帐号？
								<a href="<?php echo U('Login/register')?>">立即注册</a>
							</h5>
						</div>
					</div>
				</form>
			</div>
			<div class="line">
				<img src="./Public/home/imgs/divider_a3c3658.jpg"/>
			</div>
			<!--右侧登录接口部分-->
			<div class="right_area">
				<h5>使用以下帐号直接登录:</h5>
				<ul class="other_login">
					<li>
						<a href="javascript:alert('接口即将开启');" title="使用新浪微博帐号登录" class="icon_login icon_sina" target="_blank"></a>
					</li>
					<li>
						<a href="javascript:alert('接口即将开启');" title="使用腾讯QQ帐号登录" class="icon_login icon_tencent" target="_blank"></a>
					</li>
				</ul>
			</div>
			<i class="youxiajiao"></i>
		</section>

		<footer>
			<h4>— 人潮人海中 有你有我   —</h4>
		</footer>
	</body>
</html>
