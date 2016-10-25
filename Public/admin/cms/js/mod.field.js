/**
 * 后台字段js
 */
$(function(){

	$('#validate').change(function(){
		$(this).siblings('input').val($(this).val());
	})


	$('[name=show_type]').change(function(){
		if($(this).val()=='5' || $(this).val()=='6' || $(this).val()=='7')
		{
			$('.single input').attr('disabled','disabled');
			$('.single').hide();
			$('.multiple input').removeAttr('disabled');
			$('.multiple').show();
		}
		else
		{
			$('.single input').removeAttr('disabled');
			$('.single').show();
			$('.multiple input').attr('disabled','disabled');	
			$('.multiple').hide();
		}
	})
	$('[name=show_type]').trigger('change');

	$('.multiple .plus').live('click',function(){
		var html = $(this).parents('tr').eq(0).clone();
		html.find('span').removeClass('plus').addClass('minus').html('[-]');
		html.find('input').val('').attr('name','value[]');
		$('.multiple').append(html);

	})
	$('.multiple .minus').live('click',function(){
		$(this).parents('tr').eq(0).remove();
	})


	$('[name=form]').validate({

		title:{
			rule:{
				required:true
			},
			error:{
				required:'字段说明必须填写'
			},
			message:'请输入字段说明',
			success:'字段说明输入正确'

		},
		fname:{
			rule:{
				required:true,
				regexp:/^[a-z][a-z0-9_]*$/i
			},
			error:{
				required:'字段名称必须填写',
				regexp:'字段名称必须以字母开头并且只能包含字母或数字或下划线'
			},
			message:'请输入字段名称',
			success:'字段名称输入正确'
		}


	})



})