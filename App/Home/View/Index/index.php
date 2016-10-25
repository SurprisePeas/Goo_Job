<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>找工作-Goo-</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/hunt.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/home.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--首页头部-->
		{{include file="../Common/header"}}
		<!--#首页头部-->

		<!--主体-->
		<div id="container">
			<!--左侧分类-->
			<div id="sidebar">
				<div class="Navs">
					<!--['技术1']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>技术<span></span></h2>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=JAVA" target="_blank">
								JAVA
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=PHP" class="hotJob" target="_blank">
								PHP
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=C" class="hotJob" target="_blank">
								C++
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=C" target="_blank">
								C
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=iOS" class="hotJob" target="_blank">
								iOS
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=前端开发" target="_blank">
								前端开发
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=技术经理" target="_blank">
								技术经理
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=技术总监" target="_blank">
								技术总监
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=架构师" target="_blank">
								架构师
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=CTO" target="_blank">
								CTO
							</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=Android" target="_blank">
								Android
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn">
							{{foreach from="$jishuData" value="$jishu"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$jishu['cname']])}}" target="_blank">
									{{$jishu['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$jishu['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['技术1']块状分类********-->
					
					<!--['产品2']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>产品<span></span></h2>
							<a href="{{U('huntlist',['keyword'=>'产品总监'])}}" target="_blank">
								产品总监
							</a>
							<a href="{{U('huntlist',['keyword'=>'产品经理'])}}" class="hotJob" target="_blank">
								产品经理
							</a>
							<a href="{{U('huntlist',['keyword'=>'移动产品经理'])}}" class="hotJob" target="_blank">
								移动产品经理
							</a>
							<a href="{{U('huntlist',['keyword'=>'游戏策划'])}}" target="_blank">
								游戏策划
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -35px;">
							{{foreach from="$chanpinData" value="$chanpin"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$chanpin['cname']])}}" target="_blank">
									{{$chanpin['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$chanpin['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['产品2']块状分类********-->
					
					<!--['设计3']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>设计<span></span></h2>
							<a href="{{U('huntlist',['keyword'=>'设计总监'])}}" target="_blank">
								设计总监
							</a>
							<a href="{{U('huntlist',['keyword'=>'UI'])}}" class="hotJob" target="_blank">
								UI
							</a>
							<a href="{{U('huntlist',['keyword'=>'UE'])}}" target="_blank">
								UE
							</a>
							<a href="{{U('huntlist',['keyword'=>'交互设计'])}}" target="_blank">
								交互设计
							</a>
							<a href="{{U('huntlist',['keyword'=>'数据分析'])}}" target="_blank">
								数据分析
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -70px;">
							{{foreach from="$shejiData" value="$sheji"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$sheji['cname']])}}" target="_blank">
									{{$sheji['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$sheji['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['设计3']块状分类********-->
				
					<!--['运营4']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>运营<span></span></h2>
							<a href="{{U('huntlist',['keyword'=>'新媒体运营'])}}" target="_blank">
								新媒体运营
							</a>
							<a href="{{U('huntlist',['keyword'=>'数据运营'])}}" target="_blank">
								数据运营
							</a>
							<a href="{{U('huntlist',['keyword'=>'运营总监'])}}" target="_blank">
								运营总监
							</a>
							<a href="{{U('huntlist',['keyword'=>'编辑'])}}" target="_blank">
								编辑
							</a>
							<a href="{{U('huntlist',['keyword'=>'COO'])}}" target="_blank">
								COO
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -45px;">
							{{foreach from="$yunyingData" value="$yunying"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$yunying['cname']])}}" target="_blank">
									{{$yunying['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$yunying['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['运营4']块状分类********-->
					
					<!--['市场与销售5']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>市场与销售<span></span></h2>
							<a href="{{U('huntlist',['keyword'=>'市场推广'])}}" target="_blank">
								市场推广
							</a>
							<a href="{{U('huntlist',['keyword'=>'市场总监'])}}" target="_blank">
								市场总监
							</a>
							<a href="{{U('huntlist',['keyword'=>'市场策划'])}}" target="_blank">
								市场策划
							</a>
							<a href="{{U('huntlist',['keyword'=>'BD'])}}" target="_blank">
								BD
							</a>
							<a href="{{U('huntlist',['keyword'=>'销售总监'])}}" target="_blank">
								销售总监
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -91px;">
							{{foreach from="$shichangData" value="$shichang"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$shichang['cname']])}}" target="_blank">
									{{$shichang['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$shichang['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['市场与销售[5]']块状分类********-->
					
					<!--['职能[6]']块状分类********-->
					<div class="menu_box">
						<div class="job_hopping">
							<h2>职能<span></span></h2>
							<a href="{{U('huntlist',['keyword'=>'HR'])}}" target="_blank">
								HR
							</a>
							<a href="{{U('huntlist',['keyword'=>'行政'])}}" class="hotJob" target="_blank">
								行政
							</a>
							<a href="{{U('huntlist',['keyword'=>'会计'])}}" target="_blank">
								会计
							</a>
							<a href="{{U('huntlist',['keyword'=>'出纳'])}}" target="_blank">
								出纳
							</a>
						</div>
						<!--hover显示详细分类-->
						<div class="dn" style="top: -201px;">
							{{foreach from="$zhinengData" value="$zhineng"}}
							<dl>
								<dt>
								<a href="{{U('huntlist',['keyword'=>$zhineng['cname']])}}" target="_blank">
									{{$zhineng['cname']}}
								</a>
								</dt>
								<dd>
									{{foreach from="$zhineng['son']" value="$Son"}}
									<a href="{{U('huntlist',['keyword'=>$Son['cname']])}}" target="_blank">
										{{$Son['cname']}}
									</a>
									{{endforeach}}
								</dd>
							</dl>
							{{endforeach}}
						</div>
					</div>
					<!--/#['职能[6]']块状分类********-->
					
				</div>
				
				<!--查看更多职位-->
				<div class="subscribe">
					<a href="{{U('huntlist')}}" target="_blank"><span>查找更多职位</span><i></i></a>
				</div>
				<!--/#查看更多职位-->
				
			</div>
			<!--/#左侧分类-->
				
			<!--中间内容主体-->
			<div class="content">
				<!--搜索-->
				<div id="search_box">
					<p id="searchForm">
						<input type="text" id="keyword" autocomplete="off" maxlength="64" placeholder="搜索职位、公司或地点" value="" class="ui-autocomplete-input">
						<input type="button" name="submit" id="submit" value="搜索" />
					</p>
				</div>
				<!--搜索-->
				<!--热门搜索-->
				<dl class="hotSearch">
					<dt>
					热门搜索:
					</dt>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'PHP'])}}" target="_blank">
							PHP
						</a>
					</dd>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'产品经理'])}}" target="_blank">
							产品经理
						</a>
					</dd>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'HTML5'])}}" target="_blank">
							HTML5
						</a>
					</dd>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'设计师'])}}" target="_blank">
							设计师
						</a>
					</dd>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'易橙天下'])}}" target="_blank">
							易橙天下
						</a>
					</dd>
					<dd>
						<a href="{{U('huntlist',['keyword'=>'腾讯'])}}" target="_blank">
							腾讯
						</a>
					</dd>
				</dl>
				<!--热门搜索-->

				<!--轮播图-->
				<div id="home_banner">
					<ul class="banner_bg">
						<li  class="banner_bg_1 current" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fDwZ6APaUWAADrqGper3g881.png" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
						<li  class="banner_bg_2" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/CgqKkVen-3iAVtnEAAI_LYklj0g045 (1).JPG" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
						<li  class="banner_bg_3" >
							<a href="javascript:;" target="_blank">
								<img src="./Public/home/imgs/CgqKkVekCRuAYkKTAAEvdGlZx60873 (1).JPG" width="612" height="160" alt="" draggable="false" />
							</a>
						</li>
					</ul>
					<div class="banner_control">
						<em></em>
						<ul class="thumbs">
							<li  class="thumbs_1 current" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fDwaCAJIMpAAAZCAwxQmI485.JPG"  width="113" height="42" />
							</li>
							<li  class="thumbs_2" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fAMa2AMjVlAAAjgD48FRE513.JPG" width="113" height="42" />
							</li>
							<li  class="thumbs_3" >
								<i></i>
								<img src="./Public/home/imgs/lunboimg/Cgp3O1fFPuOAFbt3AAACY0fRdhk161.PNG" width="113" height="42" />
							</li>
						</ul>
					</div>
				</div><!--/#main_banner-->
				<!--轮播图-->

				<!--大缩略图-->
				<ul id="da-thumbs" class="da-thumbs">
					<li >
						<a href="Company_1.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/08f790529822720e984871c17ecb0a46f21fab03.jpg" width="113" height="113" alt="腾讯" />
							<div class="hot_info">
								<h2 title="腾讯">腾讯</h2>
								<em></em>
								<p title="连接一切，从连接人才开始！">
									连接一切，从连接人才开始！
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_2.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/ac345982b2b7d0a2d167badfc3ef76094a369ac2.jpg" width="113" height="113" alt="饿了吗" />
							<div class="hot_info">
								<h2 title="饿了吗">饿了吗</h2>
								<em></em>
								<p title="to do really SMALL things, and grow them bigger.">
									to do really SMALL things, and grow them bigger.
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_3.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgqLKVXsHgGANdDuAAAfIDoIUFI096.png" width="113" height="113" alt="优酷土豆" />
							<div class="hot_info">
								<h2 title="优酷土豆">优酷土豆</h2>
								<em></em>
								<p title="专注于视频领域，是中国网络视频行业领军企业">
									专注于视频领域，是中国网络视频行业领军企业
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_4.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgpzWlXs99OASRG8AAAVkJavO_Q545.jpg" width="113" height="113" alt="易橙天下" />
							<div class="hot_info">
								<h2 title="易橙天下">易橙天下</h2>
								<em></em>
								<p title="一家全球信息技术服务公司">
									一家全球信息技术服务公司
								</p>
							</div>
						</a>
					</li>
					<li >
						<a href="Company_5.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/CgYXBlW4pW-AL-CcAAAStAoXnEI801.jpg" width="113" height="113" alt="乔大招" />
							<div class="hot_info">
								<h2 title="乔大招">乔大招</h2>
								<em></em>
								<p title="海量个人行为轨迹数据进行消费趋势判断">
									海量个人行为轨迹数据进行消费趋势判断
								</p>
							</div>
						</a>
					</li>
					<li  class="last" >
						<a href="Company_6.html" target="_blank">
							<img src="./Public/home/imgs/indexGD/Cgo8PFTUWAeAFPHrAABw9Dg7c1Q567.jpg" width="113" height="113" alt="薄荷" />
							<div class="hot_info">
								<h2 title="薄荷">薄荷</h2>
								<em></em>
								<p title="我们的梦想是为女性提供最好的健康产品">
									我们的梦想是为女性提供最好的健康产品
								</p>
							</div>
						</a>
					</li>
				</ul>
				<!--大缩略图-->

				<!--工作职位-->
				<ul id="job_tab">
					<li class="current hotTab">
						热门职位
					</li>
					<li class="newTab">
						最新职位
					</li>
				</ul>
				<!--工作职位-->

				<!--最热列表-->
				<div class="job_list hot_posHotPosition ">
					<ul class="clearfix">
						{{foreach from="$hotData" value="$job"}}
						<li class="position_list_item">
							<!--上部分-->
							<div class="pli_top">
								<!--左-->
								<div class="fl pli_top_l">
									<!--职位名称-->
									<div class="postion_name">
										<h2 class="fl">
										<a href="Job_{{$job['jid']}}.html" class="position_link" target="_blank">
											{{$job['jname']}}<span>[{{$job['district_name']}}]</span>
										</a></h2>
										<!--时间-->
										<span class="fl">{{date('m月d日 H:i',$job['pubdate']) }} 发布</span>
									</div>
									<!--薪资,要求-->
									<div>
										<span class="salary fl">{{$job['money']}}k</span>
										<span> 经验{{$job['experience']}}
										/ <span>{{$job['education']}}</span> </span>
									</div>
								</div>
								<!--右-->
								<div class="fr pli_top_r">
									<div class="company_name wordCut">
										<a href="Company_{{$job['cpid']}}.html" target="_blank">
											{{$job['cpshortName']?$job['cpshortName']:$job['cpname']}}
										</a>
									</div>
									<div class="industry wordCut">
										<span>{{$job['industry']}}</span> / <span>{{$job['financing']}}</span>
									</div>
								</div>
							</div>

							<!--下部分-->
							<div class="pli_btm">
								<div class="pli_btm_l">
									{{$job['tempt']}}
								</div>
								<div class="pli_btm_r">
									<!--<span>股票期权</span><span>绩效奖金</span><span>五险一金</span>-->
								</div>
							</div>
						</li>
						{{endforeach}}
					</ul>
					<a href="javascript:;" class="list_more">
						没有更多了哦~ (⊙o⊙)
					</a>
				</div>
				<!--/#最热列表-->
				
				<!--最新职位 hid-->
				<div class="job_list new_posHotPosition hid">
					<ul class="clearfix">
						{{foreach from="$data" value="$job"}}
						<li class="position_list_item">
							<!--上部分-->
							<div class="pli_top">
								<!--左-->
								<div class="fl pli_top_l">
									<!--职位名称-->
									<div class="postion_name">
										<h2 class="fl">
										<a href="Job_{{$job['jid']}}.html" class="position_link" target="_blank">
											{{$job['jname']}}<span>[{{$job['district_name']}}]</span>
										</a></h2>
										<!--时间-->
										<span class="fl">{{date('m月d日 H:i',$job['pubdate']) }} 发布</span>
									</div>
									<!--薪资,要求-->
									<div>
										<span class="salary fl">{{$job['money']}}k</span>
										<span> 经验{{$job['experience']}}
										/ <span>{{$job['education']}}</span> </span>
									</div>
								</div>
								<!--右-->
								<div class="fr pli_top_r">
									<div class="company_name wordCut">
										<a href="Company_{{$job['cpid']}}.html" target="_blank">
											{{$job['cpshortName']?$job['cpshortName']:$job['cpname']}}
										</a>
									</div>
									<div class="industry wordCut">
										<span>{{$job['industry']}}</span> / <span>{{$job['financing']}}</span>
									</div>
								</div>
							</div>

							<!--下部分-->
							<div class="pli_btm">
								<div class="pli_btm_l">
									{{$job['tempt']}}
								</div>
								<div class="pli_btm_r">
									<!--<span>股票期权</span><span>绩效奖金</span><span>五险一金</span>-->
								</div>
							</div>
						</li>
						{{endforeach}}
						<!--/#数据-->
					</ul>
					<a href="javascript:;" class="list_more">
						没有更多了哦~ (⊙o⊙)
					</a>
				</div>
				<!--职位列表-->

				<!--友情链接 未添加的内容---->

			</div>
			<!--中间内容主体-->
		</div>
		<!--主体-->

		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>

		<!--底部备案信息-->
		{{include file="../Common/footer"}}
		<!--/#底部备案信息-->

		{{if value="empty($_SESSION['info'])"}}
			{{include file="../Common/footerLogin"}}
		<!--登录界面部分结束-->
		{{endif}}

	</body>
</html>