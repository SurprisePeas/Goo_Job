<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>职位管理 发布简历</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/home_banner.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/biCss/createStyle.css"/>
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/js.js" type="text/javascript" charset="utf-8"></script>
		
		<!--//编辑器插件-->
		<link rel="stylesheet" type="text/css" href="./Public/home/simditor-2.3.6/styles/simditor.css" />
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/module.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/uploader.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/simditor.js"></script>
		
		<!--城市联动-->
		<script type="text/javascript" src="./Public/home/js/area.js"></script>
		<script type="text/javascript">
			$(function(){
				//初始化方法
				area.init('area');
				//修改的时候默认被选中效果
				 area.selected('北京市','北京','东城区');
			})
	</script>
	</head>
	<body>
		<!--顶端头部黑条-->
		{{include file="../Common/comHeader"}}
					<!--//首页公司-->
					<ul class="lg_tnav_wrap">
						<li>
							<a href="{{U('Company/index')}}">
								公司
							</a>
						</li>
						<li>
							<a href="{{U('Resume/index')}}">
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
			 		<dd><a href="{{U('Job/index')}}">有效职位</a></dd>
			 		<dd><a href="">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl>
				 	<dt class="dlTitle"><h1>发布新职位<em></em></h1></dt>
				 	<dd class="contentDd">
				 		<form action="" id="jobForm" method="post">
				 			<!--一-->
				 			<table class="btm">
				 				<!--职位类别-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位类别</td>
				 					<td>
				 						<input type="button" class="selectr selectr_380" name="cname" id="select_category" value="选择职位类别" />
				 						<input type="hidden" name="cname" id="cname" value="请选择" />
				 						<!--选择列表  隐藏-->
				 						<div id="box_job">
				 							<!--假数据-->
				 							{{foreach from="$TopCategoryData" value="$TopV"}}
				 							<dl>
				 								<dt class="dtTage">{{$TopV['cname']}}</dt>
				 								<dd>
				 									<!--方块标签显示-->
				 									<ul class="reset">
				 										{{foreach from="$TopV['son']" value="$sv"}}
				 										<li>
				 											<span>{{$sv['cname']}}</span>
				 											<ul class="job_sub">
				 												{{foreach from="$sv['son']" value="$gv"}}
				 												<li>{{$gv['cname']}}</li>
				 												{{endforeach}}
			 												</ul>
				 										</li>
				 										{{endforeach}}
				 									</ul>
				 									<!--/#方块标签显示-->
				 								</dd>
				 							</dl>
				 							{{endforeach}}
				 						</div>
				 						<!--/#选择列表-->
				 					</td>
				 				</tr>
				 				<!--职位名称-->
				 				<tr>
				 					<td><span class="redstar">*</span></td>
				 					<td>职位名称</td>
				 					<td><input type="text" class="valid" name="jname" maxlength="20" id="jobName" placeholder="JAVA PHP C++ iOS测试 前端开发 技术经理 技术总监 架构师 CTO" /></td>
				 				</tr>
				 				<!--所属部门-->
				 				<tr>
				 					<td></td>
				 					<td>所属部门</td>
				 					<td><input type="text" class="valid" name="department" id="" value="" maxlength="10" placeholder="请输入所属部门" /></td>
				 				</tr>
				 			</table>
				 			<!--二-->
				 			<table class="btm">
				 				<!--工作性质-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作性质</td>
				 					<td>
				 						<ul class="profile_radio">
				 							<li class="current">全职
				 								<em></em>
				 								<input type="radio" name="nature" value="全职" checked="checked" />
				 							</li>
				 							<li>兼职
				 								<em></em>
				 								<input type="radio" name="nature" value="兼职" />
				 							</li>
				 							<li>实习
				 								<em></em>
				 								<input type="radio" name="nature" value="实习" />
				 							</li>
				 						</ul>
				 					</td>
				 				</tr>
				 				<!--ajax处理获取到的地区名称  后台查询是否有此城市,便于页面进行筛选-->
				 				<script type="text/javascript">
				 					$(function(){
				 						$("#area3,#area1,#area2").bind("change",function(){
				 							var area_val = $("#area3").val();
				 							$.ajax({
				 								type:"post",
				 								url:"{{U('Job/ajaxArea')}}",
				 								dataType:"JSON",
				 								data:{val:area_val},
				 								success:function(phpData){
				 									console.log(phpData);
				 									//正确,可查询到
				 									if(phpData){
				 										$("#hintW").hide();
				 										$("#hint").show();
				 									}else{
				 										$("#hint").hide();
				 										$("#hintW").show();
				 									}
				 								}
				 							});
				 						})
				 					})
				 				</script>
				 				<!--/#ajax处理获取到的地区名称  后台查询是否有此城市,便于页面进行筛选-->
				 				<!--工作城市-->
				 				<tr class="area">

				 					<td><span class="redstar">*</span></td>
				 					<td>工作城市</td>
				 					<td>
				 						<!--做个ajax后台判断,该城市名是否开通服务*****************************************************************************************-->
										<select name="city[]" id="area1" class="selects" style="width: 27%;margin-right: 15px;">
										</select>                                                      
										<select name="city[]" id="area2" class="selects" style="width: 27%;margin-right: 15px;">
										</select>                                                      
										<select name="city[]" id="area3" class="selects" style="width: 27%;margin-right: 15px;">
										</select>
				 						<!--/#做个ajax后台判断,该城市名是否开通服务*****************************************************************************************-->
				 					</td>
				 					<td id='hint' style="display: none;"><span></span></td>
				 					<td id="hintW" style="display: none;"><span class="bigSpan"><span class="hov">该城市暂未开通招聘服务</span></span></td>
				 				</tr>
				 				<tr>
			 						<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作地址</td>
				 					<td>
				 						<input type="text" name="place" id="" maxlength="50" value="" class="input_520" placeholder="请输入详细的工作地址" />
				 					</td>
				 				</tr>
				 				<!--/#工作城市-->
				 				
				 				<!--月薪范围-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">月薪范围</td>
				 					<td>
				 						<div class="salary_range">
				 							<!--最低月薪-->
				 							<div>
				 								<!--用于存字符串,页面输出(错误思路,后期添加,但这样方便页面拿数据)-->
				 								<input type="text" maxlength="3" name="money[]" id="money_a" class="money_int" placeholder="最低月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 								<!--用于存单数-->
				 								<input type="hidden" maxlength="3" name="money_a" id="hidoney_a" value="" />
				 							</div>
				 							<!--最高月薪-->
				 							<div>
				 								<input type="text" name="money[]" id="money_b" class="money_int" placeholder="最高月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 								<input type="hidden" name="money_b" id="hidoney_b" value="" />
				 							</div>
				 							<span id="warning_msg">只能输入整数，如：9</span>
			 								<p id="tip" style="color: red;font-size: 16px;"></p>

				 						</div>
				 					</td>
				 				</tr>
				 				<!--/#月薪范围 -->
				 			</table>
				 			<!--三-->
				 			<table class="btm">
				 				<!--工作经验-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作经验</td>
				 					<td>
				 						<select name="experience" class="selectr info-select">
				 							<option value="不限">不限</option>
				 							<option value="应届毕业生">应届毕业生</option>
				 							<option value="3年及以下">3年及以下</option>
				 							<option value="3-5年">3-5年</option>
				 							<option value="5-10年">5-10年</option>
				 							<option value="10年以上">10年以上</option>
				 						</select>
				 					</td>
				 				</tr>
				 				<!--学历要求-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">学历要求</td>
				 					<td>
				 						<select name="education" class="selectr info-select">
				 							<option value="不限">不限</option>
				 							<option value="大专">大专</option>
				 							<option value="本科">本科</option>
				 							<option value="硕士">硕士</option>
				 							<option value="博士">博士</option>
				 						</select>
				 					</td>
				 				</tr>
				 			</table>
				 			<!--四-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位诱惑</td>
				 					<td><input type="text" name="tempt" id="" value="" class="input_520" maxlength="20" placeholder="20字描述该职位的吸引力，如：福利待遇、发展前景等" /></td>
			 					</tr>
				 			</table>
				 			<!--五 提交-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位描述</td>
				 					<td>
				 						
				 						<!--文本编辑器插件-->
									    <textarea id="editor" name="describe" maxlength="800" placeholder="请详细描述你要招聘职位的信息" autofocus></textarea>
				 						<!--/#文本编辑器插件-->
									    
				 					</td>
			 					</tr>
				 			</table>
		 					<!--提交按钮-->
 							<input type="submit" value="发布" class="btnFB" />
				 		</form>
				 	</dd>
			 	</dl>
			 </div>
			 <!--中间主体内容 结束-->
		</div>
		<!--/#container-->
		
		<!--底部备案信息-->
		{{include file="../Common/footer"}}
		
		<script type="text/javascript">
			var editor = new Simditor({
			  textarea: $('#editor')
			});
		</script>
	</body>
</html>