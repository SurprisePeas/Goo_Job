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
			{{include file="../Common/comHeader"}}
					<ul class="lg_tnav_wrap">
						<li>
							<a href="{{U('Company/index')}}">
								公司
							</a>
						</li>
						<li>
							<a href="{{U('CompanyResume/index')}}">
								简历管理
							</a>
						</li>
						<li>
							<a href="{{U('Job/index')}}" class="current">
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
			 	<a href="{{U('Job/createJob')}}" class="btn_create">发布新职位</a>
			 	
			 	<!--我收到的简历-->
			 	<dl class="company_center_aside">
			 		<dt>我收到的简历</dt>
			 		<dd><a href="{{U('CompanyResume/index')}}">待处理简历</a></dd>
			 		<dd><a href="{{U('CompanyResume/infoFace')}}">已通知面试简历</a></dd>
			 		<dd><a href="{{U('CompanyResume/pass')}}">不合适简历</a></dd>
			 	</dl>
			 	
			 	<!--我发布的职位-->
			 	<dl class="company_center_aside">
			 		<dt>我发布的职位</dt>
			 		<dd class="current"><a href="{{U('Job/index')}}">有效职位</a></dd>
			 		<dd><a href="{{U('Job/recycleJob')}}">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl class="company_center_content">
				 	<dt class="dlTitle"><h1>有效职位<em></em><span>（共 {{$countJobs}} 份）</span></h1></dt>
				 	<!--简历列表-->
					<dd>
						<form action="" method="get" id="searchForm">
							{{if value="empty($jobData)"}}
							<ul class="my_jobs">
								<center style="font-size: 20px;"><img src="./Public/home/imgs/noresult_95_9bde913.png" style="margin-top: 30px;"/>暂时没有符合该搜索条件的职位</center>
							</ul>
							{{elseif value="!empty($jobData)"}}
							<!--/#全选-->
							<ul class="my_jobs">
							<!--数据-->
								{{foreach from="$jobData" value="$job"}}
								<li>
									<h3><a href="{{U('Job/content',array('jid'=>$job['jid']))}}" target="_blank">{{$job['jname']}}</a><span> [{{$job['district_name']}}]</span></h3>
									<p>{{$job['nature']}} / {{$job['money']}}k / {{$job['experience']}} / {{$job['education']}}</p>
									<p class="color9">发布时间：{{date('Y-m-d H:i:s',$job['pubdate'])}} </p>
									<div class="links fr">
										<a href="{{U('Job/editJob',array('jid'=>$job['jid']))}}">编辑</a>
										<a href="javascript:;" outid="{{$job['jid']}}" class="out">下线</a>
									</div>
								</li>
								{{endforeach}}
							<!--/#数据-->
							</ul>
							{{endif}}
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
						url:"{{U('Job/out')}}",
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
		{{include file="../Common/footer"}}
	</body>
</html>
