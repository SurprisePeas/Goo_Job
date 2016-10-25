<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/persona/personalsettings.css"/>
		<!--上传文件插件-->
	    <link rel="stylesheet" type="text/css" href="./Public/uploadify/uploadify.css">
	    	
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/persona/personalsettings.js" type="text/javascript" charset="utf-8"></script>
		<!--上传文件插件-->
    	<script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
		
	</head>
	<body>
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
					                
					<!--判断是否是求职者-->
					                
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
						<a href="http://localhost/goo/index.php?m=Home&c=Jobhunter&a=collect">
							收藏夹
						</a>
					</li>-->
					
               					<li class="showUser">
						<!--页面显示用户名,账号-->
						<!--<span class="unick"> geren1111 </span>-->
						<span class="unick"> 美国队长 </span>
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
								<a href="http://localhost/goo/index.php?m=Home&c=Login&a=out">
									退出
								</a>
							</li>
						</ul>
					</li>

					<!---->


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
					<a href="http://localhost/goo/index.php?m=Home&c=Index&a=companylist" >
						公司
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>		
	<!--顶部黑色区域-->
	<!--主体部分-->
	<div id="Create_container">
			<!--左侧 我收到的简历-->
			 <div class="sidebar">
			 	<!--我收到的简历-->
			 	<dl class="company_center_aside">
			 		<dt>账号设置</dt>
			 		<dd class="active"><a href="Persona.html">个人信息</a></dd>
			 		<!--<dd><a href="">邮箱绑定</a></dd>-->
			 		<dd><a href="Persona_password.html">修改密码</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl class="c_section">
			 		<dt>
			 			<h1>
			 				<em></em>个人信息
			 			</h1>
			 		</dt>
			 		<dd>
			 			<div class="userinfo_tips">
			 				此信息用于站内的沟通、社区等功能
			 			</div>
			 			<div class="userinfo_edit">
			 				<form action="<?php echo U('Persona/index')?>" method="post">
			 					<!--上传头像-->
			 					<div class="avatar">
			 						<img src="<?php echo $userData['shequ_pic'] ? $userData['shequ_pic'] : './Public/home/imgs/personaPic/default_headpic.png'?>" class="default_head"/>
									<img src="./Public/home/imgs/personaPic/shadow_tx_82750ce.png" class="shadow"/>
									<!-- file表单 -->
									<div lab="uploadFile" class="mr_headfile" id="up_tx">
										<!-- file表单 -->
									    <input id="f" type="file" multiple="true" name="shequ_pic" id="up_tx" class="mr_headfile">
									    <script type="text/javascript">
									        $(function() {
									            $('#f').uploadify({
									                'formData'     : {//POST数据
									                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
									                },
									                'fileTypeDesc' : '上传头像',//上传描述
									                'fileTypeExts' : '*.jpg;*.png',
									                'swf'      : '<?php echo __PUBLIC__?>/uploadify/uploadify.swf',
									                'uploader' : '<?php echo U('ajaxF')?>',
									                'buttonText':'上传头像',
									                'fileSizeLimit' : '2000KB',
									                'uploadLimit' : 1,//上传文件数
									                'width':80,
									                'height':80,
									                'successTimeout':10,//等待服务器响应时间
									                'removeTimeout' : 0.2,//成功显示时间
									                'onUploadSuccess' : function(file, data, response) {
														//转为json
									                    data=$.parseJSON(data);
									                    //获得图片地址
									                    var imageUrl = data.url;
									                    $(".default_head").attr('src',imageUrl);
									                }
									            });
									        });
									    </script>
									</div>
									
			 					</div>
			 					<!--修改昵称-->
			 					<div class="username_box">
			 						<label>昵称</label>
			 						<input type="text" name="username"  maxlength="16" id="username" value="<?php echo $userData['username']?$userData['username']:'未填写'?>" />
			 					</div>
			 					<!--修改性别-->
			 					<div class="userinfo_sex">
			 						<span>性别</span>
			 						<input type="radio" name="sex" id="userinfoEditSexMale" value="男" checked="checked" />
			 						<label for="userinfoEditSexMale">男</label>
			 						<input type="radio" name="sex" id="userinfoEditSexFemale" value="女" />
			 						<label for="userinfoEditSexFemale">女</label>
			 					</div>
			 					<button>保存</button>
			 					
			 				</form>
			 			</div>
			 		</dd>
			 	</dl>
			 </div>
			 <!--中间主体内容 结束-->
		</div>
	
	
	<!--主体部分结束-->
	
	
	
	
	<!--回到顶部-->
	<a href="javascript:void(0);" id="back"></a>
	<!--回到顶部结束-->
	

	<!--底部区域-->
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
	<!--底部区域结束-->
	
	
	
	</body>
</html>

















