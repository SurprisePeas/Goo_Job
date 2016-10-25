<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $num?> 不合适简历 简历管理</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/createStyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/interviewStyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/resumedeal.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--顶端头部黑条<--></-->
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
						<a href="SurprisePeas" style="border-left: none;padding-left: 0;">
							Goo O(∩_∩)O
						</a>
					</li>
					<li>
						<a href="SurprisePeas">
							Goo首页
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
						<!--<span class="unick"> qiye00002 </span>-->
						<span class="unick"> qiye00002 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Persona&a=index">
									账号设置
								</a>
							</li>
							<li>
								<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Company&a=index" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!--                
					<li class="showUser">
						<span class="unick" style="border: 0;margin-right: -15px;"> qiye00002 </span>
					</li>
					<li>
						<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=out">
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
				<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Company&a=index">
					<img src="./Public/home/imgs/logo_d0915a9.png" draggable="false"/>
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
					<ul class="lg_tnav_wrap">
						<li>
							<a href="<?php echo U('Company/index')?>">
								公司
							</a>
						</li>
						<li>
							<a href="<?php echo U('Resume/index')?>" class="current">
								简历管理
							</a>
						</li>
						<li>
							<a href="<?php echo U('Job/index')?>">
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
			 		<dd><a href="<?php echo U('index')?>">待处理简历</a></dd>
			 		<dd><a href="<?php echo U('infoFace')?>">已通知面试简历</a></dd>
			 		<dd class="current"><a href="<?php echo U('pass')?>">不合适简历</a></dd>
			 	</dl>
			 	
			 	<!--我发布的职位-->
			 	<dl class="company_center_aside">
			 		<dt>我发布的职位</dt>
			 		<dd><a href="<?php echo U('Job/index')?>">有效职位</a></dd>
			 		<dd><a href="<?php echo U('Job/recycleJob')?>">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl class="company_center_content">
				 	<dt class="dlTitle"><h1>不合适简历<em></em><span>（共 <?php echo $num?> 份）</span></h1></dt>
				 	<!--简历列表-->
					<dd>
						<form action="" method="get">
							<!--全选-->
							<div class="filter_actions">
								<label class="checkbox" for="">
									<!--勾选框-->
									<input type="checkbox" name="" id="" value="" />
									<i class="allI"></i>
									<!--/#勾选框-->
								</label>
								<span>全选</span>
								<a href="javascript:;" class="btn_no">删除</a>
								<script type="text/javascript">
									//获取所有checkbox值   全选,
									$(".btn_no").click(function() {
										//获得所有的checkbox值 text
										text = $("input:checkbox[name='message']:checked").map(function(index,elem) {
											return $(elem).val();
										}).get().join(',');
										//ajax处理所有的值
										$.ajax({
											type:"post",
											url:"<?php echo U('CompanyResume/ajaxDel')?>",
											data:{aid:text},
											success:function(phpData){
												$("ul.resumeLists").fadeOut(500);
											}
										});
									});
								</script>
							</div>
							<!--/#全选-->
							<?php if(empty($job_actData)){?>
                
							<ul class="resumeLists">
								<center style="font-size: 20px;"><img src="./Public/home/imgs/noresult_95_9bde913.png" style="margin-top: 30px;"/>暂时没有符合该搜索条件的简历</center>
							</ul>
							<?php }else if(!empty($job_actData)){?>
							<ul class="resumeLists">
							<!--数据-->
							<?php foreach ($job_actData as $v){?>
								<li>
									<!--勾选框-->
									<laber class="checkbox">
										<input type="checkbox" name="message" value="<?php echo $v['aid']?>" />
										<i></i>
									</laber>
									<!--/#勾选框-->
									<!--简历个人信息-->
									<div class="resumeShow">
										<!--头像-->
										<div class="resumeImg">
											<img src="<?php echo $v['header_pic']?>"/>
										</div>
										<!--/#头像-->
										<!--简历信息-->
										<div class="resumeIntro">
											<h3>
												<a href="<?php echo $v['file']?>" target="_blank"><?php echo $v['username']?>的简历 <em></em></a>
											</h3>
											<span class="fr">投递时间：<?php echo date('Y-m-d H:i',$v['act_time'])?></span>
											<h3><?php echo $v['username']?> / <?php echo $v['sex']?> / <?php echo $v['education']?> / <?php echo $v['experience']?> / 广州<br /><?php echo $v['position']?> </h3>
											<div class="jdpublisher">
												<span class="">应聘职位: <span><?php echo $v['jname']?></span></span>
												<div class="links">
													状态 :
													<span>不合适</span>
												</div>
											</div>
										</div>
										<!--/#简历信息-->
									</div>
									<!--/#简历个人信息-->
									<!--联系电话,邮箱-->
									<div class="contactInfo">
										<span>电话：</span><?php echo $v['cellphone']?>&nbsp;&nbsp;&nbsp;
										<span>邮箱: </span><?php echo $v['email']?>
									</div>
									<!--/#联系电话,邮箱-->
								</li>
								<?php }?>
							<!--/#数据-->
							</ul>
							
               <?php }?>
						</form>
					</dd>
					<!--/#简历内容-->
				</dl>
				 </div>	
				 <!--中间主体内容 结束-->
			</div>
			<!--/#container-->
		
		
		
		<!--底部备案信息-->
		<footer>
			<div class="wrapper">
				<i></i>
				<div class="copyright">
					<a href="">京ICP备14023790号-2</a>
					<span>京公网安备11010802017116号</span>
				</div>
			</div>
		</footer>
	</body>
</html>
