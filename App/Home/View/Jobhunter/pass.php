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
		{{include file="../Common/header"}}
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
									<li class="AllNo"><a href="{{U('Jobhunter/send')}}">全部</a></li>
									<li><a href="{{U('Jobhunter/suc')}}">投递成功</a></li>
									<li><a href="{{U('Jobhunter/see')}}">被查看</a></li>
									<li><a href="{{U('Jobhunter/infoFace')}}">邀请面试</a></li>
									<li class="current"><a href="{{U('Jobhunter/pass')}}">不合适</a></li>
								</ul>
								<!--/#标题头-->
							</div>
							
							<!--未投递时状态显示-->
							<!--<div class="no_delivery">
								当前没有符合条件的投递记录
							</div>-->
							
							<!--投递的信息-->
							<form action="" method="post">
								{{if value="empty($actionData)"}}
								<!--/#没有数据时显示的内容-->
									<div class="no_delivery">当前没有符合条件的投递记录</div>
								{{elseif value="!empty($actionData)"}}
								<ul class="my_delivery">
									<!--数据-->
									{{foreach from="$actionData" value="$act"}}
									<li>
										<div class="d_item">
											<!--职位名称 薪资-->
											<h2>
												<a href="{{U('Job/content',array('jid'=>$act['jid']))}}" target="_blank">
													<em>{{$act['jname']}}</em>
													<span>（{{$act['money']}}k）</span>
												</a>
											</h2>
											<!--/#职位名称 薪资-->

											<!--公司信息-->
											<a href="" class="d_jobname">
												{{$act['cpname']}} <span>[{{$act['city']}}]</span>
											</a>
											<!--/#公司信息-->
											<a href="javascript:;" class="btn_showprogress"><span>{{if value="$act['actioning'] eq 1"}}投递成功{{elseif value="$act['actioning'] eq 2"}}已被查看{{elseif value="$act['actioning'] eq 3"}}邀请面试{{elseif value="$act['actioning'] eq 4"}}不合适{{endif}}</span><i class="btn_closeprogress_jiantou"></i></a>
											<span class="d_time">{{date('Y-m-d H:i:s',$act['act_time'])}}</span>
											
										</div>
										<!--隐藏的简历进度信息-->
										<div class="progress_status">
											<!--图标 颜色-->
											{{if value="$act['actioning'] eq 1"}}
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											{{elseif value="$act['actioning'] eq 2"}}
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											{{elseif value="$act['actioning'] eq 3"}}
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											{{elseif value="$act['actioning'] eq 4"}}
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											{{endif}}
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
											{{if value="$act['actioning'] eq 4"}}
												<li class="status_text_4">不合适</li>
											{{elseif value="$act['actioning'] neq 4"}}
												<li class="status_text_4">面试</li>
											{{endif}}
											</ul>

											<!--时间,企业查看了简历-->
											<div class="status_list">
												<!--时间-->
												<div class="list_time">
													<em></em>
													{{date('Y-m-d H:i:s',$act['act_time'])}}
												</div>
												<!--已成功-->
												<div class="list_body">
													<h3 class="contact_title">{{$act['cpshortName']}} 
														{{if value="$act['actioning'] eq 1"}}
														已成功接收你的简历
														{{elseif value="$act['actioning'] eq 2"}}
														查看你的简历
														{{elseif value="$act['actioning'] eq 3"}}
														邀请你面试
														{{elseif value="$act['actioning'] eq 4"}}
														简历被标记为不合适
														{{endif}}
													</h3>
												</div>
												<a href="javascript:;" class="btn_closeprogress"></a>
											</div>
										</div>
										<!--/#隐藏的简历进度信息-->
									</li>
									{{endforeach}}
									<!--/#数据-->
								</ul>
								{{endif}}
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
								{{if value="empty($actionData)"}}
								<div class="nodata_similar_list"></div>
								<style type="text/css">
									.nodata_similar_list{
									    background: #fbfbfb url(./Public/home/imgs/content/nodata_similar_list_3b4bc59.png) no-repeat;
									    width: 281px;
									    height: 150px;
									}
								</style>
								{{elseif value="!empty($actionData)"}}
								<ul class="guess_like">
									<!--数据-->
									{{foreach from="$guessData" value="$guess"}}
										<li class="guess_like_list_item">
											<a href="{{U('Job/content',['jid'=>$guess['jid']])}}" target="_blank">
												<div class="guess_like_list_item_logo fl"><img src="{{$guess['cplogo']}}" alt="{{$guess['cpshortName']}}" /></div>
												<div class="guess_like_list_item_pos fl">
													<h2>{{$guess['jname']}}</h2>
													<p>{{$guess['money']}}k</p>
													<p class="company_name">
														<span class="company_name_span">{{$guess['cpshortName']}}</span>
														<span class="company_position_span">[{{$guess['allDis']}} · {{$guess['district_name']}}]</span>
													</p>
												</div>
											</a>
										</li>
									{{endforeach}}
									<!--/#数据-->
								</ul>
								{{endif}}
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
		{{include file="../Common/footer"}}

	</body>
</html>
