<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>列表页</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgListStyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/hunt.js" type="text/javascript" charset="utf-8"></script>
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
						<a href="http://localhost/goo/index.php?m=Home&c=Jobhunter&a=collect">
							收藏夹
						</a>
					</li>-->
					
               					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> geren1111 </span>-->
						<span class="unick"> 美国队长 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="Persona_user.html">
									账号设置
								</a>
							</li>
							<li>
								<a href="Company_adm.html" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://localhost/goo/index.php?m=Home&c=Login&a=out">
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
					<a href="http://localhost/goo/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
		<style type="text/css">
			.suggestCity{
				display: none !important;
			}
		</style>
		<!--主体区域盒子-->
		<div id="content-container">
			<!--顶 搜索栏-->
			<div class="search-wrapper">
				<div class="searchBar">
					<!--表单-->
					<div class="input-wrapper">
						<div class="keyword-wrapper">
							<input type="text" id="keyword" autocomplete="off" maxlength="64" placeholder="搜索职位、公司或地点" value="<?php echo $_GET['keyword']?>" class="ui-autocomplete-input">
						</div>
						<input type="button" name="submit" id="submit" value="搜索" />
					</div>
					<!--职位-->
					<div class="tab-wrapper"><a href="javascript:;">职位 ( <span><?php echo $countVal?></span>  ) </a></div>
				</div>
			</div>

			<!--筛选\内容显示区域-->
			<div class="main_container">
				<!--左侧主体大内容模板-->
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
									<!--隐藏 的工作地点深层选项内容   未完成-->
									<ul class="more more-positions workPosition">
										<li class="hot">
											<span class="title"> 工作地点  : </span>
											<?php foreach ($allDis as $k=>$showV){?>
												<?php
								                    $temp = $param;
							                     	$temp[1]='0';
								                    $temp[0] = $showV['plid'];
								                ?>
												<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[0]==$showV['plid']){?>
                class="active"
               <?php }?> class="hot-city-name" ><?php echo $showV['district_name']?></a>
											<?php }?>
										</li>
									</ul>
									<!--显示 的一行工作地点-->
									<div class="choose-detail">
										<!--标题 头-->
										<li class="position-head">
											<div class="current-handle-position">
												<span class="title"> 工作地点  : </span>
												<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
												<?php if($param[0]=='0'){?>
                
												<a href="<?php echo U('huntlist',['param'=>implode('_',$temp)])?>" <?php if($param[0]=='0'){?>
                class="current"
               <?php }?> class="current_city" style="margin-top: -1px;">全国</a>
												<?php }else if($param[0]!='0'){?>
												<a href="javascript:;"class="current" class="current_city" style="margin-top: -1px;"><?php echo $allData['ctname']?></a>
												
               <?php }?>
												<i class="right-arrow"></i>
											</div>
											<!--城市-->
											<div class="other-hot-city">
												<div class="city-wrapper">
													<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
													<?php if($param[0]!='0'){?>
                
													<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[0]=='0'){?>
                class="active"
               <?php }?> class="hot-city-name" >全国</a>
													
               <?php }?>
													<?php foreach ($hotCity as $k=>$showV){?>
													<?php
									                    $temp = $param;
								                     	$temp[1]='0';
									                    $temp[0] = $showV['plid'];
									                ?>
													<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[0]==$showV['plid']){?>
                class="active"
               <?php }?> class="hot-city-name" ><?php echo $showV['district_name']?></a>
													<?php }?>
												</div>
												<!--按钮更多-->
												<a href="javascript:;" class="btn-more" id="more-btn">更多&ensp;<i></i></a>
											</div>
										</li>
										<!--/#标题 头-->
										<?php if($param[0]!='0'){?>
                
											<!--区域area-->
											<li class="detail-district-area">
												<span class="title">行政区：</span>
												<?php $temp=$param; $temp[1] = '0'; ?>
												<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[1]=='0'){?>
                class="active"
               <?php }?>>不限</a>
												<?php foreach ($allData['son'] as $all){?>
													<?php
									                    $temp = $param;
						                                $temp[1] = $all['plid'];
						                            ?>
													<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[1]==$all['plid']){?>
                class="active"
               <?php }?>><?php echo $all['district_name']?></a>
												<?php }?>
											</li>
											<!--/#区域area-->
										
               <?php }?>
									</div>
								</div>
								<!--工作经验-->
								<li class="multi-chosen">
									<span class="title"> 工作经验  : </span>
									<?php $temp = $param; $temp[2] = '0'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[2] = '应届毕业生'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='应届毕业生'){?>
                class="active"
               <?php }?>>应届毕业生</a>
									<?php $temp = $param; $temp[2] = '3年及以下'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='3年及以下'){?>
                class="active"
               <?php }?>>3年及以下</a>
									<?php $temp = $param; $temp[2] = '3-5年'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='3-5年'){?>
                class="active"
               <?php }?>>3-5年</a>
									<?php $temp = $param; $temp[2] = '5-10年'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='5-10年'){?>
                class="active"
               <?php }?>>5-10年</a>
									<?php $temp = $param; $temp[2] = '10年以上'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[2]=='10年以上'){?>
                class="active"
               <?php }?>>10年以上</a>
								</li>
								<!--学历要求-->
								<li class="multi-chosen">
									<span class="title"> 学历要求  : </span>
									<?php $temp = $param; $temp[3] = '0'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[3]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[3] = '大专'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[3]=='大专'){?>
                class="active"
               <?php }?>>大专</a>
									<?php $temp = $param; $temp[3] = '本科'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[3]=='本科'){?>
                class="active"
               <?php }?>>本科</a>
									<?php $temp = $param; $temp[3] = '硕士'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[3]=='硕士'){?>
                class="active"
               <?php }?>>硕士</a>
									<?php $temp = $param; $temp[3] = '博士'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[3]=='博士'){?>
                class="active"
               <?php }?>>博士</a>
								</li>
								<!--融资阶段-->
								<li class="multi-chosen">
									<span class="title"> 融资阶段  : </span>
									<?php $temp = $param; $temp[4] = '0'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[4] = '未融资'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='未融资'){?>
                class="active"
               <?php }?>>未融资</a>
									<?php $temp = $param; $temp[4] = '天使轮'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='天使轮'){?>
                class="active"
               <?php }?>>天使轮</a>
									<?php $temp = $param; $temp[4] = 'A轮'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='A轮'){?>
                class="active"
               <?php }?>>A轮</a>
									<?php $temp = $param; $temp[4] = 'B轮'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='B轮'){?>
                class="active"
               <?php }?>>B轮</a>
									<?php $temp = $param; $temp[4] = 'C轮'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='C轮'){?>
                class="active"
               <?php }?>>C轮</a>
									<?php $temp = $param; $temp[4] = 'D轮及以上'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='D轮及以上'){?>
                class="active"
               <?php }?>>D轮及以上</a>
									<?php $temp = $param; $temp[4] = '上市公司'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='上市公司'){?>
                class="active"
               <?php }?>>上市公司</a>
									<?php $temp = $param; $temp[4] = '不需要融资'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[4]=='不需要融资'){?>
                class="active"
               <?php }?>>不需要融资</a>
								</li>
								<!--行业领域-->
								<li class="multi-chosen">
									<span class="title"> 行业领域  : </span>
									<?php $temp = $param; $temp[5] = '0'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='0'){?>
                class="active"
               <?php }?>>不限</a>
									<?php $temp = $param; $temp[5] = '硬件'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='硬件'){?>
                class="active"
               <?php }?>>硬件</a>
									<?php $temp = $param; $temp[5] = '移动互联网'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='移动互联网'){?>
                class="active"
               <?php }?>>移动互联网</a>
									<?php $temp = $param; $temp[5] = '电子商务'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='电子商务'){?>
                class="active"
               <?php }?>>电子商务</a>
									<?php $temp = $param; $temp[5] = '金融'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='金融'){?>
                class="active"
               <?php }?>>金融</a>
									<?php $temp = $param; $temp[5] = '企业服务'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='企业服务'){?>
                class="active"
               <?php }?>>企业服务</a>
									<?php $temp = $param; $temp[5] = '教育'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==6){?>
                class="active"
               <?php }?>>教育</a>
									<?php $temp = $param; $temp[5] = '文化娱乐'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]=='文化娱乐'){?>
                class="active"
               <?php }?>>文化娱乐</a>
									<?php $temp = $param; $temp[5] = '游戏'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==8){?>
                class="active"
               <?php }?>>游戏</a>
									<?php $temp = $param; $temp[5] = 'O2O'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==9){?>
                class="active"
               <?php }?>>O2O</a>
									<?php $temp = $param; $temp[5] = '社交网络'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==10){?>
                class="active"
               <?php }?>>社交网络</a>
									<?php $temp = $param; $temp[5] = '旅游'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==11){?>
                class="active"
               <?php }?>>旅游</a>
									<?php $temp = $param; $temp[5] = '医疗健康'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==12){?>
                class="active"
               <?php }?>>医疗健康</a>
									<?php $temp = $param; $temp[5] = '生活服务'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==13){?>
                class="active"
               <?php }?>>生活服务</a>
									<?php $temp = $param; $temp[5] = '信息安全'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==14){?>
                class="active"
               <?php }?>>信息安全</a>
									<?php $temp = $param; $temp[5] = '数据服务'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==15){?>
                class="active"
               <?php }?>>数据服务</a>
									<?php $temp = $param; $temp[5] = '广告营销'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==16){?>
                class="active"
               <?php }?>>广告营销</a>
									<?php $temp = $param; $temp[5] = '分类信息'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==17){?>
                class="active"
               <?php }?>>分类信息</a>
									<?php $temp = $param; $temp[5] = '招聘'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==18){?>
                class="active"
               <?php }?>>招聘</a>
									<?php $temp = $param; $temp[5] = '其他'; ?>
									<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[5]==19){?>
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
										<?php $temp = $param; $temp[6] = '0'; ?>
										<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[6]=='0'){?>
                class="active"
               <?php }?>>默认</a>
										<?php $temp = $param; $temp[6] = '1'; ?>
										<a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>" <?php if($param[6]=='1'){?>
                class="active"
               <?php }?>>最新</a>

								</div>
								<!--月薪-->
								<div class="item selectUI salary">
									<span class="title">月薪 :&ensp;</span>
									<!--下拉框-->
									<div class="selectUI-text text">
										<span><?php echo $param[7] ?$param[7]:'不限' ?></span>
										<i></i>
										<ul class="money_hunt">
											<?php $temp = $param; $temp[7] = '0'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">不限</a></li>
											<?php $temp = $param; $temp[7] = '2k以下'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">2k以下</a></li>
											<?php $temp = $param; $temp[7] = '2k-5k'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">2k-5k</a></li>
											<?php $temp = $param; $temp[7] = '5k-10k'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">5k-10k</a></li>
											<?php $temp = $param; $temp[7] = '10k-15k'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">10k-15k</a></li>
											<?php $temp = $param; $temp[7] = '15k-25k'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">15k-25k</a></li>
											<?php $temp = $param; $temp[7] = '25k-50k'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">25k-50k</a></li>
											<?php $temp = $param; $temp[7] = '50k以上'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">50k以上</a></li>
										</ul>
									</div>
								</div>
								<!--工作性质-->
								<div class="item type selectUI">
									<span class="title">工作性质 :&ensp;</span>
									<!--下拉框-->
									<div class="selectUI-text text">
										<span><?php echo $param[8] ?$param[8]:'不限' ?></span>
										<i></i>
										<ul>
											<?php $temp = $param; $temp[8] = '0'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">不限</a></li>
											<?php $temp = $param; $temp[8] = '全职'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">全职</a></li>
											<?php $temp = $param; $temp[8] = '兼职'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">兼职</a></li>
											<?php $temp = $param; $temp[8] = '实习'; ?>
											<li><a href="<?php echo U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])?>">实习</a></li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<!--筛选条件-->

					<!--筛选内容-->
					<div class="s_position_list">
						<ul class="item_con_list">
							<!--数据-->
							<?php foreach ($jobData as $v){?>
								<li class="con_list_item">
									<!--上部分-->
									<div class="list_item_top">
										<!--左-->
										<div class="position">
											<!--职位名称-->
											<div class="p_top">
												<a href="<?php echo U('Job/content',array('jid'=>$v['jid']))?>" target="_blank"><h2><?php echo $v['jname']?></h2><span class="add">[<?php echo $v['district_name']?>]</span></a>
												<!--时间-->
												<span class="format-time"><?php echo date('m-d H:i',$v['pubdate'])?>发布</span>
											</div>
											<!--薪资,要求-->
											<div class="p_bot">
												<span class="smoney"><?php echo $v['money']?>k</span>
												<div class="li_b_l">
													经验<?php echo $v['experience']?>年
													/
													<span><?php echo $v['education']?></span>
												</div>
											</div>
										</div>
										<!--右-->
										<div class="company">
												<div class="company_name"><a href="<?php echo U('Company/indexShow',array('cpid'=>$v['cpid']))?>" target="_blank"><?php echo $v['cpshortName']?></a></div>
												<div class="industry"><span><?php echo $v['industry']?> </span> / <span><?php echo $v['financing']?></span></div>
										</div>
										<!--企业logo-->
										<div class="com_logo">
											<a href="<?php echo U('Company/indexShow',array('cpid'=>$v['cpid']))?>" target="_blank"><img src="<?php echo $v['cplogo']?$v['cplogo']:'./Public/home/imgs/moren/minion.png'?>" alt="<?php echo $v['cpname']?>" draggable="false" width="60px" height="60px" /></a>
										</div>
									</div>

									<!--下部分-->
									<div class="list_item_bot">
										<div class="li_b_l"><?php echo $v['tempt']?></div>
										<!--<div class="li_b_r"><span>股票期权</span><span>绩效奖金</span><span>五险一金</span></div>-->
										<div class="li_b_r"><span><?php echo $v['cpintro']?$v['cpintro']:'这家伙儿很懒!'?></span></div>
									</div>
								</li>
							<?php }?>
							<!--/#数据-->

							<div class="empty_position" <?php if(!empty($jobData)){?>
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



						<!--底部相关搜索推荐-->
						<div class="related_search hide-recom">
							<p>热门搜索 :</p>
							<ul class="r_search_con">
								<?php foreach ($hotJob as $hot){?>
									<a href="<?php echo U('Job/content',['jid'=>$hot['jid']])?>" target="_blank" class="r_search_item"><?php echo $hot['jname']?></a>
								<?php }?>
							</ul>
							<!--展开显示更多推荐 按钮  暂时不做-->
						</div>
						<!--底部相关搜索推荐 结束-->

						<!--分页  未做,后台框架引用-->
						<!--<style type="text/css">
							#self-page ul.pagination li{
								background: #ccc;
								margin-left: 3px;
							}
						</style>
						<center id="self-page">
							<ul class="pagination">
								<?php echo $page?>
							</ul>
						</center>-->
						<!--分页结束-->
					</div>
				</div>
				<!--左侧主体大内容 结束-->

				<!--右侧 最近浏览 记录-->
				<div class="content_right">
					<div class="history">
						<h2>最近浏览过</h2>
						<ul class="position_list">
							<?php if($recently!=''){?>
                
							<li class="p_list_item">
								<div class="position_link">
									<a href="<?php echo U('Job/content',array('jid'=>$recently['jid']))?>" class="name" target="_blank"><?php echo $recently['jname']?></a>
									<p class="salary"><?php echo $recently['money']?>k</p>
									<p class="c_name"><?php echo $recently['cpshortName']?$recently['cpshortName']:$recently['cpname']?></p>
								</div>
							</li>
							<?php }else if($recently==''){?>
							<p style="line-height: 50px;text-align: center;">还没有记录</p>
							
               <?php }?>
						</ul>
					</div>
				</div>
				<!--右侧 最近浏览 记录  结束-->
			</div>
		</div>

		<!--返回顶部-->
		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>
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