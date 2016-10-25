$(function(){
//	首页

//	用户:个人信息隐藏显示
	$(".showUser").hover(function(){
		$(".user_dpdown").show();
	},function(){
		$(".user_dpdown").hide();
	});
	
//	轮播图
	var c = 0;//总管变量
	var t;
	function run(){
		c++;
//		执行3次后,调回零
		c = c==3?0:c;
//		减小top值向上移动
		var top = c*-160;
//		1运动轮播图ul
		$(".banner_bg").stop().animate({
			'top':top+'px'
		},300);
//		2右侧小图
		$(".banner_control em").stop().animate({
			'top':c*55+'px'
		})
//		3遮罩层
		$(".banner_control .thumbs li").eq(c).addClass('current').siblings('li').removeClass('current');
	}//run()
//	定时器自动执行run方法
	timer = setInterval(run,3000);
	
//	移入清理定时器 移除时调用timer
	$(".banner_bg li").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(run,3000);
	})
	
//	右侧移入事件
	$(".banner_control .thumbs li").hover(function(){
		var num = $(this);
		clearInterval(timer);
		clearTimeout(t);
		t = setTimeout(function(){
			c = num.index();
			$(".banner_bg").stop().animate({
				'top':c*-160+'px'
			},200);
			
			$(".banner_control em").stop().animate({
			'top':c*55+'px'
			})
			$(".banner_control .thumbs li").eq(c).addClass('current').siblings('li').removeClass('current');
		},200)
	},function(){
		timer = setInterval(run,3000);
	})
	
//	点击最热,最新职位添加属性
	$(".hotTab").click(function(){
		$(".hot_posHotPosition").removeClass('hid');
		$(".new_posHotPosition").addClass('hid');
		$(".hotTab").addClass('current');
		$(".newTab").removeClass('current');
	})
	$(".newTab").click(function(){
		$(".hot_posHotPosition").addClass('hid');
		$(".new_posHotPosition").removeClass('hid');
		$(".hotTab").removeClass('current');
		$(".newTab").addClass('current');
	})
	
//	登录界面
	$("#all_cover").click(function(){
		$(this).fadeOut().stop().animate({opacity:'0'},300,function(){
			$("#all_cover").hide();
		});
		$("#colorbox").fadeOut();
		$(".username #input_tips").html('').hide();
		$(".password #input_tips").html('').hide();
		$("#email").val("");
		$("#ipassword").val("");
	})
	$("#logintool a.bar_login").click(function(){
		$("#all_cover").fadeIn().stop().animate({opacity:'0.9'},300,function(){
			$("#all_cover").show();
		})
		$("#colorbox").fadeIn();
	})
	
//	关闭按钮点击事件
	$("#close").click(function(){
		$("#all_cover").fadeOut().stop().animate({opacity:'0'},300,function(){
			$("#all_cover").hide();
		});
		$("#colorbox").fadeOut();
		$(".username #input_tips").html('').hide();
		$(".password #input_tips").html('').hide();
		$("#email").val("");
		$("#ipassword").val("");
	})
	
//	登录信息验证事件
	$("#email").blur(function(){
		var val = $(this).val();
		var re1 = / +/i;
//		邮箱验证
//		var re2 = /^1(33|80|88|77|52|86|35)\d{8}$|^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/i;
		var re2 = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){8,16}$/;

		var a = re1.test(val);
		var b = re2.test(val);
		if (!val || a) {
			$(".username #input_tips").html('请输入已注册的账号').show();
		}else if(!b){
			$(".username #input_tips").html('请输入有效的账号').show();
		}else{
			$(".username #input_tips").html('').hide();
		}
	})
	
	$("#ipassword").blur(function(){
		var val = $(this).val();
		var re1 = / +/i;
		var re2 = /^(?!\d+$)(?![a-z]+$).+$/i;
		var a = re1.test(val);
		var b = re2.test(val);
		if (!val || a) {
			$(".password #input_tips").html('请输入密码').show();
		}else if(!b){
			$(".password #input_tips").html('请输入6-16位密码，字母区分大小写').show();
		}else{
			$(".password #input_tips").html('').hide();
		}
	})
	
	
//	列表页--------------------------------------------

//	月薪点击 小箭头特效
	$(".selectUI-text").click(function(){
		$(this).children("i").toggleClass('deg');
		$(this).children(".selectUI-text ul").toggle();
	})

