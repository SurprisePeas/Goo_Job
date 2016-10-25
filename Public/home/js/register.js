$(function(){
	//找工作、招人 选项
	$(".btn_outline").click(function(){
		$(this).addClass('btn_active').siblings('input').removeClass('btn_active');
	})
	
	//用户协议勾选
	var num=1;
	$("#checkbox").click(function(){
		if(num==1){
			num=2;
			$(".icon_checkbox").css('background-position','0 3px');
		}else{
			num=1;
			$(".icon_checkbox").css('background-position','-13px 3px');
		}
	})
	
//	用户名验证
	$('.account').change(function(){
//		获取val值
		var value = $(this).val();
//		邮箱正则验证
//		var filter  = /^[A-Za-zd]+([-_.][A-Za-zd]+)*@([A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
//		用户名正则验证
		var filter  = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){8,16}$/;

//		判断
		var r = value.match(filter);
		if(r==null){
			$(this).next('.input_tips').html('请输入有效的用户名(大于8位并由字母开头与数字或._混合的类型)');
			$(this).next('.input_tips').show();
		}else{
			$(this).next('.input_tips').hide();
		}
	})

	
	
//	密码验证
	$('.password').change(function(){
//		获取val值
		var value = $(this).val();
//		正则（输入6-16个以字母开头、可带数字、“_”、“.”的字串 ）
		var filer  = /^(?!\d+$)(?![a-z]+$).+$/i;
//		判断
		var re = value.match(filer);
		if(re==null){
			$(this).next('.input_tips').html('请输入6-16位以字母开头密码,字母区分大小写');
			$(this).next('.input_tips').show();
		}else{
			$(this).next('.input_tips').hide();
		}
	})
	
	
	
//	获取焦点
	$('.email').focus(function(){
		$(this).next('.input_tips').hide();
	})
	$('.password').focus(function(){
		$(this).next('.input_tips').hide();
	})
	
	
	
	
})