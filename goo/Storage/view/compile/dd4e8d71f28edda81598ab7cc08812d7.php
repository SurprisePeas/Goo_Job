<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>职位管理  有效职位</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/createStyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/interviewStyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--顶端头部黑条-->
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
							<a href="<?php echo U('CompanyResume/index')?>">
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
			 		<dd><a href="<?php echo U('CompanyResume/index')?>">待处理简历</a></dd>
			 		<dd><a href="<?php echo U('CompanyResume/infoFace')?>">已通知面试简历</a></dd>
			 		<dd><a href="<?php echo U('CompanyResume/pass')?>">不合适简历</a></dd>
			 	</dl>
			 	
			 	<!--我发布的职位-->
			 	<dl class="company_center_aside">
			 		<dt>我发布的职位</dt>
			 		<dd class="current"><a href="<?php echo U('Job/index')?>">有效职位</a></dd>
			 		<dd><a href="<?php echo U('Job/recycleJob')?>">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl class="company_center_content">
				 	<dt class="dlTitle"><h1>有效职位<em></em><span>（共 <?php echo $countJobs?> 份）</span></h1></dt>
				 	<!--简历列表-->
					<dd>
						<form action="" method="get" id="searchForm">
							<?php if(empty($jobData)){?>
                
							<ul class="my_jobs">
								<center style="font-size: 20px;"><img src="./Public/home/imgs/noresult_95_9bde913.png" style="margin-top: 30px;"/>暂时没有符合该搜索条件的职位</center>
							</ul>
							<?php }else if(!empty($jobData)){?>
							<!--/#全选-->
							<ul class="my_jobs">
							<!--数据-->
								<?php foreach ($jobData as $job){?>
								<li>
									<h3><a href="<?php echo U('Job/content',array('jid'=>$job['jid']))?>" target="_blank"><?php echo $job['jname']?></a><span> [<?php echo $job['district_name']?>]</span></h3>
									<p><?php echo $job['nature']?> / <?php echo $job['money']?>k / <?php echo $job['experience']?> / <?php echo $job['education']?></p>
									<p class="color9">发布时间：<?php echo date('Y-m-d H:i:s',$job['pubdate'])?> </p>
									<div class="links fr">
										<a href="<?php echo U('Job/editJob',array('jid'=>$job['jid']))?>">编辑</a>
										<a href="javascript:;" outid="<?php echo $job['jid']?>" class="out">下线</a>
									</div>
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
			
			<!--ajax异步处理下线-->
			<script type="text/javascript">
				//-------为out下线a链接添加点击事件---------
				$(document).on('click','.out',function(){
					//获得a链接的outid属性值
					var data = $(this).attr('outid');
					//添加当前a标签所属的li索引值
					var hid = $(this).parent().parent().index();
					$.ajax({
						type:"post",
						//发送地址
						url:"<?php echo U('Job/out')?>",
						//我发过去的数据
						data:{jid:data},
						//数据类型JSON
						dataType:"JSON",
						//返回执行
						success:function(phpData){
							//让当前索引值的li隐藏
							$('.my_jobs li').eq(hid).hide();
						}
					});
				})
			</script>
		
		<!--底部备案信息-->
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
	</body>
</html>
