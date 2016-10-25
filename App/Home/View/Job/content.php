<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>{{$data['jname']}}招聘-{{$data['cpshortName']}}招聘-SP</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/stylecompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgContent.css"/>
	    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
    	<script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>

		<!--百度地图-->
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B1LsYCHodF9iPnqThStn4H7HjZTlQs9v"></script>

	</head>
	<body>
		<!--顶端头部黑条-->
		{{include file="../Common/header"}}
		<style type="text/css">
			#noBorder{border: none !important;}
		</style>
		<!--页面主体     开始-->
		<div class="container">
			<!--左侧内容信息-->
			<div class="content_l fl">
				<!--工作细节描述-->
				<dl class="job_detail">
					<!--h1职位名称 头-->
					<dt>
						<h1>
							<em></em>
							<p>{{$data['cpshortName']?$data['cpshortName']:$data['cpname']}}{{$data['department']}}招聘</p>
							{{$data['jname']}}
						</h1>
						<!--<a href="javascript:;" class="jd_collection"><span id="collection_pos" class="dn">收藏职位</span></a>-->
					</dt>
					<!--职位要求-->
					<dd class="job_request">
						<!--职位要求-->
						<p>
							<span class="redC">{{$data['money']}}k</span>
							<span>{{$data['cityName']}}</span>
							<span>{{$data['experience']}}</span>
							<span>{{$data['education']}}及以上</span>
							<span>{{$data['nature']}}</span>
						</p>
						<p>职位诱惑 : {{$data['tempt']}}</p>
						<p class="publish_time">{{date('Y-m-d',$data['pubdate'])}}&nbsp;&nbsp;发布于 Goo 招聘</p>
					</dd>
					<!--职位详情描述-->
					<dd class="job_bt">
						<h3 class="description">职位描述</h3>
						<p>任职要求</p>
						<!--数据-->
						{{$data['describe']}}
						<!--/#数据-->
					</dd>
					<!--职位发布者-->
					<dd class="jd_publisher">
						<h3>职位发布者</h3>
						<!--信息-->
						<div class="border clearfix">
							<img src="{{$data['shequ_pic']?$data['shequ_pic']:'./Public/home/imgs/moren/ninja.png'}}" width="60px" height="60px" draggable="false"/>
							<!--发布者名称职位-->
							<div class="publisher_name">
								<span class="name">{{$data['cpname']?$data['cpname']:$data['username']}}</span>
								<!--<span class="pos">人力资源经理</span>-->
							</div>
							<!--简历处理情况-->
							<div class="publisher_data" style="display: none;">
								<div style="border-right: 1px solid #dcdcdc;padding-left: 0;">
									<!--数据-->
									<span class="data">100%%</span>
									<span class="tip">简历及时处理率<span class="tip_text">投递后7天内处理完成的简历所占比例</span></span>
								</div>
								<div>
									<!--数据-->
									<span class="data">7天</span>
									<span class="tip">简历处理用时<span class="tip_text"style="width: 168px;">完成简历处理的平均用时</span></span>
								</div>
							</div>
						</div>
					</dd>
					<!--简历-->
					<dd class="jd_resume">
						{{if value="!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='2'"}}<!--如果是企业账号的话,给提示无法投递简历-->
							<div class="resume_status fl">
								<span>企业账号无法投递简历给其他企业!</span>
							</div>
						{{endif}}<!--如果是企业账号的话,给提示无法投递简历-->
						{{if value="empty($_SESSION['info'])"}}<!--如果用户登录了-->
							<div class="resume_status fl">
								<i class="jd-icon fl {{$hunterData['file'] ? 'resume_status_attachment' : 'resume_status_none'}} "></i>
								<span><a href="{{U('Login/index')}}" target="_blank">登陆后</a>可以投递简历</span>
							</div>
						{{endif}}
						{{if value="!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='1'"}}<!--如果是个人账号的话-->
						<div class="resume_status fl">
							<!--简历图标--><!--resume_status_attachment有简历的状态-->
							<i class="jd-icon fl {{$hunterData['file'] ? 'resume_status_attachment' : 'resume_status_none'}} "></i>
							{{if value="empty($hunterData['file'])"}}<!--如果用户有简历文件信息-->
								<span>你在拉勾还没有简历呢，你可以</span><a href="{{U('Jobhunter/index')}}" target="_blank">上传附件简历</a><span>进行投递</span>
								<!--用户有简历时显示的状态-->
								{{elseif value="!empty($hunterData['file'])"}}
									<!--有简历的显示-->
									<div class="fl">
										<span>你已有附件简历：<a href="{{$hunterData['file']}}" title="{{$hunterData['fileName']}}" target="_blank" ><strong>{{$hunterData['fileName']}}</strong></a></span>
										<br />
										<span>简历上传于{{date("Y-m-d H:i",$hunterData['upload_time'])}}</span>
									</div>
									<!--/#有简历的显示-->
							{{endif}}<!--如果用户有简历文件信息-->
							<!--/#用户有简历时显示的状态-->
						</div>
						{{endif}}
					</dd>
					<!--投递个人简历-->
					{{if value="!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='1' "}}
						<input type="hidden" name="jid" id="jid" value="{{Q('get.jid')}}" /> <!--获取职位id传参用于添加简历状态表数据-->
						<dd class="jd_deliver">
							{{if value="empty($data['action'])"}}
								<a href="javascript:;" id="sendBtn" class="passport_login_pop btn btn_apply">投个简历</a>
								<a href="javascript:;" id="sendBtnHide" class="passport_login_pop btn btn_apply" style="background: #f2f2f2;display: none;">已投递简历</a>
								{{elseif value="!empty($data['action'])"}}
									<a href="javascript:;" id="sendBtnHide" class="passport_login_pop btn btn_apply" style="background: #f2f2f2;">已投递简历</a>
							{{endif}}
							<style type="text/css">
								#sendBtnHide:hover{
									cursor: not-allowed;
								}
							</style>
							<!--个人简历按钮ajax提交简历-->
							<script type="text/javascript">
								$("#sendBtn").click(function(){
									var jid = $("#jid").val();
									//ajax 异步发送数据
									$.ajax({
										type:"post",
										url:"{{U('Job/ajaxSend')}}",
										dataType:'JSON',
										data:{jid:jid},
										success:function(phpData){
											$("#sendBtnHide").show();
											$("#sendBtn").hide();
										}
									});
								})
							</script>
							<!--/#个人简历按钮ajax提交简历-->
						</dd>
					{{endif}}
				</dl>
				<!--工作细节描述 结束-->

				<!--面试评价-->
				<dl class="module-container"style="display: none;">
					<div class="module-title">
						面试评价
					</div>
					<!--数据***判断如果公司有评价的话,显示-->
					<a href="{{U('Company/jobsShow',array('cpid'=>$data['cpid']))}}" target="_blank" class="checkAll">查看该公司全部面试评价</a>
					<div class="reviews-area">
						<!--没评价时的显示内容-->
						<div class="list-empty" style="display: none;">
							<i></i>
							<span>该职位尚未收到面试评价</span>
							<span class="list_empty_tips"> ,看看该公司<a href="" class="list_empty_link">其他职位的面试评价</a></span>
						</div>

						<!--有评价时显示的内容-->
						<ul class="list-content">
							<li class="review-area">
								<!--左侧 头像,昵称-->
								<div class="review-avater">
									<!--数据-->
									<img src="./Public/home/imgs/jd_portrait.png"/>
									<span>匿名</span>
									<!--数据-->
								</div>
								<!--右侧评论内容-->
								<div class="review-right">
									<!--综合评分-->
									<div class="review-stars">
										<span class="review-date">
											2015-03-14
										</span>
									</div>
									<!--评论标签-->
									<div class="review-tags">
										<div class="tag">环境高大上</div>
										<div class="tag">面试官很nice</div>
									</div>
									<!--评论内容-->
									<div class="review-content">
										<div>
											<!--数据-->
											<span class="review-type">[面试过程]</span>
											<div class="interview-process">
												和HR沟通了下班后过去的，路程好长，面试官等我了很久。氛围不错，大家相互沟通了很长时间。
											</div>
										</div>
									</div>
									<!--评论内容 结束-->
								</div>
							</li>
							<!--假数据-->
						</ul>
					</div>
				</dl>
				<!--面试评价 结束-->

				<!--看了此职位的人还会看	[*已隐藏*]-->
				<dl class="module-container" style="display: none;">
					<div class="module-title">看了此职位的人还会看</div>
					<div class="view_again_area">
						<ul>
							<!--数据-->
							<li>
								<a href="" class="company-logo"><img src="./Public/home/imgs/Cgo8PFXVTlSAMxs6AACzylRCMkE401.jpg"/></a>
								<a href="" class="position">PHP开发工程...</a>
								<p class="salary">15k-25k</p>
								<p class="company-name">美柚</p>
							</li>
							<!--数据-->
						</ul>
					</div>
				</dl>
				<!--看了此职位的人还会看  结束   [*已隐藏*]-->

				<!--推荐公司-->
				<div class="hide-recom popular_recom">
					<dl class="popular_company">
						<dt>推荐公司:</dt>
						<dd>
							{{foreach from="$recommendCompany" value="$rand"}}
							<a href="{{U('Index/huntlist',['keyword'=>$rand['cpshortName']])}}" target="_blank">{{$rand['cpshortName']}}</a>
							{{endforeach}}
						</dd>
					</dl>
					<!--推荐城市-->
					<dl class="popular_city">
						<dt>推荐城市</dt>
						<dd>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=北京" target="_blank">北京找工作</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=上海" target="_blank">上海找工作</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=杭州" target="_blank">杭州找工作</a>
							<a href="index.php?m=Home&c=Index&a=huntlist&keyword=广州" target="_blank">广州招聘</a>
						</dd>
					</dl>
					<a href="javascript:;" class="expansion">展开<i></i></a>
				</div>
				<!--推荐公司 结束-->
			</div>
			<!--左侧内容信息 结束-->

			<!--右侧内容信息-->
			<div class="content_r">
				<!--企业信息-->
				<dl class="job_company">
					<!--企业Log 头信息-->
					<dt>
						<a href="{{U('Company/indexShow',['cpid'=>$data['cpid']])}}" target="_blank">
							<img src="{{$data['cplogo']?$data['cplogo']:'./Public/home/imgs/moren/minion.png'}}" draggable="false" alt="{{$data['cpshortName']}}" width="80px" height="80px" class="b2"/>
							<div><h2 class="fl">
								{{$data['cpshortName']?$data['cpshortName']:$data['cpname']}}
								<img src="./Public/home/imgs/content/valid_857d33a.png" width="15px" height="19px"/>
							</h2></div>
						</a>
					</dt>
					<!--公司简介-->
					<dd>
						<ul class="c_feature">
							<!--数据-->
							<li><span>领域</span>{{$data['industry']}}</li>
							<li><span>规模</span>{{$data['cpscale']}}</li>
						</ul>
						<h4>发展阶段</h4>
						<ul class="c_feature">
							<!--数据-->
							<li><span>目前阶段</span>{{$data['financing']}}</li>
							<!--<li><span>投资机构</span>东方富海战略投资(B轮)，申银万国(A轮)，东方富海(C轮)，复星集团(B轮)，中关村投资(A轮)，东方富海、中银集团、新希望集团、陈发树、王亚伟等重磅融资(上市公司)，获得新希望集团、中信金石、正和岛、海通证券等投资(D轮及以上)，雷军（小米科技创始人）、李汉生（前惠普中国区总裁）投资(天使轮)</li>-->
						</ul>
						<h4>公司位置</h4>
						<ul style="width: 275px;height: 275px;">
							<h4 style="color: #00b38a;">{{$data['place']}}</h4>
					 		<div id="allmap" style="width: 100%;height: 100%;"></div>
							 <!-- 百度地图 -->
							<script type="text/javascript">
								// 百度地图API功能
								var map = new BMap.Map("allmap");
								var point = new BMap.Point(116.331398,39.897445);
								map.centerAndZoom(point,12);

								// 创建地址解析器实例
								var myGeo = new BMap.Geocoder();
								// 将地址解析结果显示在地图上,并调整地图视野
								myGeo.getPoint("{{$data['place']}}", function(point){
										map.centerAndZoom(point, 16);
										var marker = new BMap.Marker(point);  // 创建标注
										map.addOverlay(marker);
										marker.setAnimation(BMAP_ANIMATION_BOUNCE);
								}, "北京市");
								map.enableScrollWheelZoom(true);
							</script>
						</ul>
					</dd>
				</dl>
				<!--相似职位-->
				<br />
				<div id="jobs_similar">
					<h4 class="jobs_similar_header"><span>相似职位</span></h4>
					<br />
					<div class="jobs_similar_content">
						<ul class="similar_list">
							{{if value="empty($likeJob)"}}
								<div class="nodata_similar_list"></div>
								<style type="text/css">
									.nodata_similar_list{
									    background: #fbfbfb url(./Public/home/imgs/content/nodata_similar_list_3b4bc59.png) no-repeat;
									    width: 281px;
									    height: 150px;
									}
								</style>
							{{endif}}
							<!--数据-->
							{{foreach from="$likeJob" value="$like"}}
								<li>
									<a href="{{U('Job/content',['jid'=>$like['jid']])}}" target="_blank">
										<div class="similar_list_item_logo"><img src="{{$like['cplogo']?$like['cplogo']:'./Public/home/imgs/moren/minion.png'}}" draggable="false" width="56" height="56"/></div>
										<div class="similar_list_item_pos">
											<h2>{{$like['jname']}}</h2>
											<p>{{$like['money']}}k</p>
											<p class="similar_company_name">
												<span class="similar_company_name_span">{{$like['cpshortName']}}</span>
												<span>[{{$like['dis_name']}}·{{$like['city_name']}}]</span>
											</p>
										</div>
										<!--鼠标hover展示公司信息-->
										<div class="similar_company_info">
											<div class="arr"><span></span></div>
											<p><span>领域：</span><span>{{$like['industry']}}</span></p>
											<p><span>阶段：</span><span>{{$like['financing']}}</span></p>
											<p><span>规模：</span><span>{{$like['cpscale']}}</span></p>
										</div>
										<!--/#鼠标hover展示公司信息-->
									</a>
								</li>
							{{endforeach}}
							<!--数据-->
						</ul>
					</div>
				</div>
				<!--相似职位 结束-->
			</div>
			<!--右侧内容信息 结束-->
		</div>
		<!--页面主体     结束-->

		<!--返回顶部-->
		<a href="javascript:void(0);" id="back" style="bottom: 140px; display: inline;"></a>

		{{if value="empty($_SESSION['info'])"}}
			{{include file="../Common/footerLogin"}}
		<!--登录界面部分结束-->
		{{endif}}

		<!--底部备案信息-->
		{{include file="../Common/footer"}}

	</body>
</html>
