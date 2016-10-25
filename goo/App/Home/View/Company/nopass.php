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
		{{include file="../Common/header"}}
		</header>
		
		<!--中间提示成功内容-->
		<div id="success">
			<div class="content_mid">
				<dl class="c_section">
					<dt><h2><em></em>没有通过审核</h2></dt>
					<dd class="c_notice">
						<h4>很抱歉,你的申请没有通过审核!</h4>
						<a href="{{U('Company/verify')}}" class="greylink">请重新填写真实企业信息,便于尽快通过审核!</a>
					</dd>
					
				</dl>
			</div>
		</div>
		<!--/#中间提示成功内容-->
		
		<!--底部备案信息-->
		{{include file="../Common/footer"}}
		
	</body>
</html>
