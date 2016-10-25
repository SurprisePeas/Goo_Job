// 配置
$(function(){
	$('[name=form]').validate({

		title:{
			rule:{
				required:true
			},
			error:{
				required:'标题必须填写'
			},
			message:'请输入标题',
			success:'标题输入正确'
		},
		code:{
			rule:{
				required:true,
				regexp:/^cfg_([a-z_])+/i
			},
			error:{
				required:'变量必须填写',
				regexp:'变量必须以cfg_开头,且只能包含是英文或者下划线'
			},
			message:'请输入变量',
			success:'变量输入正确'

		},
		sort:{
			rule:{
				required:true,
				regexp:/^\d+$/i
			},
			error:{
				required:'排序必须填写',
				regexp :'排序只能是数字'
			},
			message:'请输入排序值',
			success:'排序值输入正确'
		},
		


	})

})