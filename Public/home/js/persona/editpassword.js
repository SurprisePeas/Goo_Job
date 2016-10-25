$(function(){
//	密码验证
	$('input[type=password]').change(function(){
//		获取val值
		var value = $(this).val();
//		正则（输入6-16个以字母开头、可带数字、“_”、“.”的字串 ）
		var filer  = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,15}$/;
//		判断
		var re = value.match(filer);
		if(re==null){
			$(this).next('span').html('请输入6-16位以字母开头密码,字母区分大小写');
			$(this).next('span').show();
		}else{
			$(this).next('span').hide();
		}
	})
	
	
//	获取焦点
	$('input[type=password]').focus(function(){
		$(this).next('span').hide();
	})
	
	
	
	
	
	
	
	
	
	
	
	
	
})
