<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>职位管理 发布简历</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/createStyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<!--//编辑器插件-->
		<link rel="stylesheet" type="text/css" href="./Public/home/simditor-2.3.6/styles/simditor.css" />
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/module.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/uploader.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/simditor.js"></script>
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
						<a href="http://localhost/lg/index.php?m=Home&c=Index&a=index" style="border-left: none;padding-left: 0;">
							拉钩O(∩_∩)O
						</a>
					</li>
					<li>
						<a href="http://localhost/lg/index.php?m=Home&c=Index&a=index">
							拉勾网首页
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
					                
					<li>
						<a href="" style="border-left: none;">
							消息
						</a>
					</li>
					<li>
						<a href="http://localhost/lg/index.php?m=Home&c=Jobhunter&a=index" target="_blank">
							我的简历
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							投递箱
						</a>
					</li>
					<li>
						<a href="" target="_blank">
							收藏夹
						</a>
					</li>
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<span class="unick"> geren11 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="">
									我的订阅
								</a>
							</li>
							<li>
								<a href="">
									职位邀请
								</a>
							</li>
							<li>
								<a href="">
									账号设置
								</a>
							</li>
							<li>
								<a href="">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://localhost/lg/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
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
				<a href="http://localhost/lg/index.php?m=Home&c=Company&a=index">
					<img src="./Public/home/imgs/logo_d0915a9.png"/>
					<span class="qiyeClass">企业版</span>
					<style type="text/css">
						span.qiyeClass{    
							font-weight: 400;
						    font-size: 24px;
						    line-height: 31px;
						    color: #00b38a;
						    position: relative;
						    top: 0;
						    left: 3px;
						    padding: 0 12px;
						    border-left: 1px solid #e1e1e1;
						}
					</style>
				</a>
				</h1>
			</div>
					<!--//首页公司-->
					<ul class="lg_tnav_wrap">
						<li>
							<a href="<?php echo U('Company/index')?>">
								公司
							</a>
						</li>
						<li>
							<a href="<?php echo U('Resume/index')?>">
								简历管理
							</a>
						</li>
						<li>
							<a href="<?php echo U('Job/index')?>" class="current">
								职位管理
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!--导航栏-->
		</header>

		<!--主体操作内容-->
		<div id="Create_container">
			<!--左侧 我收到的简历-->
			 <div class="sidebar">
			 	<a href="<?php echo U('Job/createJob')?>" class="btn_create">发布新职位</a>
			 	
			 	<!--我收到的简历-->
			 	<dl class="company_center_aside">
			 		<dt>我收到的简历</dt>
			 		<dd><a href="<?php echo U('Resume/index')?>">待处理简历</a></dd>
			 		<dd><a href="<?php echo U('Resume/infoFace')?>">已通知面试简历</a></dd>
			 		<dd><a href="<?php echo U('Resume/pass')?>">不合适简历</a></dd>
			 	</dl>
			 	
			 	<!--我发布的职位-->
			 	<dl class="company_center_aside">
			 		<dt>我发布的职位</dt>
			 		<dd><a href="<?php echo U('Job/index')?>">有效职位</a></dd>
			 		<dd><a href="">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl>
				 	<dt class="dlTitle"><h1>发布新职位<em></em></h1></dt>
				 	<dd class="contentDd">
				 		<form action="" id="jobForm" method="post">
				 			<!--一-->
				 			<table class="btm">
				 				<!--职位类别-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位类别</td>
				 					<td>
				 						<input type="button" class="selectr selectr_380" name="cname" id="select_category" value="选择职位类别" />
				 						<input type="hidden" name="cname" id="cname" value="请选择" />
				 						<!--选择列表  隐藏-->
				 						<div id="box_job">
				 							<!--假数据-->
				 							<?php foreach ($TopCategoryData as $TopV){?>
				 							<dl>
				 								<dt class="dtTage"><?php echo $TopV['cname']?></dt>
				 								<dd>
				 									<!--方块标签显示-->
				 									<ul class="reset">
				 										<?php foreach ($TopV['son'] as $sv){?>
				 										<li>
				 											<span><?php echo $sv['cname']?></span>
				 											<ul class="job_sub">
				 												<?php foreach ($sv['son'] as $gv){?>
				 												<li><?php echo $gv['cname']?></li>
				 												<?php }?>
			 												</ul>
				 										</li>
				 										<?php }?>
				 									</ul>
				 									<!--/#方块标签显示-->
				 								</dd>
				 							</dl>
				 							<?php }?>
				 						</div>
				 						<!--/#选择列表-->
				 					</td>
				 				</tr>
				 				<!--职位名称-->
				 				<tr>
				 					<td><span class="redstar">*</span></td>
				 					<td>职位名称</td>
				 					<td><input type="text" class="valid" name="jname" id="jobName" placeholder="Java,PHP,C++,..." /></td>
				 				</tr>
				 				<!--所属部门-->
				 				<tr>
				 					<td></td>
				 					<td>所属部门</td>
				 					<td><input type="text" class="valid" name="department" id="" value="" placeholder="请输入所属部门" /></td>
				 				</tr>
				 			</table>
				 			<!--二-->
				 			<table class="btm">
				 				<!--工作性质-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作性质</td>
				 					<td>
				 						<ul class="profile_radio">
				 							<li class="current">全职
				 								<em></em>
				 								<input type="radio" name="nature" value="全职" checked="checked" />
				 							</li>
				 							<li>兼职
				 								<em></em>
				 								<input type="radio" name="nature" value="兼职" />
				 							</li>
				 							<li>实习
				 								<em></em>
				 								<input type="radio" name="nature" value="实习" />
				 							</li>
				 						</ul>
				 					</td>
				 				</tr>
				 				
				 				<!--工作城市-->
				 				<tr>
				 					<td><span class="redstar">*</span></td>
				 					<td>工作城市</td>
				 					<td><input type="text" class="valid" name="city" value="" maxlength="15" placeholder="请输入工作城市" /></td>
				 				</tr>
				 				<tr>
			 						<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作地址</td>
				 					<td>
				 						<input type="text" name="place" id="" value="" class="input_520" placeholder="请输入详细的工作地址" />
				 					</td>
				 				</tr>
				 				<!--/#工作城市-->
				 				
				 				<!--月薪范围-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">月薪范围</td>
				 					<td>
				 						<div class="salary_range">
				 							<!--最低月薪-->
				 							<div>
				 								<input type="text" name="money[]" id="" class="money_int" placeholder="最低月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 							</div>
				 							<!--最高月薪-->
				 							<div>
				 								<input type="text" name="money[]" id="" class="money_int" placeholder="最高月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 							</div>
				 							<span>只能输入整数，如：9</span>
			 								<p id="tip" style="color: red;font-size: 16px;"></p>
				 						</div>
				 					</td>
				 				</tr>
				 				<!--/#月薪范围 -->
				 			</table>
				 			<!--三-->
				 			<table class="btm">
				 				<!--工作经验-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作经验</td>
				 					<td>
				 						<select name="experience" class="selectr info-select">
				 							<option value="不限">不限</option>
				 							<option value="应届毕业生">应届毕业生</option>
				 							<option value="1年">1年</option>
				 							<option value="2年以上">2年以上</option>
				 							<option value="5年以上">5年以上</option>
				 							<option value="10以上">10以上</option>
				 						</select>
				 					</td>
				 				</tr>
				 				<!--学历要求-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">学历要求</td>
				 					<td>
				 						<select name="education" class="selectr info-select">
				 							<option value="不限">不限</option>
				 							<option value="大专">大专</option>
				 							<option value="博士">博士</option>
				 							<option value="本科">本科</option>
				 							<option value="硕士">硕士</option>
				 						</select>
				 					</td>
				 				</tr>
				 			</table>
				 			<!--四-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位诱惑</td>
				 					<td><input type="text" name="tempt" id="" value="" class="input_520" maxlength="20" placeholder="20字描述该职位的吸引力，如：福利待遇、发展前景等" /></td>
			 					</tr>
				 			</table>
				 			<!--五 提交-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位描述</td>
				 					<td>
				 						
				 						<!--文本编辑器插件-->
									    <textarea id="editor" name="describe" maxlength="800" placeholder="请详细描述你要招聘职位的信息" autofocus></textarea>
				 						<!--/#文本编辑器插件-->
									    
				 					</td>
			 					</tr>
				 			</table>
		 					<!--提交按钮-->
 							<input type="submit" value="发布" class="btnFB" />
				 		</form>
				 	</dd>
			 	</dl>
			 </div>
			 <!--中间主体内容 结束-->
		</div>
		<!--/#container-->
		
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
		
		<script type="text/javascript">
			var editor = new Simditor({
			  textarea: $('#editor')
			});
		</script>
	</body>
</html>