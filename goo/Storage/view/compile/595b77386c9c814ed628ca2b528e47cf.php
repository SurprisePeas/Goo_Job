<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./public/home/css/lgLogin.css"/>
		<link rel="stylesheet" type="text/css" href="./public/home/css/lgRegister.css"/>
		<script src="./public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./public/home/js/register.js" type="text/javascript" charset="utf-8"></script>

	    <!--载入hdjs-->
	    <link rel="stylesheet" href="Public/hdjs/hdjs.css">
	    <script src="Public/hdjs/hdjs.min.js"></script>

		<style type="text/css">
			.input_tips{
				position: relative;
				z-index: 2;
				margin-top: 5px;
				background: url(./Public/home/imgs/error.png) left center no-repeat;
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
			<a href="SurprisePeas"draggable="false" class="logo"></a>
		</header>
		<!--中间登录主体部分-->
		<section class="content_box">
			<!--登陆区域-->
			<div class="left_area" style="margin-top: 20px;">
				<center><h3 style="color: #00b38a;margin-bottom: 20px;font-weight: 400;" >注 册 账 号 </h2></center>
				<form onsubmit="return hd_submit(this,'<?php echo U('register')?>','<?php echo U('Index/index')?>')">
					<div class="form_body">
						<div class="input_item">
							<input type="text" placeholder="请输入要注册的账号" name="account" maxlength="20" autocomplete="off" class="input input_white account" />
							<div class="input_tips"></div>
						</div>
						<div class="input_item input2">
							<input type="password" placeholder="请输入密码" maxlength="16" name="password" autocomplete="off" class="input input_white password" />
							<div class="input_tips"></div>
						</div>
						<div class="input_item input2">
							<input type="password" placeholder="确认密码" maxlength="16" name="passworded" autocomplete="off" class="input input_white password" />
							<div class="input_tips"></div>
						</div>
						<div class="input_item input2" >
							<input type="text" placeholder="请证明你不是机器人" maxlength="4" name="code" autocomplete="off" class="input input_white" style="width: 130px;"/>
							<img src="<?php echo U('Login/code')?>" class="code_check" onclick="this.src='<?php echo U('Login/code')?>&i='+Math.random()"/></a>
						</div>
						<div class="input_item input2">
							<input type="button" value="找工作" class="btn_outline but_0" />
							<input type="button" value="招人" class="btn_outline but_1" style="margin-right: 0;"/>
							<input type="hidden" class="distinguish" name="distinguish" value="" />
							<!--用于更改distinguish 用户状态-->
							<script type="text/javascript">
								$('.but_0').click(function(){
									$(".distinguish").val(1);
								})
								$('.but_1').click(function(){
									$(".distinguish").val(2);
								})
							</script>
							<!--/#用于更改distinguish 用户状态-->
						</div>
						<!--<div class="input_item input2" style="overflow: hidden;">
							<label class="agreement_box">
								<span class="icon_checkbox" style="background-position: -13px 3px;"></span>
								<input type="checkbox" name="" id="checkbox" checked="checked" value="" />我已阅读并同意
							</label>
								<a href="#" target="_blank" >《拉勾用户协议》</a>
						</div>-->
						<div class="input_item input2">
							<input type="submit" class="btn_green" id="btn_g" value="注 册" />
						</div>
					</div>
				</form>
			</div>
			<div class="line">
				<img src="./Public/home/imgs/divider_a3c3658.jpg"/>
			</div>
			<!--右侧登录接口部分-->
			<div class="right_area">
				<h5>已有Goo帐号:</h5>
				<a href="<?php echo U('Login/index')?>" class="login_now">直接登录</a>
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
			<h4>— 人潮人海中 有你有我  —</h4>
		</footer>
	</body>
</html>