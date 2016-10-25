/**
 * 模型管理js
 */
$(function(){


	$('[name=form]').validate({

		remark:{
			rule:{
				required:true
			},
			error:{
				required:'模型说明必须填写'
			},
			message:'请输入模型说明',
			success:'模型说明输入正确'

		},
		name:{
			rule:{
				required:true,
				regexp:/^[a-z][a-z0-9_]*$/i
			},
			error:{
				required:'表名称必须填写',
				regexp:'表名称必须以字母开头并且只能包含字母或数字或下划线'
			},
			message:'请输入表名称',
			success:'表名称输入正确'
		}


	})





})