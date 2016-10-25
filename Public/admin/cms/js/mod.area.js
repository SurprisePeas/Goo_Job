/* 
* @Author: 976123967@qq.com
* @Date:   2015-04-23 09:31:32
* @Last Modified by:   Administrator
* @Last Modified time: 2015-04-23 09:45:54
*/

$(function(){
	

	$('.area select').change(function(){
		var rid = $(this).val();
		var obj = $(this);
		if($(this).index()<3)
		$.ajax({
			url:ROOT+"/index.php?g=admin&m=shipping_area&a=ajax_get_region",
			data:{rid:rid},
			type:'post',
			dataType:'json',
			success:function(res){
				if(res.status==1)
				{
					obj.next().html(res.info);
				
					if(obj.index()==1)
						obj.next().next().html('<option value="0">不限</option>');
				}
			}
		})
	})

})


function add_area(obj){

	var html = $(obj).parents('tr').eq(0).clone();
	html.find('span').attr('onclick','del_area(this)').html('[-&nbsp;]');
	$(obj).parents('table').eq(0).append(html);

}

function del_area(obj)
{
	$(obj).parents('tr').eq(0).remove();
}

$(function(){
	$('form').validate({
		name:{
			rule:{
				required:true
			},
			error:{
				required:'请输入配送区域名称'
			},
			message:'请输入配送区域名称'
		},
		fee:{
			rule:{
				required:true,
				regexp:/\d+/
			},
			error:{
				required:'请输入配送价格',
				regexp:'只能是数字'
			},
			message:'请输入配送价格'
		},
		ext:{
			rule:{
				required:true,
				regexp:/\d+/
			},
			error:{
				required:'请输入配送价格',
				regexp:'只能是数字'
			},
			message:'请输入配送价格'
		}
	})
})