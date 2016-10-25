<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>个人基本信息</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/personaStyle/personalStyle.css">
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/personaStyle/personalStyle1.css">
	    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="./Public/home/js/area.js"></script>
		<script src="./Public/home/js/ajaxHunter.js" type="text/javascript" charset="utf-8"></script>
    	<script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
		<script type="text/javascript">
			$(function(){
				//初始化方法
				area.init('a');
				//修改的时候默认被选中效果
				area.selected("{{$resumeData['area'][0]?$resumeData['area'][0]:0}}","{{$resumeData['area'][1]?$resumeData['area'][1]:0}}","{{$resumeData['area'][2]?$resumeData['area'][2]:0}}");
			})
		</script>
	</head>
	<body>
		<div id="body">
			<div id="lg_header">
				{{include file="../Common/header"}}
				<style type="text/css">
					#noBorder{
						border-bottom: none;
					}
				</style>

				<div id="container">
					<div class="clearfixs mr_uncreate">
						<div class="mr_myresume_l">
							<div id="mr_mr_head">
								<div class="mr_top_bg">
									<img src="{{ $userData['header_pic'] ? $userData['header_pic'] : 'Public/home/imgs/personaPic/default_headpic.png' }}" width="117" height="117" alt="头像" class="mr_headimg">
									<img src="./Public/home/imgs/personaPic/tou_1fee358.png" class="opa" draggable="false">
									<img src="./Public/home/imgs/personaPic/shadow_tx_82750ce.png" class="shadow" style="display: none;">
									<div lab="uploadFile" class="mr_headfile" id="up_tx">
										<!-- file表单 -->
									    <input id="f" type="file" multiple="true" name="headPic" id="up_tx" class="mr_headfile">
									    <script type="text/javascript">
									        $(function() {
									            $('#f').uploadify({
									                'formData'     : {//POST数据
									                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
									                },
									                'fileTypeExts' : '*.jpg;*.png',
									                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
									                'uploader' : '{{U('ajaxF')}}',//指定服务器上传的方法
									                'buttonText':'选择文件',
									                'fileSizeLimit' : '2000KB',
									                'uploadLimit' : 0,//上传文件数
									                'width':117,
									                'height':117,
									                'successTimeout':10,//等待服务器响应时间
									                'removeTimeout' : 0.2,//成功显示时间
									                'onUploadSuccess' : function(file, data, response) {
									                    //把php返回的数据转为json
									                    data=$.parseJSON(data);
									                    //获得图片地址
									                    var imageUrl = data.url;
									                    $(".mr_headimg").attr('src',imageUrl);
									                }
									            });
									        });
									    </script>
									</div>
									<style type="text/css">
										.uploadify{
											opacity: 0;
										}
									</style>
								</div>
								<!--/#头像上传-->

								<div class="mr_baseinfo">
									<i class="mr_left_bg"></i>
									<i class="mr_right_bg"></i>

									<div class="mr_p_name mr_w604 clearfixs">
										<!--判断用户数据是否存在用户名,如果没有的话就给默认的账号名-->
										{{if value="empty($userData['username'])"}}
										<span class="mr_edit dn"><i></i><em>编辑</em></span><span class="mr_name">{{$userData['account']}}</span>
										{{elseif value="!empty($userData['username'])"}}
										<span class="mr_edit dn"><i></i><em>编辑</em></span><span class="mr_name">{{$userData['username']}}</span>
										{{endif}}
										<!--/#判断用户数据是否存在用户名,如果没有的话就给默认的账号名-->
									</div>
									<form id="nameForm" action="javascript:;" method="post">
										<div class="mr_name_edit dn">
											{{if value="empty($userData['username'])"}}
											<input type="text" id="mr_name" value="{{$userData['account']}}" maxlength="10" name="username" class="ed_name" autocomplete="off">
											{{elseif value="!empty($userData['username'])"}}
											<input type="text" id="mr_name" value="{{$userData['username']}}" maxlength="10" name="username" class="ed_name" autocomplete="off">
											{{endif}}
											<input type="submit" id="nameSave" class="save" value="保存">
											<a href="javascript:;" class="cancel">取消</a>
										</div>
									</form>
<!--//---------------ajax处理用户名------------------->
<script type="text/javascript">
	$("#nameSave").click(function(){
		var oldName = $("#mr_name").val();
		$.ajax({
			type:"post",
			url:'{{U("Jobhunter/ajaxName")}}',
			data:{username:oldName},
			dataType:"JSON",
			success:function(phpData){
//				console.log(phpData);//在console打印php返回的数据
				$("#mr_name").val(phpData);//修改vavlue值
				$(".mr_name").html(phpData);//修改页面的内容
				$(".mr_p_name ").show();
				$(".mr_name_edit").addClass('dn');
			}
		});
	})
