<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>人潮人海中-有你有我-SurprisePeas</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgListStyle.css"/>

		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/companylist.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/list.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/list.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/hunt.js" type="text/javascript" charset="utf-8"></script>
		
	</head>
	<body>
		<!--顶部黑色区域-->
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
										<li>
						<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=index" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=register"  target="_blank">
							注册
						</a>
					</li>
					
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
					<a href="SurprisePeas" id="noBorder"                class=""
                class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Index&a=companylist"                  class="current"
               >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>	

	<!--中间主体部分-->
	<div id="content-container">
		<!--筛选主体部分-->
		<div id="center_container" class="main_container">
			<!--左侧-->
			<div class="content_left">
				<div class="content_left">
					<!--筛选条件-->
					<div id="positionHead">
						<!--筛选标签-->
						<ul id="filterBox" class="filter-wrapper">
							<!--隐藏put,GET参数筛选-->
							<input type="hidden" name="" id="filterOption" value="" />
							<!--收起后显示的筛选信息-->
							<li class="li-taller"></li>
							<!--标签选择-->
							<div class="details">
								<!--工作地点-更多-->
								<div class="has-more">
									<!--显示 的一行工作地点-->
									<div class="choose-detail">
										<!--标题 头-->
										<li class="position-head">
											<div class="current-handle-position">
												<span class="title"> 工作地点  : </span>
												<!--左列-->
												<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
												<?php if($param[0]=='0'){?>
                
												<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[0]=='0'){?>
                class="current"
               <?php }?> class="current_city" style="margin-top: -1px;">全国</a>
												<?php }else if($param[0]!='0'){?>
												<a href="javascript:;"class="current" class="current_city" style="margin-top: -1px;"><?php echo $SQname?></a>
												
               <?php }?>
												<i class="right-arrow"></i>
												<!--/#左列-->
											</div>
											<!--城市-->
											
											<div class="other-hot-city">
												<div class="city-wrapper">
													<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
													<?php if($param[0]!='0'){?>
                
													<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[0]=='0'){?>
                class="active"
               <?php }?> class="hot-city-name" >全国</a>
													
               <?php }?>
													<!--市区-->
													<?php foreach ($SQdata as $showV){?>
														<?php
										                    $temp = $param;
									                     	$temp[1]='0';
										                    $temp[0] = $showV['plid'];
										                ?>
														<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[0]==$showV['plid']){?>
                class="active"
               <?php }?> class="hot-city-name" ><?php echo $showV['district_name']?></a>
													<?php }?>
													<!--/#市区-->
												</div>
												<!--按钮更多-->
												<a href="javascript:;" class="btn-more" id="more-btn">更多&ensp;<i></i></a>
											</div>
										</li>
									</div>
									
									<!--hover 隐藏 的工作地点   未完成-->
									<ul class="more more-positions workPosition">
										<li class="hot">
											<span class="title"> 工作地点  : </span>
											<?php foreach ($disData['disHidData'] as $k=>$showV){?>
												<?php
								                    $temp = $param;
							                     	$temp[1]='0';
								                    $temp[0] = $showV['plid'];
								                ?>
												<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[0]==$showV['plid']){?>
                class="active"
               <?php }?> class="hot-city-name" ><?php echo $showV['district_name']?></a>
											<?php }?>
										</li>
									</ul>
									<!--/#hover隐藏的工作地点-->
								</div>
								
								<!--融资阶段-->
								<li class="multi-chosen">
									<span class="title"> 融资阶段  : </span>
									<?php $temp = $param; $temp[1] = '0'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[1] = '未融资'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='未融资'){?>
                class="active"
               <?php }?>>未融资</a>
									<?php $temp = $param; $temp[1] = '天使轮'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='天使轮'){?>
                class="active"
               <?php }?>>天使轮</a>
									<?php $temp = $param; $temp[1] = 'A轮'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='A轮'){?>
                class="active"
               <?php }?>>A轮</a>
									<?php $temp = $param; $temp[1] = 'B轮'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='B轮'){?>
                class="active"
               <?php }?>>B轮</a>
									<?php $temp = $param; $temp[1] = 'C轮'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='C轮'){?>
                class="active"
               <?php }?>>C轮</a>
									<?php $temp = $param; $temp[1] = 'D轮及以上'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='D轮及以上'){?>
                class="active"
               <?php }?>>D轮及以上</a>
									<?php $temp = $param; $temp[1] = '上市公司'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='上市公司'){?>
                class="active"
               <?php }?>>上市公司</a>
									<?php $temp = $param; $temp[1] = '不需要融资'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[1]=='不需要融资'){?>
                class="active"
               <?php }?>>不需要融资</a>
								</li>
								<!--行业领域-->
								<li class="multi-chosen">
									<span class="title"> 行业领域  : </span>
									<?php $temp = $param; $temp[2] = '0'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[2] = '硬件'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='硬件'){?>
                class="active"
               <?php }?>>硬件</a>
									<?php $temp = $param; $temp[2] = '移动互联网'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='移动互联网'){?>
                class="active"
               <?php }?>>移动互联网</a>
									<?php $temp = $param; $temp[2] = '电子商务'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='电子商务'){?>
                class="active"
               <?php }?>>电子商务</a>
									<?php $temp = $param; $temp[2] = '金融'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='金融'){?>
                class="active"
               <?php }?>>金融</a>
									<?php $temp = $param; $temp[2] = '企业服务'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='企业服务'){?>
                class="active"
               <?php }?>>企业服务</a>
									<?php $temp = $param; $temp[2] = '教育'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='教育'){?>
                class="active"
               <?php }?>>教育</a>
									<?php $temp = $param; $temp[2] = '文化娱乐'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='文化娱乐'){?>
                class="active"
               <?php }?>>文化娱乐</a>
									<?php $temp = $param; $temp[2] = '游戏'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='游戏'){?>
                class="active"
               <?php }?>>游戏</a>
									<?php $temp = $param; $temp[2] = 'O2O'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='O2O'){?>
                class="active"
               <?php }?>>O2O</a>
									<?php $temp = $param; $temp[2] = '社交网络'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='社交网络'){?>
                class="active"
               <?php }?>>社交网络</a>
									<?php $temp = $param; $temp[2] = '旅游'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='旅游'){?>
                class="active"
               <?php }?>>旅游</a>
									<?php $temp = $param; $temp[2] = '医疗健康'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='医疗健康'){?>
                class="active"
               <?php }?>>医疗健康</a>
									<?php $temp = $param; $temp[2] = '生活服务'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='生活服务'){?>
                class="active"
               <?php }?>>生活服务</a>
									<?php $temp = $param; $temp[2] = '信息安全'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='信息安全'){?>
                class="active"
               <?php }?>>信息安全</a>
									<?php $temp = $param; $temp[2] = '数据服务'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='数据服务'){?>
                class="active"
               <?php }?>>数据服务</a>
									<?php $temp = $param; $temp[2] = '广告营销'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='广告营销'){?>
                class="active"
               <?php }?>>广告营销</a>
									<?php $temp = $param; $temp[2] = '分类信息'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='分类信息'){?>
                class="active"
               <?php }?>>分类信息</a>
									<?php $temp = $param; $temp[2] = '招聘'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='招聘'){?>
                class="active"
               <?php }?>>招聘</a>
									<?php $temp = $param; $temp[2] = '其他'; ?>
									<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[2]=='其他'){?>
                class="active"
               <?php }?>>其他</a>
								</li>
							</div>

						</ul>
						<!--收起筛选项-->
						<!--<div class="btn-collapse-wrapper"><a href="javascript:;" class="btn-collapse" title="收起筛选条件"></a></div>-->
						<!--排序-->
						<ul id="order">
							<li class="wrapper">
								<!--排序-->
								<div class="item order">
									<span class="title">
										排序方式 :&ensp;
									</span>
										<?php $temp = $param; $temp[3] = '0'; ?>
										<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[3]=='0'){?>
                class="active"
               <?php }?>>默认排序</a>
										<?php $temp = $param; $temp[3] = '1'; ?>
										<a href="<?php echo U('companylist',['param'=>implode('_',$temp)])?>" <?php if($param[3]=='1'){?>
                class="active"
               <?php }?>>职位数量</a>
								</div>
								
								<!--右侧分页-->
								<div class="item page">
									<div class="nb prev"></div>
									<div class="nb next"></div>
									<div class="page-number">
										<!--<span class="curNum">2</span>
										/
										<span class="totalNum">30</span>-->
									</div>
								</div>
							</li>
						</ul>
					</div>
					<!--筛选条件-->


					<!--筛选内容-->
					<div class="s_position_list">
						<!--公司列表-->
						<div id="companyList">
							<ul class="cm_ul">
								<?php foreach ($allcomData as $v){?>
								<li class="fl">
									<dl class="cm_cont">
										<dt class="fl">
											<a href="<?php echo U('Company/indexShow',array('cpid'=>$v['cpid']))?>" target="_blank">
												<img src="<?php echo $v['cplogo']?$v['cplogo']:'./Public/home/imgs/moren/minion.png'?>"/>
											</a>
										</dt>
										<dd class="fr">
											<h3>
												<a href="<?php echo U('Company/indexShow',array('cpid'=>$v['cpid']))?>" target="_blank"><?php echo $v['cpshortName']?$v['cpshortName']:$v['cpname']?></a>
											</h3>
											<div class="sub_title">
												<p>
													<a href="<?php echo U('Company/jobsShow',array('cpid'=>$v['cpid']))?>" target="_blank">
														<span><?php echo $v['job_count']?></span>
														在招职位
													</a>
												</p>
											</div>
										</dd>
										<p class="someth" title="<?php echo $v['cpintro']?>"><?php echo $v['cpintro']?></p>
									</dl>
									<div class="cm_msg">
										<span class="web fl" title="<?php echo $v['industry']?>">
											<i></i>
											<?php echo $v['industry']?>
										</span>
										<span class="place fr" title="<?php echo $v['cpaddress']?>">
											<i></i>
											<?php echo $v['cpaddress']?>
										</span>
										<span class="type" title="<?php echo $v['financing']?>">
											<i></i>
											<?php echo $v['financing']?>
										</span>
									</div>
								</li>
								<?php }?>
							</ul>
						</div>
						
						<!--为空时显示的信息-->
						<ul class="item_con_list">
							<div class="empty_position" <?php if(!empty($allcomData)){?>
                 style="display: none;" 
               <?php }?>>
								<div class="pic"></div>
								<div class="txt">
									<div>暂时没有符合该搜索条件的职位</div>
									<span>请重新修改搜索条件后再进行搜索</span>
								</div>
							</div>
						</ul>
						<!--查询列表信息结束-->
					</div>
				</div>
				<!--筛选主体部分结束-->
				
				<!--分页  未做,后台框架引用-->
