/* 
* @Author: 976123967@qq.com
* @Date:   2015-04-16 11:16:32
* @Last Modified by:   Administrator
* @Last Modified time: 2015-05-26 10:05:10
*/

$(function(){
	
	$('[name=form]').validate({

		gname:{
			rule:{
				required:true
			},
			error:{
				required:'会员等级必须填写'
			},
			message:'请输入会员等级',
			success:'会员等级输入正确'

		},
		


	})
	
})