</script>
<!--/#---------------ajax处理用户名------------------->
									<div class="mr_p_info mr_w604 clearfixs" style="display: block;">
										<div class="info_t">
											<!--学历-->
											<span class="xl"><i></i><em>{{$resumeData['education']}}</em></span>
											<!---->
											<span class="gzjy"><i></i><em>{{$resumeData['experience']}}</em></span>
											<span class="city"><i></i><em>{{$resumeData['area'][0]}}</em></span>
										</div>
										<div class="info_b">
											<span class="mobile"><i></i><em>{{$resumeData['cellphone']}}</em></span>
											<span class="email"><i></i><em title="{{$resumeData['email']}}">{{$resumeData['email']}}</em></span>
										</div>
									</div>
									<form id="infoForm" action="" method="post">
										<div class="mr_info_edit">
											<label>显示身份</label>
											<div class="form_wrap">
												<input type="text" name="position" maxlength="20" class="mr_input valid" value="{{$resumeData['position']}}" placeholder="工程师,设计师,高级管理...">
											</div>

											<label>性别</label>
												<select name="sex" class="selects" >
													<option value="男" {{if value="$resumeData['sex'] eq '男' "}}selected{{endif}}>男</option>
													<option value="女" {{if value="$resumeData['sex'] eq '女'"}}selected{{endif}}>女</option>
													<option value="保密" {{if value="$resumeData['sex'] eq '保密' "}}selected{{endif}}>保密</option>
												</select>
											<br /><br />
											<label>年龄</label>
											<div class="form_wrap">

												<input type="text" name="age" value="{{$resumeData['age']}}" maxlength="2" class="mr_input valid" style="width: 90%;height: 100%;">
											</div>
											<br />
											<label>最高学历</label>
												<select name="education" class="selects">
													<option value="其他" {{if value="$resumeData['education'] eq '其他' "}}selected{{endif}}>其他</option>
													<option value="大专" {{if value="$resumeData['education'] eq '大专' "}}selected{{endif}}>大专</option>
													<option value="本科" {{if value="$resumeData['education'] eq '本科' "}}selected{{endif}}>本科</option>
													<option value="硕士" {{if value="$resumeData['education'] eq '硕士' "}}selected{{endif}}>硕士</option>
													<option value="博士" {{if value="$resumeData['education'] eq '博士' "}}selected{{endif}}>博士</option>
												</select>
											<br /><br />

											<label>工作年限</label>
											<select name="experience" class="selects">
													<option value="应届毕业生">应届毕业生</option>
													<option value="1年" {{if value="$resumeData['experience'] eq '1年' "}}selected{{endif}}>1年</option>
													<option value="2年" {{if value="$resumeData['experience'] eq '2年' "}}selected{{endif}}>2年</option>
													<option value="3年" {{if value="$resumeData['experience'] eq '3年' "}}selected{{endif}}>3年</option>
													<option value="4年" {{if value="$resumeData['experience'] eq '4年' "}}selected{{endif}}>4年</option>
													<option value="5年" {{if value="$resumeData['experience'] eq '5年' "}}selected{{endif}}>5年</option>
													<option value="6年" {{if value="$resumeData['experience'] eq '6年' "}}selected{{endif}}>6年</option>
													<option value="7年" {{if value="$resumeData['experience'] eq '7年' "}}selected{{endif}}>7年</option>
													<option value="8年" {{if value="$resumeData['experience'] eq '8年' "}}selected{{endif}}>8年</option>
													<option value="9年" {{if value="$resumeData['experience'] eq '9年' "}}selected{{endif}}>9年</option>
													<option value="10年" {{if value="$resumeData['experience'] eq '10年' "}}selected{{endif}}>10年</option>
													<option value="10年以上" {{if value="$resumeData['experience'] eq '10年以上' "}}selected{{endif}}>10年以上</option>
											</select>
											<br />
											<br />
											<script type="text/javascript">
												$(function(){
													//初始化方法
													area.init('area');
													//修改的时候默认被选中效果
//													area.selected("","","");
												})
											</script>
											<label>所在地区</label>
											<div>
												<select name="area[]" id="a1" class="selects" style="width: 22%;margin-right: 15px;">

												</select>
												<select name="area[]" id="a2" class="selects" style="width: 22%;margin-right: 15px;">

												</select>
												<select name="area[]" id="a3" class="selects" style="width: 22%;margin-right: 15px;">

												</select>
											</div>
											<br />
											<label>个人介绍</label>
											<div class="form_wrap">
												<input type="text" name="introductions" class="mr_input valid" value="{{$resumeData['introductions']?$resumeData['introductions']:'未填写'}}">
											</div>
											<label>电话</label>
											<div class="form_wrap">
												<input id="mr_mobile" type="text"  onkeyup="if(/\D/.test(this.value)){alert('只能输入数字');this.value='';}" name="cellphone" class="mr_input valid" value="{{$resumeData['cellphone']?$resumeData['cellphone']:'未填写'}}">
												<i class="mr_locks"><em style="display: none;">在简历中保密，仅投递后对方才可查看<i></i></em>
												</i>
											</div>

											<label>邮箱</label>
											<div class="form_wrap">
												<input id="mr_email" type="text" name="email" class="mr_input valid" value="{{$resumeData['email']}}">
												<input type="hidden" id="sess_email" value="{{$resumeData['email']?$resumeData['email']:'未填写'}}">
												<i class="mr_locks"><em style="display: none;">在简历中保密，仅投递后对方才可查看<i></i></em>
												</i>
											</div>

											<br />

											<div class="mr_ope">
												<!-- 最后修改时间 -->
												<input type="hidden" name="LastTime" id="LastTime" value="" />
												<!-- 简历jid -->
												<input type="hidden" name="rid" id="rid" value="{{$resumeData['rid']}}" />
												<input type="submit" class="mr_save" value="保存">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="mr_myresume_r">
							<div class="mr_r_nav">
								<ul class="clearfixs">
									<li>
										<a href="{{U('Jobhunter/send')}}" target="_blank">投递箱<i class="td"></i></a>
									</li>
									<!--<li>
										<a href="{{U('Jobhunter/collect')}}" target="_blank">收藏夹<i class="sc"></i></a>
									</li>-->
									<li>
										<a href="{{$resumeData['file'] ? $resumeData['file'] : 'javascript:;' }}" target="_blank" class="file_ajax">简历文件<i class="yq"></i></a>
									</li>
									<li>
										<a href="{{U('Persona/index')}}">修改密码<i class="dy"></i></a>
									</li>
								</ul>
							</div>
							<div class="mr_upload">
								<i></i>
								<a class="inline cboxElement" href="javascript:;" title="上传附件简历">
									{{if value="empty($resumeData['file'])"}}
										<span style="color:red ;">上传附件简历才能进行投递</span>
										<span style="color: #009900;display: none;" class="hidyiyou">已有附件简历(重新上传)</span>
									{{elseif value="!empty($resumeData['file'])"}}
										<span style="color: #009900;">已有附件简历(重新上传)</span>
									{{endif}}
								</a>
								<!--上传文件插件uploadify-->
								<div lab="uploadFile1">
									<!-- file表单 -->
								    <input id="word" type="file" multiple="true">
								    <span></span>
								    <script type="text/javascript">
					        			$(function() {
								            $('#word').uploadify({
								                'formData'     : {//POST数据
								                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
								                },
								                'fileTypeExts' : '*.word;*.pdf;*.ppt;*.txt;*.wps',
								                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
								                'uploader' : '{{U('updalodResume')}}',//指定服务器上传的方法
								                'buttonText':'选择文件',
								                'fileSizeLimit' : '50000KB',
								                'uploadLimit' : 0,//上传文件数
								                'width':280,
								                'height':57,
								                'successTimeout':10,//等待服务器响应时间
								                'removeTimeout' : 0.2,//成功显示时间
								                'onUploadSuccess' : function(file, data, response) {
								                    //把php返回的数据转为json
								                    data=$.parseJSON(data);
								                    //获得文件路径地址
								                    var fileUrl = data.url;
								                    alert(fileUrl);
								                    $(".hidyiyou").show();
								                    $("#iframeUp").attr('src',fileUrl);
								                }
								            });
					            		});
								    </script>
								</div>
								<!--/#上传文件插件uploadify-->
							</div>
							{{if value="!empty($resumeData['file'])"}}
								<iframe src="{{$resumeData['file']}}" id="iframeUp" width="277" height="500"></iframe>
							{{endif}}
						</div>
					</div>


				</div>
			</div>
			{{include file="../Common/footer"}}
	</body>
</html>