//	内容页--------------------------------------------
//	推荐公司 展开收起
	$(".expansion").click(function(){
//		为小箭头添加翻转的特效
		$(".expansion").children('i').toggleClass('turn');
//		显示更多推荐公司
		$(".popular_recom").toggleClass('hide-recom');
	})

//	企业 页面--------------------------------------------
//	企业发布简历,  职位类别点击事件
	var isOut = true;//状态选择
	$("#select_category").click(function(){
		isOut = false;
		$("#box_job").toggle();
	})
	$(document).click(function(){
		if(isOut){
			$("#box_job").hide();
		}
		isOut = true;
	})
	
//	工作radio选择(全职/兼职/实习)
	$(".profile_radio").children("li").click(function(){
		$(this).addClass('current').siblings().removeClass('current');
	})
	
//	求职者向:--------------------------------------------
//	投递状态 投递成功点击事件
	$(".btn_showprogress").click(function(){
//		添加箭头旋转属性
		$(this).find("i").toggleClass('transform');
		
		$(".progress_status").hide();
//	投递成功按钮,显示隐藏
		$(this).parent().next(".progress_status").show();
	})
	
	$(".btn_closeprogress").click(function(){
//		点击收起箭头可隐藏
		$(this).parent().parent(".progress_status").hide();
		var jiantou = $(".btn_closeprogress").index(this);
		$(".btn_closeprogress_jiantou").eq(jiantou).removeClass('transform');
	})
	
	//发布新职位   职位类别,职位名称改变value--------------------------------------------
	$(".reset>li").click(function(){
		//获得点击的职位类别
		var ptxt = $(this).find("span").html();
		//添加进表单内value
		$("#cname").val(ptxt);
		$("#select_category").val(ptxt);
	})
	$(".reset>li .job_sub li").click(function(){
		//获得点击的职位名称
		var ptxt = $(this).html();
		//添加进表单内value
		$("#jobName").val(ptxt);
	})

	//	企业:'月薪选择,添加隐藏域值'---------------------------------
	function runmoney(){
		var a_val = Number($("#money_a").val());
		var b_val = Number($("#money_b").val());
		if(a_val != '' && b_val != ''){
			if(a_val>b_val){
				$("span#warning_msg").css('color','red').html('月薪信息填写错误!');
				return false;
			}
		$("span#warning_msg").css('color','green').html('信息很OK~');
		return true;
		}
	}//runmoney
	$("#money_a").blur(function(){
		//判断 表单里的值
		runmoney();
		//赋值
		$("#hidoney_a").val($("#money_a").val());
	})
	$("#money_b").blur(function(){
		//判断 表单里的值
		runmoney();
		//赋值
		$("#hidoney_b").val($("#money_b").val());
	})


//	页面可共用:--------------------------------------------
	//添加滚动条事件--------------------------------------------
	$(window).scroll(function(){
//		获得滚动一次的距离值
		var hide_top = $(this).scrollTop();
//		取网页的整体高度
		var body_height = document.body.clientHeight;
//		只读属性，声明了可视窗口的文档显示区的高度
		var h = window.innerHeight;
//		可视区+滚动距离值
		var h_all = hide_top+h;
		
		var th_b = h_all - body_height + 208;
		var th_f = h_all - body_height + 148;
		var th_l = h_all - body_height + 68;
		if (hide_top<40) {
			$("#back").hide();
		}else{
			$("#back").show();
		}
		
		if (h_all<=body_height-68) {
			$("#back").css('bottom','140px');
			$("#feedback").css('bottom','80px');
			$("#logintool").css('bottom','0px');
		}else{
			$("#back").css('bottom',th_b+'px');
			$("#feedback").css('bottom',th_f+'px');
			$("#logintool").css('bottom',th_l+'px');
		}
	})
	//给小火箭添加点击事件
	$("#back").click(function(){
		$("html,body").stop().animate({
					scrollTop:0
			},500);
	})
	
//	底部 备案信息--------------------------------------------
	function resizeWin(){
		//获得页面高度
		var h = $(window).height();
		//获得顶部黑条的高
		var lg_tbar = $(".lg_tbar").height();
		//获得顶部导航栏的高度
		var lg_tnav = $(".lg_tnav").height();
		//获得除了 顶部的高度
		var new_h = h-lg_tbar-lg_tnav;
		//将计算的新值给主体div改变样式高度
		$('#container').css('min-height',new_h+'px');
	}
	resizeWin();
	//	调整大小时,重新执行
	$(window).resize(function(){
		resizeWin();
	})
	
	
	
	
	
	
	
	
	
	
	
	
})