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
		{{include file="../Common/header"}}
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
							<input type="text" id="keyword" autocomplete="off" maxlength="64" placeholder="搜索职位、公司或地点" value="{{$_GET['keyword']}}" class="ui-autocomplete-input">
						</div>
						<input type="button" name="submit" id="submit" value="搜索" />
					</div>
					<!--职位-->
					<div class="tab-wrapper"><a href="javascript:;">职位 ( <span>{{$countVal}}</span>  ) </a></div>
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
											{{foreach from="$allDis" key="$k" value="$showV"}}
												<?php
								                    $temp = $param;
							                     	$temp[1]='0';
								                    $temp[0] = $showV['plid'];
								                ?>
												<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[0] eq $showV['plid']"}}class="active"{{endif}} class="hot-city-name" >{{$showV['district_name']}}</a>
											{{endforeach}}
										</li>
									</ul>
									<!--显示 的一行工作地点-->
									<div class="choose-detail">
										<!--标题 头-->
										<li class="position-head">
											<div class="current-handle-position">
												<span class="title"> 工作地点  : </span>
												<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
												{{if value="$param[0] eq '0'"}}
												<a href="{{U('huntlist',['param'=>implode('_',$temp)])}}" {{if value="$param[0] eq '0'"}}class="current"{{endif}} class="current_city" style="margin-top: -1px;">全国</a>
												{{elseif value="$param[0] neq '0'"}}
												<a href="javascript:;"class="current" class="current_city" style="margin-top: -1px;">{{$allData['ctname']}}</a>
												{{endif}}
												<i class="right-arrow"></i>
											</div>
											<!--城市-->
											<div class="other-hot-city">
												<div class="city-wrapper">
													<?php $temp = $param; $temp[0] = '0'; $temp[1]='0'; ?>
													{{if value="$param[0] neq '0'"}}
													<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[0] eq '0'"}}class="active"{{endif}} class="hot-city-name" >全国</a>
													{{endif}}
													{{foreach from="$hotCity" key="$k" value="$showV"}}
													<?php
									                    $temp = $param;
								                     	$temp[1]='0';
									                    $temp[0] = $showV['plid'];
									                ?>
													<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[0] eq $showV['plid']"}}class="active"{{endif}} class="hot-city-name" >{{$showV['district_name']}}</a>
													{{endforeach}}
												</div>
												<!--按钮更多-->
												<a href="javascript:;" class="btn-more" id="more-btn">更多&ensp;<i></i></a>
											</div>
										</li>
										<!--/#标题 头-->
										{{if value="$param[0] neq '0'"}}
											<!--区域area-->
											<li class="detail-district-area">
												<span class="title">行政区：</span>
												<?php $temp=$param; $temp[1] = '0'; ?>
												<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[1] eq '0'"}}class="active"{{endif}}>不限</a>
												{{foreach from="$allData['son']" value="$all"}}
													<?php
									                    $temp = $param;
						                                $temp[1] = $all['plid'];
						                            ?>
													<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[1] eq $all['plid']"}}class="active"{{endif}}>{{$all['district_name']}}</a>
												{{endforeach}}
											</li>
											<!--/#区域area-->
										{{endif}}
									</div>
								</div>
								<!--工作经验-->
								<li class="multi-chosen">
									<span class="title"> 工作经验  : </span>
									<?php $temp = $param; $temp[2] = '0'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[2] = '应届毕业生'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '应届毕业生'"}}class="active"{{endif}}>应届毕业生</a>
									<?php $temp = $param; $temp[2] = '3年及以下'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '3年及以下'"}}class="active"{{endif}}>3年及以下</a>
									<?php $temp = $param; $temp[2] = '3-5年'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '3-5年'"}}class="active"{{endif}}>3-5年</a>
									<?php $temp = $param; $temp[2] = '5-10年'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '5-10年'"}}class="active"{{endif}}>5-10年</a>
									<?php $temp = $param; $temp[2] = '10年以上'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[2] eq '10年以上'"}}class="active"{{endif}}>10年以上</a>
								</li>
								<!--学历要求-->
								<li class="multi-chosen">
									<span class="title"> 学历要求  : </span>
									<?php $temp = $param; $temp[3] = '0'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[3] = '大专'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '大专'"}}class="active"{{endif}}>大专</a>
									<?php $temp = $param; $temp[3] = '本科'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '本科'"}}class="active"{{endif}}>本科</a>
									<?php $temp = $param; $temp[3] = '硕士'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '硕士'"}}class="active"{{endif}}>硕士</a>
									<?php $temp = $param; $temp[3] = '博士'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[3] eq '博士'"}}class="active"{{endif}}>博士</a>
								</li>
								<!--融资阶段-->
								<li class="multi-chosen">
									<span class="title"> 融资阶段  : </span>
									<?php $temp = $param; $temp[4] = '0'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[4] = '未融资'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq '未融资'"}}class="active"{{endif}}>未融资</a>
									<?php $temp = $param; $temp[4] = '天使轮'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq '天使轮'"}}class="active"{{endif}}>天使轮</a>
									<?php $temp = $param; $temp[4] = 'A轮'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq 'A轮'"}}class="active"{{endif}}>A轮</a>
									<?php $temp = $param; $temp[4] = 'B轮'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq 'B轮'"}}class="active"{{endif}}>B轮</a>
									<?php $temp = $param; $temp[4] = 'C轮'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq 'C轮'"}}class="active"{{endif}}>C轮</a>
									<?php $temp = $param; $temp[4] = 'D轮及以上'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq 'D轮及以上'"}}class="active"{{endif}}>D轮及以上</a>
									<?php $temp = $param; $temp[4] = '上市公司'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq '上市公司'"}}class="active"{{endif}}>上市公司</a>
									<?php $temp = $param; $temp[4] = '不需要融资'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[4] eq '不需要融资'"}}class="active"{{endif}}>不需要融资</a>
								</li>
								<!--行业领域-->
								<li class="multi-chosen">
									<span class="title"> 行业领域  : </span>
									<?php $temp = $param; $temp[5] = '0'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '0'"}}class="active"{{endif}}>不限</a>
									<?php $temp = $param; $temp[5] = '硬件'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '硬件'"}}class="active"{{endif}}>硬件</a>
									<?php $temp = $param; $temp[5] = '移动互联网'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '移动互联网'"}}class="active"{{endif}}>移动互联网</a>
									<?php $temp = $param; $temp[5] = '电子商务'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '电子商务'"}}class="active"{{endif}}>电子商务</a>
									<?php $temp = $param; $temp[5] = '金融'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '金融'"}}class="active"{{endif}}>金融</a>
									<?php $temp = $param; $temp[5] = '企业服务'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '企业服务'"}}class="active"{{endif}}>企业服务</a>
									<?php $temp = $param; $temp[5] = '教育'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 6"}}class="active"{{endif}}>教育</a>
									<?php $temp = $param; $temp[5] = '文化娱乐'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq '文化娱乐'"}}class="active"{{endif}}>文化娱乐</a>
									<?php $temp = $param; $temp[5] = '游戏'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 8"}}class="active"{{endif}}>游戏</a>
									<?php $temp = $param; $temp[5] = 'O2O'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 9"}}class="active"{{endif}}>O2O</a>
									<?php $temp = $param; $temp[5] = '社交网络'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 10"}}class="active"{{endif}}>社交网络</a>
									<?php $temp = $param; $temp[5] = '旅游'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 11"}}class="active"{{endif}}>旅游</a>
									<?php $temp = $param; $temp[5] = '医疗健康'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 12"}}class="active"{{endif}}>医疗健康</a>
									<?php $temp = $param; $temp[5] = '生活服务'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 13"}}class="active"{{endif}}>生活服务</a>
									<?php $temp = $param; $temp[5] = '信息安全'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 14"}}class="active"{{endif}}>信息安全</a>
									<?php $temp = $param; $temp[5] = '数据服务'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 15"}}class="active"{{endif}}>数据服务</a>
									<?php $temp = $param; $temp[5] = '广告营销'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 16"}}class="active"{{endif}}>广告营销</a>
									<?php $temp = $param; $temp[5] = '分类信息'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 17"}}class="active"{{endif}}>分类信息</a>
									<?php $temp = $param; $temp[5] = '招聘'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 18"}}class="active"{{endif}}>招聘</a>
									<?php $temp = $param; $temp[5] = '其他'; ?>
									<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[5] eq 19"}}class="active"{{endif}}>其他</a>
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
										<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[6] eq '0'"}}class="active"{{endif}}>默认</a>
										<?php $temp = $param; $temp[6] = '1'; ?>
										<a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}" {{if value="$param[6] eq '1'"}}class="active"{{endif}}>最新</a>

								</div>
								<!--月薪-->
								<div class="item selectUI salary">
									<span class="title">月薪 :&ensp;</span>
									<!--下拉框-->
									<div class="selectUI-text text">
										<span>{{$param[7] ?$param[7]:'不限' }}</span>
										<i></i>
										<ul class="money_hunt">
											<?php $temp = $param; $temp[7] = '0'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">不限</a></li>
											<?php $temp = $param; $temp[7] = '2k以下'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">2k以下</a></li>
											<?php $temp = $param; $temp[7] = '2k-5k'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">2k-5k</a></li>
											<?php $temp = $param; $temp[7] = '5k-10k'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">5k-10k</a></li>
											<?php $temp = $param; $temp[7] = '10k-15k'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">10k-15k</a></li>
											<?php $temp = $param; $temp[7] = '15k-25k'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">15k-25k</a></li>
											<?php $temp = $param; $temp[7] = '25k-50k'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">25k-50k</a></li>
											<?php $temp = $param; $temp[7] = '50k以上'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">50k以上</a></li>
										</ul>
									</div>
								</div>
								<!--工作性质-->
								<div class="item type selectUI">
									<span class="title">工作性质 :&ensp;</span>
									<!--下拉框-->
									<div class="selectUI-text text">
										<span>{{$param[8] ?$param[8]:'不限' }}</span>
										<i></i>
										<ul>
											<?php $temp = $param; $temp[8] = '0'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">不限</a></li>
											<?php $temp = $param; $temp[8] = '全职'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">全职</a></li>
											<?php $temp = $param; $temp[8] = '兼职'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">兼职</a></li>
											<?php $temp = $param; $temp[8] = '实习'; ?>
											<li><a href="{{U('huntlist',['keyword'=>$_GET['keyword'],'param'=>implode('_',$temp)])}}">实习</a></li>
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
							{{foreach from="$jobData" value="$v"}}
								<li class="con_list_item">
									<!--上部分-->
									<div class="list_item_top">
										<!--左-->
										<div class="position">
											<!--职位名称-->
											<div class="p_top">
												<a href="{{U('Job/content',array('jid'=>$v['jid']))}}" target="_blank"><h2>{{$v['jname']}}</h2><span class="add">[{{$v['district_name']}}]</span></a>
												<!--时间-->
												<span class="format-time">{{date('m-d H:i',$v['pubdate'])}}发布</span>
											</div>
											<!--薪资,要求-->
											<div class="p_bot">
												<span class="smoney">{{$v['money']}}k</span>
												<div class="li_b_l">
													经验{{$v['experience']}}年
													/
													<span>{{$v['education']}}</span>
												</div>
											</div>
										</div>
										<!--右-->
										<div class="company">
												<div class="company_name"><a href="{{U('Company/indexShow',array('cpid'=>$v['cpid']))}}" target="_blank">{{$v['cpshortName']}}</a></div>
												<div class="industry"><span>{{$v['industry']}} </span> / <span>{{$v['financing']}}</span></div>
										</div>
										<!--企业logo-->
										<div class="com_logo">
											<a href="{{U('Company/indexShow',array('cpid'=>$v['cpid']))}}" target="_blank"><img src="{{$v['cplogo']?$v['cplogo']:'./Public/home/imgs/moren/minion.png'}}" alt="{{$v['cpname']}}" draggable="false" width="60px" height="60px" /></a>
										</div>
									</div>

									<!--下部分-->
									<div class="list_item_bot">
										<div class="li_b_l">{{$v['tempt']}}</div>
										<!--<div class="li_b_r"><span>股票期权</span><span>绩效奖金</span><span>五险一金</span></div>-->
										<div class="li_b_r"><span>{{$v['cpintro']?$v['cpintro']:'这家伙儿很懒!'}}</span></div>
									</div>
								</li>
							{{endforeach}}
							<!--/#数据-->

							<div class="empty_position" {{if value="!empty($jobData)"}} style="display: none;" {{endif}}>
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
								{{foreach from="$hotJob" value="$hot"}}
									<a href="{{U('Job/content',['jid'=>$hot['jid']])}}" target="_blank" class="r_search_item">{{$hot['jname']}}</a>
								{{endforeach}}
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
								{{$page}}
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
							{{if value="$recently neq ''"}}
							<li class="p_list_item">
								<div class="position_link">
									<a href="{{U('Job/content',array('jid'=>$recently['jid']))}}" class="name" target="_blank">{{$recently['jname']}}</a>
									<p class="salary">{{$recently['money']}}k</p>
									<p class="c_name">{{$recently['cpshortName']?$recently['cpshortName']:$recently['cpname']}}</p>
								</div>
							</li>
							{{elseif value="$recently eq ''"}}
							<p style="line-height: 50px;text-align: center;">还没有记录</p>
							{{endif}}
						</ul>
					</div>
				</div>
				<!--右侧 最近浏览 记录  结束-->
			</div>
		</div>

		<!--返回顶部-->
		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>
		<!--底部备案信息-->
		{{include file="../Common/footer"}}
	</body>
</html>