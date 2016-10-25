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
					<dt><h2><em></em>等待审核</h2></dt>
					<dd class="c_notice">
						<h4>申请已成功提交,正在审核中...</h4>
						<p class="greylink"><a href="{{U('Index/index')}}">我们将会尽快处理您的认证申请,审核结果会及时通知您!</a></p>
						<br />
						<p class="greylink">
							<a href="{{U('Index/index')}}">返回首页..</a>
						</p>
					</dd>
					
				</dl>
			</div>
		</div>
		<!--/#中间提示成功内容-->
		
		<!--底部备案信息-->
		{{include file="../Common/footer"}}
		
	</body>
</html>
