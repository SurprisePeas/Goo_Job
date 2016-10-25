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
	{{include file="../Common/header"}}		
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
		 			<form action="{{U('Persona/editpassword')}}" method="post">
		 				<table class="savepassword">
		 					<tr>
		 						<td>登录帐号</td>
		 						<td style="padding-left: 15px;">{{$userData['account']}}</td>
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
	{{include file="../Common/footer"}}	
	<!--底部区域结束-->
	
	
	
	</body>
</html>

