<!--				<?php echo $page?>
-->			<!--分页结束-->
			</div>
		</div>
	</div>
		<!--中间主体部分结束-->

	<!--回到顶部-->
	<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>
	<!--回到顶部结束-->
	<?php if(empty($_SESSION['info'])){?>
                
				
<!--底部登录条-->
		<div id="logintool">
			<div>
				<em></em>
				<img src="./Public/home/imgs/login/footbar_logo_e2fde1b.png"/>
				<!--<span class="companycount"> <i style="background-position-y: -30px;"></i><i style="background-position-y: -60px;"></i><i style="background-position-y: -60px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: -180px;"></i><i style="background-position-y: -60px;"></i> </span>
				<span class="jobscount"> <i style="background-position-y: -30px;"></i><b></b><i style="background-position-y: -240px;"></i><i style="background-position-y: -90px;"></i><i style="background-position-y: -270px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: 0px;"></i><i style="background-position-y: 0px;"></i> </span>-->
				<span class="companycount"> 9</span>
				<span class="jobscount">36</span>
				
				<a href="javascript:;" class="bar_login">
					<i></i>
				</a>
				<div class="lt_r">
					<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=register" target="_blank">
						<i></i>
					</a>
				</div>
			</div>
		</div>
		<!--底部登录条结束-->

		<!--登录界面部分-->
		<div id="all_cover"></div>
		<div id="colorbox">
			<div id="box_m">
				<div class="box_content">
					<div class="bctitle">
						登录
					</div>
					<div class="bcdown">
						<div class="bcdcenter">
							<form id="bcd_login" action="javascript:;" method="">
								<div class="username">
									<input type="text" id="email" name="account" maxlength="16" placeholder="请输入登录账号" />
									<span id="input_tips"></span>
								</div>
								<div class="password">
									<input type="password" id="ipassword" maxlength="16" name="password" placeholder="请输入密码" />
									<span id="input_tips"></span>
								</div>
								<p style="color: red;line-height: 13px;display: none;" id="msg_p"><img src="./Public/home/imgs/error.png"/>账号和密码不匹配</p><br />
								<!--<a href="" id="foget" target="_blank">
									忘记密码？
								</a>-->
								<input type="submit" value="登     录" id="sub_btn"/>
							</form>
							<script type="text/javascript">
								$("#bcd_login").submit(function(){
									var allre = $("#bcd_login").serialize();
									$.ajax({
										type:"post",
										url:"http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=modalAjax",
										dataType:"JSON",
										data:allre,
										success:function(phpData){
											if(phpData){
												window.location.reload();
											}else{
												$(".password #input_tips").hide();
												$("#msg_p").show();
											}
										}
									});
								})
							</script>
							<div class="bcd_right">
								<div>
									还没有拉勾帐号？
								</div>
								<a href="http://localhost/lagou_rbac_new/index.php?m=Home&c=Login&a=register" class="registor_now" target="_blank">
									立即注册
								</a>
								<div class="login_others">
									使用以下帐号直接登录:
								</div>
								<a href="javascript:alert('功能即将开通,敬请期待');" id="icon_wb"></a>
								<a href="javascript:alert('功能即将开通,敬请期待');" id="icon_qq"></a>
							</div>
						</div>
					</div>
					<input type="button" id="close"/>
				</div>
			</div>
		</div>
		<!--登录界面部分结束-->
		
               <?php }?>
		
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
</footer>	<!--/#登录界面部分结束-->
	</body>
</html>

















