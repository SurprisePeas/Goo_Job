<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>公司主页</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/stylecompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/editcompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/verify.css"/>

		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/editcompany.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/ajaxHunter.js" type="text/javascript" charset="utf-8"></script>
		<!--百度地图-->
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B1LsYCHodF9iPnqThStn4H7HjZTlQs9v"></script>
	</head>
	<body>
	{{include file="../Common/header"}}
	<style type="text/css">
		header div.lg_tnav .inner .lg_tnav_wrap li .current{
			border-bottom: none !important;
		}
	</style>
	<form action="" method="post">
		<div class="top_info">
			<!--展示模式-->
			<div class="top_info_wrap" style="display: block;">
				<img src="{{$comData['cplogo'] ? $comData['cplogo'] : './Public/home/imgs/moren/minion.png' }}" draggable="false" class="mr_headimg" alt="{{$comData['cpshortName']}}">
				<div class="company_info">
					<div class="company_main">

						<a href="{{$comData['url']}}" target="_blank" title=""><h1>{{$comData['cpshortName']?$comData['cpshortName']:$comData['cpname']}}</h1></a>
						<a class="identification">
							<i></i>
							<span>企业认证</span>
						</a>
						<div class="company_word">
							<!--公司简介-->
							{{$comData['cpintro']?$comData['cpintro']:'还没有填写公司简介...'}}
							<!--/#公司简介-->
						</div>
					</div>
					<div class="company_data">
						<ul>
							<li>
								<!--公司职位发布数量-->
								<strong>{{$num}} 个</strong>
								<!--/#公司职位发布数量-->
								<br />
								<span title="该公司的在招职位数量">
									<span>招聘职位</span>
									<span class="tip"></span>
								</span>

							</li>
							<li>
								<!--登录时间-->
								<strong>{{date('Y-m-d',$comData['lastLoginTime'])}}</strong>
								<!--/#登录时间-->

								<br />
								<span title="该公司职位管理者最近一次登录时间">
									<span>企业最近登录</span>
									<span class="tip"></span>
								</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/#企业头部结束-->

		<!--公司主页导航条-->
		<div class="company_navs">
			<div class="company_navs_wrap">
				<ul>
					<li class="current"><a href="{{U('Company/indexShow',array('cpid'=>$comData['cpid']))}}">公司主页</a></li>
					<!--发布职位统计-->
					<li><a href="{{U('Company/jobsShow',array('cpid'=>$comData['cpid']))}}">招聘职位 ({{$num}})</a></li>
					<!--{{$comData['count']}}-->
					<!--/#发布职位统计-->
				</ul>
			</div>
		</div>
		<!--/#公司主页导航条结束-->

		<!--主体部分-->
		<div class="main_container">
			<!--左边部分-->
			<div class="container_left">
				<!-----------------------------------------公司介绍 图片-------------------------------------------------------->
				<div class="item_container" id="company_intro">
					<div class="item_title">公司介绍</div>
					<div class="item_content" >
						{{$comData['detailed']}}
					</div>
				</div>
				<!--/#---------------------------------------公司介绍 图片-------------------------------------------------------->

				<!---------公司评价--------->
				<div class="item_container">
					<div class="item_title">公司位置</div>
					<!--百度地图-->
				 	<div id="allmap" style="width: 700px;height: 300px;"></div>
					 <!-- 百度地图 -->
					<script type="text/javascript">
						// 百度地图API功能
						var map = new BMap.Map("allmap");
						var point = new BMap.Point(116.331398,39.897445);
						map.centerAndZoom(point,12);

						// 创建地址解析器实例
						var myGeo = new BMap.Geocoder();
						// 将地址解析结果显示在地图上,并调整地图视野
						myGeo.getPoint("{{$comData['cpaddress']}}", function(point){
							if (point) {
								map.centerAndZoom(point, 16);
								var marker = new BMap.Marker(point);  // 创建标注
								map.addOverlay(marker);
								marker.setAnimation(BMAP_ANIMATION_BOUNCE);
							}
						}, "北京市");
						map.enableScrollWheelZoom(true);
					</script>
				</div>
				<!---------公司评价--------->
			</div>
			<!--右边部分-->
			<div class="container_right">
				<div class="item_container">
					<div class="item_ltitle">公司基本信息</div>
					<!--展示模式-->
					<div class="item_content">
						<ul>
							<li>
								<i class="type"></i>
								<!--公司行业领域-->
								<span>{{$comData['industry']}}</span>
							</li>
							<li>
								<i class="process"></i>
								<!--公司融资阶段-->
								<span>{{$comData['financing']}}</span>
							</li>
							<li>
								<i class="number"></i>
								<!--公司规模-->
								<span>{{$comData['cpscale']}}</span>
							</li>
							<li>
								<i class="address"></i>
								<!--公司地址-->
								<span>{{$comData['cpaddress']}}</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--主体部分结束-->


	</form>
	<!--底部备案信息-->
	{{include file="../Common/footer"}}

	</body>
</html>