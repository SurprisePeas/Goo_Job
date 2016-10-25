<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>我收藏的职位</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/applyStyle/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/applyStyle/collect.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
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
						<a href="http://localhost/new_lg/index.php?m=Home&c=Index&a=index" style="border-left: none;padding-left: 0;">
							首页 (∩_∩)
						</a>
					</li>
					<li>
						<a href="http://localhost/new_lg/index.php?m=Home&c=Company&a=index">
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
						<a href="http://localhost/new_lg/index.php?m=Home&c=Jobhunter&a=index">
							我的简历
						</a>
					</li>
					<li>
						<a href="http://localhost/new_lg/index.php?m=Home&c=Jobhunter&a=send">
							投递箱
						</a>
					</li>
					<li>
						<a href="http://localhost/new_lg/index.php?m=Home&c=Jobhunter&a=collect">
							收藏夹
						</a>
					</li>
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> geren1111 </span>-->
						<span class="unick"> 美国队长前来应聘 </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="http://localhost/new_lg/index.php?m=Home&c=Persona&a=index">
									账号设置
								</a>
							</li>
							<li>
								<a href="http://localhost/new_lg/index.php?m=Home&c=Company&a=index" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="http://localhost/new_lg/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
					</li>
					
               					
					
										
					
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
				<a href="http://localhost/new_lg/index.php?m=Home&c=Index&a=index">
					<img src="./Public/home/imgs/logo_d0915a9.png" draggable="false"/>
				</a></h1>
			</div>
			<!--//首页公司-->
			<ul class="lg_tnav_wrap">
				<li>
					<a href="http://localhost/new_lg/index.php?m=Home&c=Index&a=index" id="noBorder" class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="http://localhost/new_lg/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
		<style type="text/css">
			#noBorder{
				border-bottom: none;
			}
		</style>

		<!--主体-->
		<div id="content">
			<div class="content_info">
				<!--我收藏的职位-->
				<div class="new_section fl">
					<dl>
						<dt><h1>我收藏的职位<em></em></h1></dt>
						<!--职位列表-->
						<dd>
							<form action="" method="post">
								<ul class="my_collections">
									<!--/#假数据-->
									<li>
										<!--公司logo-->
										<a href="">
											<img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg"/>
										</a>
										<!--/#公司logo-->
										
										<!--职位描述-->
										<div class="co_item">
											<!--职位名称-->
											<h2>
												<a href=""><em>Python</em><span>（15k-30k）</span></a>
											</h2>
											<!--/#职位名称-->
											<span class="co_time">发布时间：2016-08-05 19:45</span>
											<!--职位信息-->
											<p class="co_cate">去哪儿网络科技有限公司（深圳） / 北京 / 3-5年 / 本科</p>
											<span class="">技术氛围好，leader nice</span>
											<!--/#职位信息-->
											<a href="">投个简历</a>
											
										</div>
										<!--/#co_item职位描述-->
									</li>
									<li>
										<!--公司logo-->
										<a href="">
											<img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg"/>
										</a>
										<!--/#公司logo-->
										
										<!--职位描述-->
										<div class="co_item">
											<!--职位名称-->
											<h2>
												<a href=""><em>Python</em><span>（15k-30k）</span></a>
											</h2>
											<!--/#职位名称-->
											<span class="co_time">发布时间：2016-08-05 19:45</span>
											<!--职位信息-->
											<p class="co_cate">去哪儿网络科技有限公司（深圳） / 北京 / 3-5年 / 本科</p>
											<span class="">技术氛围好，leader nice</span>
											<!--/#职位信息-->
											<a href="">投个简历</a>
											
										</div>
										<!--/#co_item职位描述-->
									</li>
									<li>
										<!--公司logo-->
										<a href="">
											<img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg"/>
										</a>
										<!--/#公司logo-->
										
										<!--职位描述-->
										<div class="co_item">
											<!--职位名称-->
											<h2>
												<a href=""><em>Python</em><span>（15k-30k）</span></a>
											</h2>
											<!--/#职位名称-->
											<span class="co_time">发布时间：2016-08-05 19:45</span>
											<!--职位信息-->
											<p class="co_cate">去哪儿网络科技有限公司（深圳） / 北京 / 3-5年 / 本科</p>
											<span class="">技术氛围好，leader nice</span>
											<!--/#职位信息-->
											<a href="">投个简历</a>
											
										</div>
										<!--/#co_item职位描述-->
									</li>
									<li>
										<!--公司logo-->
										<a href="">
											<img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg"/>
										</a>
										<!--/#公司logo-->
										
										<!--职位描述-->
										<div class="co_item">
											<!--职位名称-->
											<h2>
												<a href=""><em>Python</em><span>（15k-30k）</span></a>
											</h2>
											<!--/#职位名称-->
											<span class="co_time">发布时间：2016-08-05 19:45</span>
											<!--职位信息-->
											<p class="co_cate">去哪儿网络科技有限公司（深圳） / 北京 / 3-5年 / 本科</p>
											<span class="">技术氛围好，leader nice</span>
											<!--/#职位信息-->
											<a href="">投个简历</a>
											
										</div>
										<!--/#co_item职位描述-->
									</li>
									<!--/#假数据-->
								</ul>
							</form>
						</dd>
						<!--/#职位列表-->
					</dl>
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
								<ul class="guess_like">
									<!--假数据-->
									<li class="guess_like_list_item">
										<a href="">
											<div class="guess_like_list_item_logo fl"><img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg" alt="" /></div>
											<div class="guess_like_list_item_pos fl">
												<h2>前端工程师</h2>
												<p>13k-25k</p>
												<p class="company_name">
													<span class="company_name_span">拉勾网拉勾网拉勾网</span>
													<span class="company_position_span">[北京·苏州街]</span>
												</p>
											</div>
										</a>
									</li>
									<li class="guess_like_list_item">
										<a href="">
											<div class="guess_like_list_item_logo fl"><img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg" alt="" /></div>
											<div class="guess_like_list_item_pos fl">
												<h2>前端工程师</h2>
												<p>13k-25k</p>
												<p class="company_name">
													<span class="company_name_span">拉勾网拉勾网拉勾网</span>
													<span class="company_position_span">[北京·苏州街]</span>
												</p>
											</div>
										</a>
									</li>
									<li class="guess_like_list_item">
										<a href="">
											<div class="guess_like_list_item_logo fl"><img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg" alt="" /></div>
											<div class="guess_like_list_item_pos fl">
												<h2>前端工程师</h2>
												<p>13k-25k</p>
												<p class="company_name">
													<span class="company_name_span">拉勾网拉勾网拉勾网</span>
													<span class="company_position_span">[北京·苏州街]</span>
												</p>
											</div>
										</a>
									</li>
									<li class="guess_like_list_item">
										<a href="">
											<div class="guess_like_list_item_logo fl"><img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg" alt="" /></div>
											<div class="guess_like_list_item_pos fl">
												<h2>前端工程师</h2>
												<p>13k-25k</p>
												<p class="company_name">
													<span class="company_name_span">拉勾网拉勾网拉勾网</span>
													<span class="company_position_span">[北京·苏州街]</span>
												</p>
											</div>
										</a>
									</li>
									<li class="guess_like_list_item">
										<a href="">
											<div class="guess_like_list_item_logo fl"><img src="./Public/home/img/Cgo8PFUuJ7SAcErwAACtNjsgHHk099.jpg" alt="" /></div>
											<div class="guess_like_list_item_pos fl">
												<h2>前端工程师</h2>
												<p>13k-25k</p>
												<p class="company_name">
													<span class="company_name_span">拉勾网拉勾网拉勾网</span>
													<span class="company_position_span">[北京·苏州街]</span>
												</p>
											</div>
										</a>
									</li>
									<!--/#假数据-->
								</ul>
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