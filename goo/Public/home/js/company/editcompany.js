$(function(){
	
//	开启编辑模式
	$(".edit").click(function(){
		$(this).parent().parent().parent().css('display','none').siblings('.top_info_edit').css('display','block');
	})
	$(".cancel_edit,.cancel").click(function(){	
		$(this).parent().parent().css('display','none').siblings('.top_info_wrap').css('display','block');	
	})

	
	$(".item_ropera").click(function(){
		$(this).parent().find('.item_content').css('display','none').siblings('.item_content_edit').css('display','block');
	})
	
	$(".cancel2").click(function(){	
		$(this).parent().parent().css('display','none').siblings('.item_content').css('display','block');	
	})
	
	$(".item_ropera_cancel").click(function(){	
		$(this).parent().css('display','none').siblings('.item_content').css('display','block');	
	})
	
	
	$(".item_ropera2").click(function(){
		$(this).next('.item_content').css('display','none').siblings('.item_content_edit_wrap').css('display','block');
	})
	
	
	
	
	
})



















