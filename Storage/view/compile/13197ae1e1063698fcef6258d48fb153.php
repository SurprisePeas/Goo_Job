<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgLogin.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/login.js" type="text/javascript" charset="utf-8"></script>
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
			<a href="#" class="logo"></a>
		</header>
		<!--中间登录主体部分-->
		<section class="content_box">
			<!--登陆区域-->
			<div class="left_area">
				<form action="" method="post">
					<div class="form_body">
						<div class="input_item">
							<input type="text" placeholder="请输入账号" name="account" class="input input_white email" />
							<!--错误提示-->
							<!--<div class="input_tips"></div>-->
						</div>
						
						<div class="input_item input2">
							<input type="password" placeholder="输入密码" name="password" autocomplete="off" class="input input_white password" />
							<!--<div class="input_tips"></div>-->
						</div>
						
						<!--验证码-->
						<div class="input_item input2" >
							<input type="text" placeholder="请证明你不是机器人" autocomplete="off" name="code" class="input input_white" style="width: 130px;"/>
							<img src="<?php echo U('Login/code')?>" class="code_check" onclick="this.src='<?php echo U('Login/code')?>&i='+Math.random()"/></a>
						</div>
						<!--验证码-->
						
						<div class="input_item input2" style="overflow: hidden;">
							<a href="#" class="forget_pwd">忘记密码？</a>
						</div>
						<div class="input_item input2">
							<input type="submit" class="btn_green" value="登 录" />
						</div>
						<div class="input_item input2" style="overflow: hidden;">
							<h5 class="reg_now">
								还没有拉勾帐号？
								<a href="<?php echo U('Login/register')?>">立即注册</a>
							</h5>
						</div>
					</div>
				</form>
			</div>
		</section>
		
		<footer>
			<h4>— 专注互联网职业机会 —</h4>
		</footer>
	</body>
</html>
