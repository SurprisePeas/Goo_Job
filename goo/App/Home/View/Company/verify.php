<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>开通招聘服务 验证</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/verify.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/comHeader"}}
		<style type="text/css">
			header div.lg_tnav .inner div.lg_tnav_l .logoclass a span{
				top: -7px;
			}
		</style>
		<ul class="lg_tnav_wrap">
				<li>
					<a href="{{U('Company/index')}}">
						公司
					</a>
				</li>
				<li>
					<a href="{{U('CompanyResume/index')}}">
						简历管理
					</a>
				</li>
				<li>
					<a href="{{U('Job/index')}}">
						职位管理
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>		
<!--/#企业头部-->
		<!--标语-->
		<div id="banner">
			<h1>Open recruitment service</h1>
			<h2>开通招聘服务</h2>
		</div>		
		<!--/#标语-->
		
		<!--公司名称,表单-->
		<form action="" method="post" class="content_container" enctype="multipart/form-data">
			<ul>
				<!--公司名称-->
				<li class="required">
					<em>*</em>
					<input type="text" name="cpname" autocomplete="off" id="companyName" maxlength="30" placeholder="请输入与公司营业执照一致的公司全称" />
					<span class="tip">（请输入与公司营业执照一致的公司全称，审核通过后不可更改）</span>
				</li>
				<!--/#公司名称-->
				
				<li class="required">
					<em>*</em>
					<input type="text" name="cpaddress" autocomplete="off" maxlength="60" placeholder="请输入公司地址" />
					<span class="tip">（请输入公司所在地址）</span>
				</li>
				
				<!--企业官网-->
				<li class="required">
					<input type="text" name="url" autocomplete="off" maxlength="50" id="companyName" placeholder="官网网址" />
					<span class="tip">（官网网址(可填),填写后能提高通过率哦~）</span>
				</li>
				
				<!--行业领域名称-->
				<li class="required">
				<em>*</em>
				<label>
					<select name="industry">
						<option value="不限" selected="selected">不限</option>
						<option value="移动互联网">移动互联网</option>
						<option value="电子商务">电子商务</option>
						<option value="金融">金融</option>
						<option value="企业服务">企业服务</option>
						<option value="教育">教育</option>
					</select>
				</label>
				</li>
				<!--/#行业领域名称-->
				
				<!--融资阶段-->
				<li class="required">
				<label>
					<select name="financing">
						<option value="未融资" selected="selected">未融资</option>
						<option value="天使轮">天使轮</option>
						<option value="A轮">A轮</option>
						<option value="B轮">B轮</option>
						<option value="C轮">C轮</option>
						<option value="D轮以上">D轮以上</option>
						<option value="上市公司">上市公司</option>
						<option value="不需要融资">不需要融资</option>
					</select>
				</label>
				</li>
				<!--/#融资阶段-->
				
				<!--公司规模-->
				<li class="required">
				<label>
					<select name="cpscale">
						<option value="少于15人" selected="selected">少于15人</option>
						<option value="15-50人">15-50人</option>
						<option value="50-150人">50-150人</option>
						<option value="150-500人">150-500人</option>
						<option value="500-2000人">500-2000人</option>
						<option value="2000人以上">2000人以上</option>
					</select>
				</label>
				</li>
				<!--/#公司规模-->
				
				<!--上传资质文件-->
				<li class="required">
					<em>*</em>
					<label>
					<!--<div class="shade" style="display: none;">请上传公司营业执照</div>-->
					<input type="file" name="license" id="companyImg" style="opacity: 1;width: 300px;" />
					</label>
					<span class="tip">（点击上传公司营业执照，审核通过后不可更改）</span>
				</li>
				<!--/#上传资质文件-->
				
				<!--提交按钮-->
				<button class="next_step" type="submit">提交审核</button>
				<!--/#提交按钮-->
				
			</ul>
		</form>
		<!--/#公司名称,表单-->
		
		<!--载入底部-->
		{{include file="../Common/footer"}}
	</body>
</html>
