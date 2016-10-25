// 广告js
$(function(){
	$('[name=form]').validate({

		name:{
			rule:{
				required:true
			},
			error:{
				required:'广告名称必须填写'
			},
			message:'请输入广告名称',
			success:'广告名称输入正确'

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