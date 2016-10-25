<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $data['jname']?>招聘-<?php echo $data['cpshortName']?>招聘-SP</title>
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
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=index" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=register"  target="_blank">
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
							<p><?php echo $data['cpshortName']?$data['cpshortName']:$data['cpname']?><?php echo $data['department']?>招聘</p>
							<?php echo $data['jname']?>
						</h1>
						<!--<a href="javascript:;" class="jd_collection"><span id="collection_pos" class="dn">收藏职位</span></a>-->
					</dt>
					<!--职位要求-->
					<dd class="job_request">
						<!--职位要求-->
						<p>
							<span class="redC"><?php echo $data['money']?>k</span>
							<span><?php echo $data['cityName']?></span>
							<span><?php echo $data['experience']?></span>
							<span><?php echo $data['education']?>及以上</span>
							<span><?php echo $data['nature']?></span>
						</p>
						<p>职位诱惑 : <?php echo $data['tempt']?></p>
						<p class="publish_time"><?php echo date('Y-m-d',$data['pubdate'])?>&nbsp;&nbsp;发布于 Goo 招聘</p>
					</dd>
					<!--职位详情描述-->
					<dd class="job_bt">
						<h3 class="description">职位描述</h3>
						<p>任职要求</p>
						<!--数据-->
						<?php echo $data['describe']?>
						<!--/#数据-->
					</dd>
					<!--职位发布者-->
					<dd class="jd_publisher">
						<h3>职位发布者</h3>
						<!--信息-->
						<div class="border clearfix">
							<img src="<?php echo $data['shequ_pic']?$data['shequ_pic']:'./Public/home/imgs/moren/ninja.png'?>" width="60px" height="60px" draggable="false"/>
							<!--发布者名称职位-->
							<div class="publisher_name">
								<span class="name"><?php echo $data['cpname']?$data['cpname']:$data['username']?></span>
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
						<?php if(!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='2'){?>
                <!--如果是企业账号的话,给提示无法投递简历-->
							<div class="resume_status fl">
								<span>企业账号无法投递简历给其他企业!</span>
							</div>
						
               <?php }?><!--如果是企业账号的话,给提示无法投递简历-->
						<?php if(empty($_SESSION['info'])){?>
                <!--如果用户登录了-->
							<div class="resume_status fl">
								<i class="jd-icon fl <?php echo $hunterData['file'] ? 'resume_status_attachment' : 'resume_status_none'?> "></i>
								<span><a href="<?php echo U('Login/index')?>" target="_blank">登陆后</a>可以投递简历</span>
							</div>
						
               <?php }?>
						<?php if(!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='1'){?>
                <!--如果是个人账号的话-->
						<div class="resume_status fl">
							<!--简历图标--><!--resume_status_attachment有简历的状态-->
							<i class="jd-icon fl <?php echo $hunterData['file'] ? 'resume_status_attachment' : 'resume_status_none'?> "></i>
							<?php if(empty($hunterData['file'])){?>
                <!--如果用户有简历文件信息-->
								<span>你在拉勾还没有简历呢，你可以</span><a href="<?php echo U('Jobhunter/index')?>" target="_blank">上传附件简历</a><span>进行投递</span>
								<!--用户有简历时显示的状态-->
								<?php }else if(!empty($hunterData['file'])){?>
									<!--有简历的显示-->
									<div class="fl">
										<span>你已有附件简历：<a href="<?php echo $hunterData['file']?>" title="<?php echo $hunterData['fileName']?>" target="_blank" ><strong><?php echo $hunterData['fileName']?></strong></a></span>
										<br />
										<span>简历上传于<?php echo date("Y-m-d H:i",$hunterData['upload_time'])?></span>
									</div>
									<!--/#有简历的显示-->
							
               <?php }?><!--如果用户有简历文件信息-->
							<!--/#用户有简历时显示的状态-->
						</div>
						
               <?php }?>
					</dd>
					<!--投递个人简历-->
					<?php if(!empty($_SESSION['info']) && $_SESSION['info']['distinguish']=='1' ){?>
                
						<input type="hidden" name="jid" id="jid" value="<?php echo Q('get.jid')?>" /> <!--获取职位id传参用于添加简历状态表数据-->
						<dd class="jd_deliver">
							<?php if(empty($data['action'])){?>
                
								<a href="javascript:;" id="sendBtn" class="passport_login_pop btn btn_apply">投个简历</a>
								<a href="javascript:;" id="sendBtnHide" class="passport_login_pop btn btn_apply" style="background: #f2f2f2;display: none;">已投递简历</a>
								<?php }else if(!empty($data['action'])){?>
									<a href="javascript:;" id="sendBtnHide" class="passport_login_pop btn btn_apply" style="background: #f2f2f2;">已投递简历</a>
							
               <?php }?>
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
										url:"<?php echo U('Job/ajaxSend')?>",
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
					
               <?php }?>
				</dl>
				<!--工作细节描述 结束-->

				<!--面试评价-->
				<dl class="module-container"style="display: none;">
					<div class="module-title">
						面试评价
					</div>
					<!--数据***判断如果公司有评价的话,显示-->
					<a href="<?php echo U('Company/jobsShow',array('cpid'=>$data['cpid']))?>" target="_blank" class="checkAll">查看该公司全部面试评价</a>
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
							<?php foreach ($recommendCompany as $rand){?>
							<a href="<?php echo U('Index/huntlist',['keyword'=>$rand['cpshortName']])?>" target="_blank"><?php echo $rand['cpshortName']?></a>
							<?php }?>
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
						<a href="<?php echo U('Company/indexShow',['cpid'=>$data['cpid']])?>" target="_blank">
							<img src="<?php echo $data['cplogo']?$data['cplogo']:'./Public/home/imgs/moren/minion.png'?>" draggable="false" alt="<?php echo $data['cpshortName']?>" width="80px" height="80px" class="b2"/>
							<div><h2 class="fl">
								<?php echo $data['cpshortName']?$data['cpshortName']:$data['cpname']?>
								<img src="./Public/home/imgs/content/valid_857d33a.png" width="15px" height="19px"/>
							</h2></div>
						</a>
					</dt>
					<!--公司简介-->
					<dd>
						<ul class="c_feature">
							<!--数据-->
							<li><span>领域</span><?php echo $data['industry']?></li>
							<li><span>规模</span><?php echo $data['cpscale']?></li>
						</ul>
						<h4>发展阶段</h4>
						<ul class="c_feature">
							<!--数据-->
							<li><span>目前阶段</span><?php echo $data['financing']?></li>
							<!--<li><span>投资机构</span>东方富海战略投资(B轮)，申银万国(A轮)，东方富海(C轮)，复星集团(B轮)，中关村投资(A轮)，东方富海、中银集团、新希望集团、陈发树、王亚伟等重磅融资(上市公司)，获得新希望集团、中信金石、正和岛、海通证券等投资(D轮及以上)，雷军（小米科技创始人）、李汉生（前惠普中国区总裁）投资(天使轮)</li>-->
						</ul>
						<h4>公司位置</h4>
						<ul style="width: 275px;height: 275px;">
							<h4 style="color: #00b38a;"><?php echo $data['place']?></h4>
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
								myGeo.getPoint("<?php echo $data['place']?>", function(point){
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
							<?php if(empty($likeJob)){?>
                
								<div class="nodata_similar_list"></div>
								<style type="text/css">
									.nodata_similar_list{
									    background: #fbfbfb url(./Public/home/imgs/content/nodata_similar_list_3b4bc59.png) no-repeat;
									    width: 281px;
									    height: 150px;
									}
								</style>
							
               <?php }?>
							<!--数据-->
							<?php foreach ($likeJob as $like){?>
								<li>
									<a href="<?php echo U('Job/content',['jid'=>$like['jid']])?>" target="_blank">
										<div class="similar_list_item_logo"><img src="<?php echo $like['cplogo']?$like['cplogo']:'./Public/home/imgs/moren/minion.png'?>" draggable="false" width="56" height="56"/></div>
										<div class="similar_list_item_pos">
											<h2><?php echo $like['jname']?></h2>
											<p><?php echo $like['money']?>k</p>
											<p class="similar_company_name">
												<span class="similar_company_name_span"><?php echo $like['cpshortName']?></span>
												<span>[<?php echo $like['dis_name']?>·<?php echo $like['city_name']?>]</span>
											</p>
										</div>
										<!--鼠标hover展示公司信息-->
										<div class="similar_company_info">
											<div class="arr"><span></span></div>
											<p><span>领域：</span><span><?php echo $like['industry']?></span></p>
											<p><span>阶段：</span><span><?php echo $like['financing']?></span></p>
											<p><span>规模：</span><span><?php echo $like['cpscale']?></span></p>
										</div>
										<!--/#鼠标hover展示公司信息-->
									</a>
								</li>
							<?php }?>
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

		<?php if(empty($_SESSION['info'])){?>
                
				
<!--底部登录条-->
		<div id="logintool">
			<div>
				<em></em>
				<img src="./Public/home/imgs/login/footbar_logo_e2fde1b.png"/>
				<!--<span class="companycount"> <i style="background-position-y: -30px;"></i><i style="background-position-y: -60px;"></i><i style="background-position-y: -60px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: -180px;"></i><i style="background-position-y: -60px;"></i> </span>
				<span class="jobscount"> <i style="background-position-y: -30px;"></i><b></b><i style="background-position-y: -240px;"></i><i style="background-position-y: -90px;"></i><i style="background-position-y: -270px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: 0px;"></i><i style="background-position-y: 0px;"></i> </span>-->
				<span class="companycount"> 9</span>
				<span class="jobscount">37</span>
				
				<a href="javascript:;" class="bar_login">
					<i></i>
				</a>
				<div class="lt_r">
					<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=register" target="_blank">
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
										url:"http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=modalAjax",
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
								<a href="http://c69_guoqing.houdunphp.com/new_lg/index.php?m=Home&c=Login&a=register" class="registor_now" target="_blank">
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
</footer>

	</body>
</html>
