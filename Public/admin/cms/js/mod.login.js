// 用户登录js
$(function(){
	
	$('[name=username]').focus();

	$('form').submit(function(){

		var username = $('#username').val();
		var password = $('#password').val();
		var code  = $('#code').val();

		if(!username)
		{
			show_tips('请输入用户名');
			return false;
		}

		if(!password)
		{
			show_tips('请输入密码');
			return false;
		}


		if(!code)
		{
			show_tips('请输入验证码');
			return false;
		}

		var data= $(this).serialize();
		$.ajax({

			url:ajaxCheckLoginUrl,
			data:data,
			type:'post',
			dataType:'json',
			success:function(res){
				if(res.status==0)
				{
					show_tips(res.info);
					return false;
				}
				else
				{
					window.location.href = successUrl;
				}
			}

		})

		return false;

	})

})