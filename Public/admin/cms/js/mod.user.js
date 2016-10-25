/* 用户js
* @Author: 976123967@qq.com
* @Date:   2015-01-19 10:31:48
* @Last Modified by:   Administrator
* @Last Modified time: 2015-05-26 10:09:43
*/

$(function(){
	

	$('[name=form]').validate({

		username:{
			rule:{
				required:true
			},
			error:{
				required:'用户名不能为空'
			},
			message:'请输入用户名',
			success:'用户名输入正确'

		},
		nickname:{
			rule:{
				required:true
			},
			error:{
				required:'昵称不能为空'
			},
			message:'请输入昵称',
			success:'昵称输入正确'
		},
		email:{
			rule:{
				required:true,
				email:true
			},
			error:{
				required:'请输入邮箱',
				email:'邮箱格式不对'
			},
			message:'请输入邮箱',
			success:'邮箱输入正确'
		},
		password:{
			rule:{
				minlen:6
				
			},
			error:{
				minlen:'密码长度至少6位',
				
			},
			success:'密码输入正确'
			
		},
		passwords:{
			rule:{
				confirm:'password'
				
			},
			error:{
				confirm:'两次密码不一致',
				
			},
			success:'确认密码输入正确'
		},
	})

	$('[name=passwordForm]').validate({

		oldpassword:{
			rule:{
				required:true,
				minlen:6
			},
			error:{
				required:'旧密码不能为空',
				minlen:'旧密码长度至少6位'
			},
			message:'请输入旧密码',
			success:'旧密码输入正确'
		},
		password:{
			rule:{
				required:true,
				minlen:6
				
			},
			error:{
				required:'新密码不能为空',
				minlen:'新密码长度至少6位',
				
			},
			success:'新密码输入正确'
			
		},
		passwords:{
			rule:{
				required:true,
				confirm:'password'
				
			},
			error:{
				required:'确认密码不能为空',
				confirm:'两次密码不一致'
				
			},
			success:'确认密码输入正确'
		
		},
	})
})


function add_group(obj)
{
	var html = $(obj).parent('tr').clone();
    html.find('th').attr('onclick','del_group(this)').html('[-]');
	html.find('select option').removeAttr('selected');
	$(obj).parents('table').eq(0).append(html);

}
function del_group(obj)
{
	
	$(obj).parent('tr').eq(0).remove();
}
