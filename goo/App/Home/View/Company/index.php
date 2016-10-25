<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>公司主页</title>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/stylecompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/editcompany.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/lgstyle.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/home/css/company/verify.css"/>
		<!--上传插件-->
	    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">

		<script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/index.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/company/editcompany.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/js/ajaxHunter.js" type="text/javascript" charset="utf-8"></script>
		<!--上传插件-->
    	<script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
    	<!--百度编辑器-->
		<script src="./Public/home/ueditor1_4_3/ueditor.config.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/ueditor1_4_3/ueditor.all.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/home/ueditor1_4_3/lang/zh-cn/zh-cn.js" type="text/javascript" charset="utf-8"></script>

		<!--百度地图-->
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=B1LsYCHodF9iPnqThStn4H7HjZTlQs9v"></script>

	</head>
	<body>
	{{include file="../Common/comHeader"}}
			<ul class="lg_tnav_wrap">
				<li>
					<a href="Company_adm.html" class="current">
						公司
					</a>
				</li>
				<li>
					<a href="comRes.html">
						简历管理
					</a>
				</li>
				<li>
					<a href="myJob_.html">
						职位管理
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--导航栏-->
</header>
<!--/#企业头部-->

<form action="" method="post">
	<div class="top_info">
		<!--展示模式-->
		<div class="top_info_wrap" style="display: block;">
			<img src="{{$oldData['cplogo'] ? $oldData['cplogo'] : './Public/home/imgs/moren/minion.png' }}" draggable="false" class="mr_headimg" alt="{{$oldData['cpshortName']}}">
			<div class="company_info">
				<div class="company_main">
					<a href="javascript:void(0);" class="edit">
						<i></i>编辑
					</a>
					<a href="{{$oldData['url']}}" target="_blank" title=""><h1>{{$oldData['cpshortName']?$oldData['cpshortName']:$oldData['cpname']}}</h1></a>
					<a class="identification">
						<i></i>
						<span>企业认证</span>
					</a>
					<div class="company_word">
						<!--公司简介-->
						{{$oldData['cpintro']?$oldData['cpintro']:'还没有填写公司简介...'}}
						<!--/#公司简介-->
					</div>
				</div>
				<div class="company_data">
					<ul>
						<li>
							<!--公司职位发布数量-->
							<strong>{{$num}} 个</strong>
							<!--/#公司职位发布数量-->
							<br />
							<span title="该公司的在招职位数量">
								<span>招聘职位</span>
								<span class="tip"></span>
							</span>

						</li>
						<li>
							<!--登录时间-->
							<strong>{{date('Y-m-d',$userData['lastLoginTime'])}}</strong>
							<!--/#登录时间-->

							<br />
							<span title="该公司职位管理者最近一次登录时间">
								<span>企业最近登录</span>
								<span class="tip"></span>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!--编辑模式-->
		<div class="top_info_edit" style="display: none;">
				<div class="company_logo_edit">
					<!--企业logo图标头像-->
					<img src="{{$oldData['cplogo'] ? $oldData['cplogo'] : './Public/home/imgs/moren/minion.png' }}" class="mr_headimg" alt="{{$oldData['cpshortName']}}">
					<div class="upload_shadow"></div>
					<div class="upload_text">
						<i></i>
						<span>上传LOGO请小于10M<br />尺寸：170px*170px</span>
					</div>
					<!--上传logo标志图片  插件 uploadify-->
					<div lab="uploadFile" style="opacity: 0;" class="mr_headfile" id="up_tx">
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
					                'fileSizeLimit' : '2000KB',
					                'uploadLimit' : 0,//上传文件数
					                'width':170,
					                'height':170,
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
							/*opacity: 0;*/
						}
					</style>
					<!--/#上传logo插件标志图片-->
				</div>
				<div class="company_info_edit">
					<a href="javascript:void(0);" class="cancel_edit">
						<i></i>取消编辑
					</a>
					<label>
						<span class="redstar">*</span>
						<input type="hidden" name="cpname" value="{{$oldData['cpname']}}" />
						<input type="hidden" name="cpaddress" value="{{$oldData['cpaddress']}}" />
						<input type="hidden" name="license" value="{{$oldData['license']}}" />
						<input type="hidden" name="cpid" value="{{$oldData['cpid']}}" />
						<input type="text" name="cpshortName" maxlength="10" value="{{$oldData['cpshortName']}}" placeholder="请输入公司简称，如：拉勾" />
						<span class="red">（公司简称）</span>
					</label>
					<!--公司名称-->
					<div class="logoname">{{$oldData['cpname']}}</div>
					<!--/#公司名称-->
					<label>
						<span class="redstar">*</span>
						<input type="text" name="cpintro" id="" value="{{$oldData['cpintro']}}" placeholder="一句话概括公司亮点，如：公司愿景、领导团队等" class="long"/>
					</label>
					<input type="submit" value="保存" class="save"/>
					<a href="javascript:void(0);" class="cancel">取消</a>
				</div>
				<!--/#头部编辑-->

		</div>
	</div>
	<!--/#企业头部结束-->

	<!--公司主页导航条-->
	<div class="company_navs">
		<div class="company_navs_wrap">
			<ul>
				<li class="current"><a href="Company_adm.html">公司主页</a></li>
				<!--发布职位统计-->
				<li><a href="CompanyJ_adm.html">招聘职位 ({{$num}})</a></li>
				<!--{{$oldData['count']}}-->
				<!--/#发布职位统计-->
			</ul>
		</div>
	</div>
	<!--/#公司主页导航条结束-->

	<!--主体部分-->
	<div class="main_container">
		<!--左边部分-->
		<div class="container_left">
			<!-----------------------------------------公司介绍 图片-------------------------------------------------------->
			<div class="item_container" id="company_intro">
				<div class="item_title">公司介绍</div>
				<span class="item_ropera">
					<em></em>
					<span class="item_ropetext">编辑</span>
				</span>
				<div class="item_content" >
					{{$oldData['detailed']}}
					{{if value="empty($oldData['detailed'])"}}
					<div class="reviews-empty">
						<span class="empty_icon"></span>
						<span class="empty_text">该公司尚未添加公司介绍</span>
					</div>
					{{endif}}
				</div>
				<!--编辑模式-->
				<div class="item_content_edit" style="display: none;">
					<div class="content_edit_tip">对公司详尽又生动的图文介绍，是吸引应聘者的最佳利器。</div>
					<span class="item_ropera_cancel">
						<em></em>
						<span class="item_ropetext">取消编辑</span>
					</span>
					<div class="item_main_edit">
						<!--调用百度编辑器-->
						<script id="editor" type="text/plain" style="width:100%;height:1000px;" name="detailed">{{$oldData['detailed']}}</script>
					    <script>
					        var ue = UE.getEditor('editor');
					    </script>
						<input type="submit" value="保存" class="save"style="margin-left: 300px;"/>
						<a href="javascript:void(0);" class="cancel2">取消</a>
					</div>
				</div>
				<!--/#编辑模式-->
			</div>
			<!--/#---------------------------------------公司介绍 图片-------------------------------------------------------->

		</div>
		<!--右边部分-->
		<div class="container_right">
			<div class="item_container">
				<div class="item_ltitle">公司基本信息</div>
				<span class="item_ropera2">
					<em></em>
					<span class="item_ropetext">编辑</span>

				</span>
				<!--展示模式-->
				<div class="item_content">
					<ul>
						<li>
							<i class="type"></i>
							<!--公司行业领域-->
							<span>{{$oldData['industry']}}</span>
						</li>
						<li>
							<i class="process"></i>
							<!--公司融资阶段-->
							<span>{{$oldData['financing']}}</span>
						</li>
						<li>
							<i class="number"></i>
							<!--公司规模-->
							<span>{{$oldData['cpscale']}}</span>
						</li>
						<li>
							<i class="address"></i>
							<!--公司地址-->
							<span>{{$oldData['cpaddress']}}</span>
						</li>
						<!--百度地图-->
						<li style="width: 225px;height: 225px;">
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
								myGeo.getPoint("{{$oldData['cpaddress']}}", function(point){
										map.centerAndZoom(point, 16);
										var marker = new BMap.Marker(point);  // 创建标注
										map.addOverlay(marker);
										marker.setAnimation(BMAP_ANIMATION_BOUNCE);
								}, "北京市");
								map.enableScrollWheelZoom(true);
							</script>
						</li>
					</ul>
				</div>
				<!--编辑模式-->
				<div class="item_content_edit_wrap" style="display: none;">
					<div class="item_content_edit">
							<label>
								<select name="industry">
									<option value="{{$oldData['industry']}}" selected="selected">{{$oldData['industry']}}</option>
									<option value="不限">不限</option>
									<option value="移动互联网">移动互联网</option>
									<option value="电子商务">电子商务</option>
									<option value="金融">金融</option>
									<option value="企业服务">企业服务</option>
									<option value="教育">教育</option>
									<option value="文化娱乐">文化娱乐</option>
									<option value="游戏">游戏</option>
									<option value="O2O">O2O</option>
									<option value="硬件">硬件</option>
									<option value="医疗健康">医疗健康</option>
									<option value="生活服务">生活服务</option>
									<option value="广告营销">广告营销</option>
									<option value="旅游">旅游</option>
									<option value="数据服务">数据服务</option>
									<option value="社交网络">社交网络</option>
									<option value="分类信息">分类信息</option>
									<option value="信息安全">信息安全</option>
									<option value="招聘">招聘</option>
									<option value="其他">其他</option>
								</select>
							</label>
							<label>
								<select name="financing">
									<option value="{{$oldData['financing']}}" selected="selected">{{$oldData['financing']}}</option>
									<option value="不限">不限</option>
									<option value="未融资">未融资</option>
									<option value="天使轮">天使轮</option>
									<option value="A轮">A轮</option>
									<option value="B轮">B轮</option>
									<option value="C轮">C轮</option>
									<option value="D轮及以上">D轮及以上</option>
									<option value="上市公司">上市公司</option>
									<option value="不需要融资">不需要融资</option>
								</select>
							</label>
							<label>
								<select name="cpscale">
									<option value="{{$oldData['cpscale']}}" selected="selected">{{$oldData['cpscale']}}</option>
									<option value="少于15人">少于15人</option>
									<option value="15-50人">15-50人</option>
									<option value="50-150人">50-150人</option>
									<option value="150-500人">150-500人</option>
									<option value="500-2000人">500-2000人</option>
									<option value="2000人以上">2000人以上</option>
								</select>
							</label>
							<label>
								地址：<br />
								<input type="text" placeholder="填写企业详细地址" value="{{$oldData['cpaddress']}}" name="cpaddress" />
							</label>
							<input type="hidden" name="uid" id="uid" value="{{$oldData['uid']}}" />
							<input type="submit" value="保存" class="save" style="margin-left: 20px;"/>
							<a href="javascript:void(0);" class="cancel2">取消</a>
							<div class="item_title">公司位置</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--主体部分结束-->


</form>
	<!--底部备案信息-->
	{{include file="../Common/footer"}}

	</body>
</html>