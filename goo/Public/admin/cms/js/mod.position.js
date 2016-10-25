/* 广告位置js
* @Author: 976123967@qq.com
* @Date:   2015-01-15 14:44:04
* @Last Modified by:   Administrator
* @Last Modified time: 2015-05-26 10:59:49
*/
$(function(){
	$('[name=form]').validate({

		position_name:{
			rule:{
				required:true
			},
			error:{
				required:'广告位置名称必须填写'
			},
			message:'请输入广告位置名称',
			success:'广告位置名称输入正确'
		},
		
	})

})
