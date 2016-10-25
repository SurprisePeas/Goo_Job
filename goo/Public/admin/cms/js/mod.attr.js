/* 属性js
* @Author: 976123967@qq.com
* @Date:   2015-01-15 14:44:04
* @Last Modified by:   Administrator
* @Last Modified time: 2015-06-08 09:59:13
*/

$(function(){
	$('.attr_value .plus').live('click',function(){

		var html = $(this).parents('tr').eq(0).clone();
		html.find('span').removeClass('plus').addClass('minus');
		html.find('span').html("[-]");
		html.find('input').val('');
		html.find('input:eq(0)').attr('name','attr_value_name[]');
		html.find('input:eq(1)').attr('name','attr_value[]');
		$(this).parents('table').eq(0).append(html);


	})

	$('.attr_value .minus').live('click',function(){
		$(this).parents('tr').eq(0).remove();
	})


	$('[name=form]').validate({

		attr_name:{
			rule:{
				required:true
			},
			error:{
				required:'属性名称必须填写'
			},
			message:'请输入属性名称',
			success:'属性名称输入正确'

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