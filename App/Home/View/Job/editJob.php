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
		<!--城市联动插件-->
		<script type="text/javascript" src="./Public/home/js/area.js"></script>
		<!--//编辑器插件-->
		<link rel="stylesheet" type="text/css" href="./Public/home/simditor-2.3.6/styles/simditor.css" />
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/module.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/uploader.js"></script>
		<script type="text/javascript" src="./Public/home/simditor-2.3.6/scripts/simditor.js"></script>
		<!--启动城市联动-->
		<script type="text/javascript">
			$(function(){
				//初始化方法
				area.init('area');
				//修改的时候默认被选中效果
				area.selected("{{$oldJobData['districtData']['city']['district_name']}}","{{$oldJobData['districtData']['shiqu']['district_name']}}","{{$oldJobData['districtData']['area']}}");
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
			 		<dd><a href="{{U('Job/index')}}">有效职位</a></dd>
			 		<dd><a href="">已下线职位</a></dd>
			 	</dl>
			 </div>
			<!--左侧 我收到的简历  结束-->
			 
			 <!--中间主体内容-->
			 <div class="content">
			 	<dl>
				 	<dt class="dlTitle"><h1>编辑职位<em></em></h1></dt>
				 	<dd class="contentDd">
				 		<form action="" id="jobForm" method="post">
				 			<!--一-->
				 			<table class="btm">
				 				<!--职位类别-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位类别</td>
				 					<td>
				 						<input type="button" class="selectr selectr_380" name="cname" id="select_category" value="{{$cateData}}" />
				 						<input type="hidden" name="cname" id="cname" value="{{$cateData}}" />
				 						<!--选择列表  隐藏-->
				 						<div id="box_job">
				 							<!--数据-->
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
				 					<td><input type="text" class="valid" value="{{$oldJobData['jname']}}" name="jname" id="jobName" maxlength="10" placeholder="JAVA PHP C++ iOS测试 前端开发 技术经理 技术总监 架构师 CTO" /></td>
				 				</tr>
				 				<!--所属部门-->
				 				<tr>
				 					<td></td>
				 					<td>所属部门</td>
				 					<td><input type="text" class="valid" name="department" id="" value="{{$oldJobData['department']}}" placeholder="请输入所属部门" /></td>
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
				 							<li {{if value="$oldJobData['nature'] eq '全职'"}}class="current"{{endif}} >全职
				 								<em></em>
				 								<input type="radio" name="nature" value="全职" {{if value="$oldJobData['nature'] eq '全职'"}}checked{{endif}} />
				 							</li>
				 							<li {{if value="$oldJobData['nature'] eq '兼职'"}}class="current"{{endif}} >兼职
				 								<em></em>
				 								<input type="radio" name="nature" value="兼职" {{if value="$oldJobData['nature'] eq '兼职'"}}checked{{endif}}  />
				 							</li>
				 							<li {{if value="$oldJobData['nature'] eq '实习'"}}class="current"{{endif}} >实习
				 								<em></em>
				 								<input type="radio" name="nature" value="实习" {{if value="$oldJobData['nature'] eq '实习'"}}checked{{endif}}  />
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
											<option value="{{$oldJobData['districtData']['city']['district_name']}}"></option>
										</select>                                                      
										<select name="city[]" id="area2" class="selects" style="width: 27%;margin-right: 15px;">
											<option value="{{$oldJobData['districtData']['shiqu']['district_name']}}"></option>
										</select>                                                      
										<select name="city[]" id="area3" class="selects" style="width: 27%;margin-right: 15px;">
											<option value="{{$oldJobData['districtData']['area']}}"></option>
										</select>
				 						<!--/#做个ajax后台判断,该城市名是否开通服务*****************************************************************************************-->
					 					<input type="hidden" name="city[]" id="" value="{{$oldJobData['districtData']['city']['district_name']}}" />
					 					<input type="hidden" name="city[]" id="" value="{{$oldJobData['districtData']['shiqu']['district_name']}}" />
					 					<input type="hidden" name="city[]" id="" value="{{$oldJobData['districtData']['area']}}" />
				 					</td>

				 					<td id='hint' style="display: none;"><span></span></td>
				 					<td id="hintW" style="display: none;"><span class="bigSpan"><span class="hov">该城市暂未开通招聘服务</span></span></td>
				 				</tr>
				 				<tr>
			 						<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">工作地址</td>
				 					<td>
				 						<input type="text" name="place" id="" value="{{$oldJobData['place']}}" class="input_520" placeholder="请输入详细的工作地址" />
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
				 								<input type="text" name="money[]" value="{{$oldJobData['money_a']}}" id="money_a" class="money_int" placeholder="最低月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 								<input type="hidden" name="money_a" id="hidoney_a" value="{{$oldJobData['money_a']}}" />
				 							</div>
				 							<!--最高月薪-->
				 							<div>
				 								<input type="text" name="money[]" value="{{$oldJobData['money_b']}}" id="money_b" class="money_int" placeholder="最高月薪" onkeyup="if(!/^\d+$/.test(this.value)) tip.innerHTML='必须输入整数，且不能有空格。'; else tip.innerHTML='';" /><span>K</span>
				 								<input type="hidden" name="money_b" id="hidoney_b" value="{{$oldJobData['money_b']}}" />
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
				 							<option value="不限" {{if value="$oldJobData['experience'] eq '不限'"}}selected{{endif}}>不限</option>
				 							<option value="应届毕业生" {{if value="$oldJobData['experience'] eq '应届毕业生'"}}selected{{endif}}>应届毕业生</option>
				 							<option value="3年及以下" {{if value="$oldJobData['experience'] eq '1年'"}}selected{{endif}}>3年及以下</option>
				 							<option value="3-5年" {{if value="$oldJobData['experience'] eq '2年以上'"}}selected{{endif}}>3-5年</option>
				 							<option value="5-10年" {{if value="$oldJobData['experience'] eq '5年以上'"}}selected{{endif}}>5-10年</option>
				 							<option value="10年以上" {{if value="$oldJobData['experience'] eq '10以上'"}}selected{{endif}}>10年以上</option>
				 						</select>
				 					</td>
				 				</tr>
				 				<!--学历要求-->
				 				<tr>
				 					<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">学历要求</td>
				 					<td>
				 						<select name="education" class="selectr info-select">
				 							<option value="不限" {{if value="$oldJobData['education'] eq '不限'"}}selected{{endif}}>不限</option>
				 							<option value="大专" {{if value="$oldJobData['education'] eq '大专'"}}selected{{endif}}>大专</option>
				 							<option value="博士" {{if value="$oldJobData['education'] eq '博士'"}}selected{{endif}}>博士</option>
				 							<option value="本科" {{if value="$oldJobData['education'] eq '本科'"}}selected{{endif}}>本科</option>
				 							<option value="硕士" {{if value="$oldJobData['education'] eq '硕士'"}}selected{{endif}}>硕士</option>
				 						</select>
				 					</td>
				 				</tr>
				 			</table>
				 			<!--四-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位诱惑</td>
				 					<td><input type="text" name="tempt" id="" value="{{$oldJobData['tempt']}}" class="input_520" maxlength="20" placeholder="20字描述该职位的吸引力，如：福利待遇、发展前景等" /></td>
			 					</tr>
				 			</table>
				 			<!--五 提交-->
				 			<table class="btm">
				 				<tr>
					 				<td width="25"><span class="redstar">*</span></td>
				 					<td width="85">职位描述</td>
				 					<td>
				 						<span style="color: #D9D9D9;">(建议分条描述工作职责等。请勿输入公司邮箱、联系电话及其他外链)</span>
				 						<!--文本编辑器插件-->
									    <textarea id="editor" name="describe" maxlength="800" placeholder="请详细描述你要招聘职位的信息(最多1000字,超出将自动删除)" autofocus>{{$oldJob_Data_S['describe']}}</textarea>
				 						<!--/#文本编辑器插件-->
				 					</td>
			 					</tr>
				 			</table>
		 					<!--提交按钮-->
		 					<input type="hidden" name="jid" id="" value="{{Q('get.jid')}}" />
 							<input type="submit" value="修改" class="btnFB" />
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