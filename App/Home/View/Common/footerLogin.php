<?php
	$ComModel = new \Common\Model\Company;
	$JobModel = new \Common\Model\Job;
	
	$countCom = $ComModel->count();
	$countJob = $JobModel->count();
?>	
<!--底部登录条-->
		<div id="logintool">
			<div>
				<em></em>
				<img src="./Public/home/imgs/login/footbar_logo_e2fde1b.png"/>
				<!--<span class="companycount"> <i style="background-position-y: -30px;"></i><i style="background-position-y: -60px;"></i><i style="background-position-y: -60px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: -180px;"></i><i style="background-position-y: -60px;"></i> </span>
				<span class="jobscount"> <i style="background-position-y: -30px;"></i><b></b><i style="background-position-y: -240px;"></i><i style="background-position-y: -90px;"></i><i style="background-position-y: -270px;"></i><b></b><i style="background-position-y: -60px;"></i><i style="background-position-y: 0px;"></i><i style="background-position-y: 0px;"></i> </span>-->
				<span class="companycount"> {{$countCom}}</span>
				<span class="jobscount">{{$countJob}}</span>
				
				<a href="javascript:;" class="bar_login">
					<i></i>
				</a>
				<div class="lt_r">
					<a href="{{U('Login/register')}}" target="_blank">
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
										url:"{{U('Login/modalAjax')}}",
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
								<a href="{{U('Login/register')}}" class="registor_now" target="_blank">
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