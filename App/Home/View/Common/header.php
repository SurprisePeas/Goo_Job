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
					{{if value="isset($_SESSION['info'])"}}
					<!--判断是否是求职者-->
					{{if value="$_SESSION['info']['distinguish'] eq 1"}}
					<!--<li>
						<a href="" style="border-left: none;">
							消息
						</a>
					</li>-->
					<li>
						<a href="Jobhunter_my.html">
							我的简历
						</a>
					</li>
					<li>
						<a href="Resume_box.html">
							投递箱
						</a>
					</li>
					<!--<li>
						<a href="{{U('Jobhunter/collect')}}">
							收藏夹
						</a>
					</li>-->
					{{endif}}
					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> {{$_SESSION['info']['account']}} </span>-->
						<span class="unick"> {{$_SESSION['info']['username'] ? $_SESSION['info']['username'] : $_SESSION['info']['account'] }} </span>
						<i></i>
						<!--隐藏的个人信息-->
						<ul class="user_dpdown">
							<li>
								<a href="Persona_user.html">
									账号设置
								</a>
							</li>
							<li>
								<a href="Company_adm.html" target="_blank">
									去企业版
								</a>
							</li>
							<li>
								<a href="{{U('Login/out')}}">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!--{{if value="$_SESSION['info']['distinguish'] eq 2"}}
					<li class="showUser">
						<span class="unick" style="border: 0;margin-right: -15px;"> {{$_SESSION['info']['account']}} </span>
					</li>
					<li>
						<a href="{{U('Login/out')}}">
							退出登录
						</a>
					</li>
					{{endif}}-->


					<!--没有session的时候显示登录注册按钮-->
					{{elseif value="empty($_SESSION['info'])"}}
					<li>
						<a href="{{U('Login/index')}}" target="_blank" style="border: 0;">
							登录
						</a>
					</li>
					<li>
						<a href="{{U('Login/register')}}"  target="_blank">
							注册
						</a>
					</li>
					{{endif}}
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
					<a href="SurprisePeas" id="noBorder"{{if value="'ACTION' == 'companylist'"}}class=""{{endif}} class="current"  >
						首页
					</a>
				</li>
				<li>
					<a href="{{U('Index/companylist')}}" {{if value="'ACTION' == 'companylist'"}} class="current"{{endif}}>
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>