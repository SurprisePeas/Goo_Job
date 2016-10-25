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
	{{include file="../Common/header"}}	

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
												{{if value="$param[0] eq '0'"}}
												<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[0] eq '0'"}}class="current"{{endif}} class="current_city" style="margin-top: -1px;">全国</a>
												{{elseif value="$param[0] neq '0'"}}
												<a href="javascript:;"class="current" class="current_city" style="margin-top: -1px;">{{$SQname}}</a>
												{{endif}}
												<i class="right-arrow"></i>
												<!--/#左列-->
											</div>
											<!--城市-->
											
											<div class="other-hot-city">
												<div class="city-wrapper">
													<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
													{{if value="$param[0] neq '0'"}}
													<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[0] eq '0'"}}class="active"{{endif}} class="hot-city-name" >全国</a>
													{{endif}}
													<!--市区-->
													{{foreach from="$SQdata" value="$showV"}}
														<?php
										                    $temp = $param;
									                     	$temp[1]='0';
										                    $temp[0] = $showV['plid'];
										                ?>
														<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[0] eq $showV['plid']"}}class="active"{{endif}} class="hot-city-name" >{{$showV['district_name']}}</a>
													{{endforeach}}
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
											{{foreach from="$disData['disHidData']" key="$k" value="$showV"}}
												<?php
								                    $temp = $param;
							                     	$temp[1]='0';
								                    $temp[0] = $showV['plid'];
								                ?>
												<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[0] eq $showV['plid']"}}class="active"{{endif}} class="hot-city-name" >{{$showV['district_name']}}</a>
											{{endforeach}}
										</li>
									</ul>
									<!--/#hover隐藏的工作地点-->
								</div>
								
								<!--融资阶段-->
								<li class="multi-chosen">
									<span class="title"> 融资阶段  : </span>
									<?php $temp = $param; $temp[1] = '0'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[1] = '未融资'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '未融资'"}}class="active"{{endif}}>未融资</a>
									<?php $temp = $param; $temp[1] = '天使轮'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '天使轮'"}}class="active"{{endif}}>天使轮</a>
									<?php $temp = $param; $temp[1] = 'A轮'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq 'A轮'"}}class="active"{{endif}}>A轮</a>
									<?php $temp = $param; $temp[1] = 'B轮'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq 'B轮'"}}class="active"{{endif}}>B轮</a>
									<?php $temp = $param; $temp[1] = 'C轮'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq 'C轮'"}}class="active"{{endif}}>C轮</a>
									<?php $temp = $param; $temp[1] = 'D轮及以上'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq 'D轮及以上'"}}class="active"{{endif}}>D轮及以上</a>
									<?php $temp = $param; $temp[1] = '上市公司'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '上市公司'"}}class="active"{{endif}}>上市公司</a>
									<?php $temp = $param; $temp[1] = '不需要融资'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '不需要融资'"}}class="active"{{endif}}>不需要融资</a>
								</li>
								<!--行业领域-->
								<li class="multi-chosen">
									<span class="title"> 行业领域  : </span>
									<?php $temp = $param; $temp[2] = '0'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[2] = '硬件'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '硬件'"}}class="active"{{endif}}>硬件</a>
									<?php $temp = $param; $temp[2] = '移动互联网'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '移动互联网'"}}class="active"{{endif}}>移动互联网</a>
									<?php $temp = $param; $temp[2] = '电子商务'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '电子商务'"}}class="active"{{endif}}>电子商务</a>
									<?php $temp = $param; $temp[2] = '金融'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '金融'"}}class="active"{{endif}}>金融</a>
									<?php $temp = $param; $temp[2] = '企业服务'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '企业服务'"}}class="active"{{endif}}>企业服务</a>
									<?php $temp = $param; $temp[2] = '教育'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '教育'"}}class="active"{{endif}}>教育</a>
									<?php $temp = $param; $temp[2] = '文化娱乐'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '文化娱乐'"}}class="active"{{endif}}>文化娱乐</a>
									<?php $temp = $param; $temp[2] = '游戏'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '游戏'"}}class="active"{{endif}}>游戏</a>
									<?php $temp = $param; $temp[2] = 'O2O'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq 'O2O'"}}class="active"{{endif}}>O2O</a>
									<?php $temp = $param; $temp[2] = '社交网络'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '社交网络'"}}class="active"{{endif}}>社交网络</a>
									<?php $temp = $param; $temp[2] = '旅游'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '旅游'"}}class="active"{{endif}}>旅游</a>
									<?php $temp = $param; $temp[2] = '医疗健康'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '医疗健康'"}}class="active"{{endif}}>医疗健康</a>
									<?php $temp = $param; $temp[2] = '生活服务'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '生活服务'"}}class="active"{{endif}}>生活服务</a>
									<?php $temp = $param; $temp[2] = '信息安全'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '信息安全'"}}class="active"{{endif}}>信息安全</a>
									<?php $temp = $param; $temp[2] = '数据服务'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '数据服务'"}}class="active"{{endif}}>数据服务</a>
									<?php $temp = $param; $temp[2] = '广告营销'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '广告营销'"}}class="active"{{endif}}>广告营销</a>
									<?php $temp = $param; $temp[2] = '分类信息'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '分类信息'"}}class="active"{{endif}}>分类信息</a>
									<?php $temp = $param; $temp[2] = '招聘'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '招聘'"}}class="active"{{endif}}>招聘</a>
									<?php $temp = $param; $temp[2] = '其他'; ?>
									<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '其他'"}}class="active"{{endif}}>其他</a>
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
										<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '0'"}}class="active"{{endif}}>默认排序</a>
										<?php $temp = $param; $temp[3] = '1'; ?>
										<a href="{{U('companylist',['param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '1'"}}class="active"{{endif}}>职位数量</a>
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
								{{foreach from="$allcomData" value="$v"}}
								<li class="fl">
									<dl class="cm_cont">
										<dt class="fl">
											<a href="{{U('Company/indexShow',array('cpid'=>$v['cpid']))}}" target="_blank">
												<img src="{{$v['cplogo']?$v['cplogo']:'./Public/home/imgs/moren/minion.png'}}"/>
											</a>
										</dt>
										<dd class="fr">
											<h3>
												<a href="{{U('Company/indexShow',array('cpid'=>$v['cpid']))}}" target="_blank">{{$v['cpshortName']?$v['cpshortName']:$v['cpname']}}</a>
											</h3>
											<div class="sub_title">
												<p>
													<a href="{{U('Company/jobsShow',array('cpid'=>$v['cpid']))}}" target="_blank">
														<span>{{$v['job_count']}}</span>
														在招职位
													</a>
												</p>
											</div>
										</dd>
										<p class="someth" title="{{$v['cpintro']}}">{{$v['cpintro']}}</p>
									</dl>
									<div class="cm_msg">
										<span class="web fl" title="{{$v['industry']}}">
											<i></i>
											{{$v['industry']}}
										</span>
										<span class="place fr" title="{{$v['cpaddress']}}">
											<i></i>
											{{$v['cpaddress']}}
										</span>
										<span class="type" title="{{$v['financing']}}">
											<i></i>
											{{$v['financing']}}
										</span>
									</div>
								</li>
								{{endforeach}}
							</ul>
						</div>
						
						<!--为空时显示的信息-->
						<ul class="item_con_list">
							<div class="empty_position" {{if value="!empty($allcomData)"}} style="display: none;" {{endif}}>
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
<!--				{{$page}}
-->			<!--分页结束-->
			</div>
		</div>
	</div>
		<!--中间主体部分结束-->

	<!--回到顶部-->
	<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>
	<!--回到顶部结束-->
	{{if value="empty($_SESSION['info'])"}}
			{{include file="../Common/footerLogin"}}
		<!--登录界面部分结束-->
		{{endif}}
		
	<!--底部备案信息-->
	{{include file="../Common/footer"}}	<!--/#登录界面部分结束-->
	</body>
</html>

















