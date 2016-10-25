<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>我的投递记录</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/applyStyle/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/applyStyle/collect.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/applyStyle/delivery.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
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
						<a href="SurprisePeas" style="border-left: none;padding-left: 0;">
							首页 (∩_∩)
						</a>
					</li>
					<li>
						<a href="Company_adm.html">
							进入企业版
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
					                
					<!--<li>
						<a href="" style="border-left: none;">
							消息
						</a>
					</li>-->
					<li>
						<a href="Jobhunter_my.html">
							我的简历
						</a>
					</li>
					<li>
						<a href="Resume_box.html">
							投递箱
						</a>
					</li>
					<!--<li>
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Jobhunter&a=collect">
							收藏夹
						</a>
					</li>-->
					
               
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> xianshanghao001 </span>-->
						<span class="unick"> xianshanghao001 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Persona&a=index">
									账号设置
								</a>
							</li>
							<li>
								<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Company&a=index" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!---->


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
				<a href="SurprisePeas">
					<img src="./Public/home/imgs/logo_d0915a9.png" draggable="false"/>
				</a></h1>
			</div>
			<!--//首页公司-->
			<ul class="lg_tnav_wrap">
				<li>
					<a href="SurprisePeas" id="noBorder" class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
		<style type="text/css">
			#noBorder{
				border-bottom: none;
			}
		</style>
		<!--主体-->
		<div id="content">
			<div class="content_info">
				<!--已投递简历状态-->
				<div class="new_section fl">
					<dl>
						<dt><h1>已投递简历状态<em></em></h1></dt>
						<!--职位列表-->
						<dd>
							<div class="delivery_tabs">
								<!--标题头-->
								<ul class="reset">
									<li class="AllNo"><a href="<?php echo U('Jobhunter/send')?>">全部</a></li>
									<li><a href="<?php echo U('Jobhunter/suc')?>">投递成功</a></li>
									<li><a href="<?php echo U('Jobhunter/see')?>">被查看</a></li>
									<li><a href="<?php echo U('Jobhunter/infoFace')?>">邀请面试</a></li>
									<li class="current"><a href="<?php echo U('Jobhunter/pass')?>">不合适</a></li>
								</ul>
								<!--/#标题头-->
							</div>
							
							<!--未投递时状态显示-->
							<!--<div class="no_delivery">
								当前没有符合条件的投递记录
							</div>-->
							
							<!--投递的信息-->
							<form action="" method="post">
								<?php if(empty($actionData)){?>
                
								<!--/#没有数据时显示的内容-->
									<div class="no_delivery">当前没有符合条件的投递记录</div>
								<?php }else if(!empty($actionData)){?>
								<ul class="my_delivery">
									<!--数据-->
									<?php foreach ($actionData as $act){?>
									<li>
										<div class="d_item">
											<!--职位名称 薪资-->
											<h2>
												<a href="<?php echo U('Job/content',array('jid'=>$act['jid']))?>" target="_blank">
													<em><?php echo $act['jname']?></em>
													<span>（<?php echo $act['money']?>k）</span>
												</a>
											</h2>
											<!--/#职位名称 薪资-->

											<!--公司信息-->
											<a href="" class="d_jobname">
												<?php echo $act['cpname']?> <span>[<?php echo $act['city']?>]</span>
											</a>
											<!--/#公司信息-->
											<a href="javascript:;" class="btn_showprogress"><span><?php if($act['actioning']==1){?>
                投递成功<?php }else if($act['actioning']==2){?>已被查看<?php }else if($act['actioning']==3){?>邀请面试<?php }else if($act['actioning']==4){?>不合适
               <?php }?></span><i class="btn_closeprogress_jiantou"></i></a>
											<span class="d_time"><?php echo date('Y-m-d H:i:s',$act['act_time'])?></span>
											
										</div>
										<!--隐藏的简历进度信息-->
										<div class="progress_status">
											<!--图标 颜色-->
											<?php if($act['actioning']==1){?>
                
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==2){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==3){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==4){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											
               <?php }?>
											<style type="text/css">
												.green_line{
													background: #019875 !important;
												}
												.status_grey.bg_bottom{
													background-position: left top !important;
												}
											</style>
											
											
											<!--文字描述-->
											<ul class="status_text">
												<li class="">投递成功</li>
												<li class="status_text_2">简历被查看</li>
												<li class="status_text_3">待沟通</li>
											<?php if($act['actioning']==4){?>
                
												<li class="status_text_4">不合适</li>
											<?php }else if($act['actioning']!=4){?>
												<li class="status_text_4">面试</li>
											
               <?php }?>
											</ul>

											<!--时间,企业查看了简历-->
											<div class="status_list">
												<!--时间-->
												<div class="list_time">
													<em></em>
													<?php echo date('Y-m-d H:i:s',$act['act_time'])?>
												</div>
												<!--已成功-->
												<div class="list_body">
													<h3 class="contact_title"><?php echo $act['cpshortName']?> 
														<?php if($act['actioning']==1){?>
                
														已成功接收你的简历
														<?php }else if($act['actioning']==2){?>
														查看你的简历
														<?php }else if($act['actioning']==3){?>
														邀请你面试
														<?php }else if($act['actioning']==4){?>
														简历被标记为不合适
														
               <?php }?>
													</h3>
												</div>
												<a href="javascript:;" class="btn_closeprogress"></a>
											</div>
										</div>
										<!--/#隐藏的简历进度信息-->
									</li>
									<?php }?>
									<!--/#数据-->
								</ul>
								
               <?php }?>
							</form>
							<!--投递的信息-->
							
						</dd>
						<!--/#职位列表-->
					</dl>
					<!--/#全部-->
				</div>

				<!--/#右侧猜你喜欢-->
				<div class="content_r">
					<!--顶-->
					<div class="position_recommend">
						<ul class="position_head">
							<!--头标题-->
							<li class="guess_selected">猜你喜欢</li>
							<!--/#头标题-->
						</ul>
						<!--列表-->
						<div class="similar_content">
								<?php if(empty($actionData)){?>
                
								<div class="nodata_similar_list"></div>
								<style type="text/css">
									.nodata_similar_list{
									    background: #fbfbfb url(./Public/home/imgs/content/nodata_similar_list_3b4bc59.png) no-repeat;
									    width: 281px;
									    height: 150px;
									}
								</style>
								<?php }else if(!empty($actionData)){?>
								<ul class="guess_like">
									<!--数据-->
									<?php foreach ($guessData as $guess){?>
										<li class="guess_like_list_item">
											<a href="<?php echo U('Job/content',['jid'=>$guess['jid']])?>" target="_blank">
												<div class="guess_like_list_item_logo fl"><img src="<?php echo $guess['cplogo']?>" alt="<?php echo $guess['cpshortName']?>" /></div>
												<div class="guess_like_list_item_pos fl">
													<h2><?php echo $guess['jname']?></h2>
													<p><?php echo $guess['money']?>k</p>
													<p class="company_name">
														<span class="company_name_span"><?php echo $guess['cpshortName']?></span>
														<span class="company_position_span">[<?php echo $guess['allDis']?> · <?php echo $guess['district_name']?>]</span>
													</p>
												</div>
											</a>
										</li>
									<?php }?>
									<!--/#数据-->
								</ul>
								
               <?php }?>
						</div>
						<!--/#列表-->
					</div>
					<!--/#顶-->

				</div>
				<!--/#右侧猜你喜欢-->
				
			</div>
		</div>
		<!--主体-->

		<!--小火箭-->
		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: none;"></a>

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
