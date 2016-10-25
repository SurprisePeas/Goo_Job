$(function(){
	//---------------个人信息隐藏显示-----------------
	$(".showUser").hover(function(){
		$(".user_dpdown").show();
	},function(){
		$(".user_dpdown").hide();
	});
	

	
	//---------------修改用户名-----------------
	$(".mr_p_name ").hover(function(){
		//移除dn(隐藏)属性 点击mr_edit事件
		$(".mr_edit").removeClass('dn').click(function(){
			$(".mr_p_name").hide();
			$(".mr_name_edit").removeClass('dn');
		});
	},function(){
		$(".mr_edit").addClass('dn');
	})
	$(".cancel").click(function(){
		$(".mr_p_name").show();
		$(".mr_name_edit").addClass('dn');
	})
	//头像移入事件
	$("#up_tx").hover(function(){
		$(".shadow").stop().fadeIn();
	},function(){
		$(".shadow").stop().fadeOut();
	})
	
	$(".mr_locks").hover(function(){
		$(this).children('em').toggle();
	})
	
	
	
	
})