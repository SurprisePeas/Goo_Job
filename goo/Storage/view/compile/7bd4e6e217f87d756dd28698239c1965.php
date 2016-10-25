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
							Goo O(∩_∩)O
						</a>
					</li>
					<li>
						<a href="SurprisePeas">
							Goo首页
						</a>
					</li>
				</ul>

			</div>
			<!--左侧企业版-->

			<!--右侧个人信息-->
			<div class="lg_tbar_r">
				<ul>

					<!--判断有session的时候显示内容-->
					<?php if(isset($_SESSION['info'])){?>
                
					<!--判断是否是求职者-->
					<?php if($_SESSION['info']['distinguish']==1){?>
                
					<!--<li>
						<a href="" style="border-left: none;">
							消息
						</a>
					</li>-->
					<li>
						<a href="<?php echo U('Jobhunter/index')?>">
							我的简历
						</a>
					</li>
					<li>
						<a href="<?php echo U('Jobhunter/send')?>">
							投递箱
						</a>
					</li>
					<!--<li>
						<a href="<?php echo U('Jobhunter/collect')?>">
							收藏夹
						</a>
					</li>-->
					
               <?php }?>
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> <?php echo $_SESSION['info']['account']?> </span>-->
						<span class="unick"> <?php echo $_SESSION['info']['username'] ? $_SESSION['info']['username'] : $_SESSION['info']['account'] ?> </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="<?php echo U('Persona/index')?>">
									账号设置
								</a>
							</li>
							<li>
								<a href="<?php echo U('Company/index')?>" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="<?php echo U('Login/out')?>">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!--<?php if($_SESSION['info']['distinguish']==2){?>
                
					<li class="showUser">
						<span class="unick" style="border: 0;margin-right: -15px;"> <?php echo $_SESSION['info']['account']?> </span>
					</li>
					<li>
						<a href="<?php echo U('Login/out')?>">
							退出登录
						</a>
					</li>
					
               <?php }?>-->


					<!--没有session的时候显示登录注册按钮-->
					<?php }else if(empty($_SESSION['info'])){?>
					<li>
						<a href="<?php echo U('Login/index')?>" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="<?php echo U('Login/register')?>"  target="_blank">
							注册
						</a>
					</li>
					
               <?php }?>
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
				<a href="<?php echo U('Company/index')?>">
					<img src="./Public/home/imgs/logo_d0915a9.png" draggable="false"/>
					<span class="qiyeClass">企业版</span>
					<style type="text/css">
						span.qiyeClass{
							font-weight: 400;
						    font-size: 24px;
						    line-height: 31px;
						    color: #00b38a;
						    position: relative;
						    top: 0;
						    left: 3px;
						    padding: 0 12px;
						    border-left: 1px solid #e1e1e1;
						}
					</style>
				</a>
				</h1>
			</div>