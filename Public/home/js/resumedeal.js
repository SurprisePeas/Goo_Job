$(function(){
	
//	企业发布简历,  职位类别点击事件
	$("#select_category").click(function(){
		$("#box_job").toggle();
	})
	
	$("ul.reset li").click(function(){
		$("#box_job").hide();
		var re=$(this).find('span').html();
		$("#select_category").val(re);
	})
//	工作radio选择
	$(".profile_radio").children("li").click(function(){
		$(this).addClass('current').siblings().removeClass('current');
	})
	
//	简历勾选效果
	//单选
	$(".resumeLists .checkbox").click(function(){
		var a=$(this).find('input').attr('checked');
		if(!a){
			$(this).find('input').attr('checked','checked').siblings('i').fadeIn(300);
		}else{
			$(".filter_actions .checkbox input").removeAttr('checked').siblings('i').fadeOut(300);
			$(this).find('input').removeAttr('checked','checked').siblings('i').fadeOut(300);
		}
	})
	
	//全选
	$(".filter_actions .checkbox").click(function(){
		if(!$(this).find('input').attr('checked')){
			$("input[type=checkbox]").attr('checked','checked').siblings('i').fadeIn(300);
			$("input[type=checkbox]").prop('checked','checked').siblings('i').fadeIn(300);
		}else{
			$("input[type=checkbox]").removeAttr('checked').siblings('i').fadeOut(300);
		}
	})
	
})
