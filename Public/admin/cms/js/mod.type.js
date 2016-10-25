/* 
* @Author: 976123967@qq.com
* @Date:   2015-05-26 09:51:57
* @Last Modified by:   Administrator
* @Last Modified time: 2015-05-26 09:56:29
*/

$(function(){
	$('form').validate({
		typename:{
			rule:{
				required:true,
			},
			error:{
				required:'请输入类型名称',
			},
			message:'请输入类型名称',
			success:'名称输入正确',
		}
	})
})