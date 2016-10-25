$(function(){
//	顶部二级菜单效果
	$(".user_li").mouseenter(function(){
		$(this).find('i').css('transform','rotate(180deg)');
		$(this).find('ul').show();
	})
	$(".user_li").mouseleave(function(){
		$(this).find('i').css('transform','rotate(0deg)');
		$(this).find('ul').hide();
	})
	
//	搜索栏焦点事件
	$("#search_text").blur(function(){
		$(this).attr('placeholder','视觉设计');
	})
	$("#search_text").focus(function(){
		$(this).attr('placeholder','搜索职位、公司或地点').css('color','rgb(51, 51, 51)')
	})
	
	
//	轮播图
	var c = 0;//总管变量
	var t;
	function fn(){
		c++;
		c = c==3?0:c;
		var top = c*-160;
		$("#content .focus .focus_bg").stop().animate({
			'top':top+'px'
		},300);
		$("#content .focus .focus_r em").stop().animate({
			'top':c*55+'px'
		},200);
		$("#content .focus .focus_r .thumbs li").eq(c).addClass('current').siblings('li').removeClass('current');
	}
	
//	设置定时器
	timer = setInterval(fn,3000);
	
//	给大图添加移入移出事件
	$("#content .focus .focus_bg li").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(fn,3000);
	})
	
//	给右侧区域加移入移出事件
	$("#content .focus .focus_r .thumbs li").hover(function(){
		var num = $(this);
		clearInterval(timer);
		clearTimeout(t);
		t = setTimeout(function(){
			c = num.index();
			$("#content .focus .focus_bg").stop().animate({
			'top':c*-160 +'px'
		},300);
		$("#content .focus .focus_r em").stop().animate({
			'top':c*55 +'px'
		},200);
		$("#content .focus .focus_r .thumbs li").eq(c).addClass('current').siblings('li').removeClass('current');
		},200)
	},function(){
		timer = setInterval(fn,3000);
	})
//轮播图区域结束
	
//tab切换区域
//给tab标签添加点击事件
$("#content .hot_job li").click(function(){
	var num = $(this).index();
	$(this).addClass('hot_in').siblings('li').removeClass('hot_in');
	$("#content .hot_list>div").eq(num).show().siblings('div').hide();
})
	
//添加滚动条事件
$(window).scroll(function(){
	var hide_top = $(this).scrollTop();
	var body_height = document.body.clientHeight;
	var h = window.innerHeight;
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

//二维码移入事件
var timerf,timerg;
$("#floor .wrap .fl_r .fl_app").hover(function(){
	timerf = setTimeout(function(){
		$("#floor .wrap .fl_r .fl_app img").fadeIn();
	},200)
},function(){
	clearTimeout(timerf);
	clearTimeout(timerg);
	$("#floor .wrap .fl_r .fl_app img").fadeOut();
})
$("#floor .wrap .fl_r .wechat").hover(function(){
	timerg = setTimeout(function(){
		$("#floor .wrap .fl_r .wechat img").fadeIn();
	},200)
},function(){
	clearTimeout(timerf);
	clearTimeout(timerg);
	$("#floor .wrap .fl_r .wechat img").fadeOut();
})

//登录界面
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

//关闭按钮点击事件
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

//登录信息验证事件
$("#email").blur(function(){
	var val = $(this).val();
	var re1 = / +/i;
	var re2 = /^1(33|80|88|77|52|86|35)\d{8}$|^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/i;
	var a = re1.test(val);
	var b = re2.test(val);
	if (!val || a) {
		$(".username #input_tips").html('请输入已验证手机/邮箱').show();
	}else if(!b){
		$(".username #input_tips").html('请输入有效的手机/邮箱').show();
	}else{
		$(".username #input_tips").html('').hide();
	}
})

$("#ipassword").blur(function(){
	var val = $(this).val();
	var re1 = / +/i;
	var re2 = /^[_0-9a-z]{6,16}$/;
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




})


















