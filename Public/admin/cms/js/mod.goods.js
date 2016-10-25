/* 
* @Author: 976123967@qq.com
* @Date:   2015-04-21 13:52:19
* @Last Modified by:   Administrator
* @Last Modified time: 2015-04-21 14:15:43
*/

$(function(){
		

	$('[name="is_promote"]').click(function(){
		if($(this).attr('checked'))
			$('.promote input').removeAttr('disabled');
		else
			$('.promote input').attr('disabled','disabled');
	})
	
	$('[name="is_deposit"]').click(function(){
		if($(this).attr('checked'))
			$('.deposit input').removeAttr('disabled');
		else
			$('.deposit input').attr('disabled','disabled');
	})


 $('[name=form]').validate({


 	goods_name:{

 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入商品名称'
 		},
 		message:'请输入商品名称'


 	},
 	sub_name:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入商品副标题'
 		},
 		message:'请输入商品副标题'
 	},
 	goods_model:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入商品型号'
 		},
 		message:'请输入商品型号'
 	},
 	sort:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入排序'
 		},
 		message:'请输入排序'
 	},
 	click:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入浏览次数'
 		},
 		message:'请输入浏览次数'
 	},
 	goods_num:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入库存'
 		},
 		message:'请输入库存'
 	},
 	shop_price:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入本店价格'
 		},
 		message:'请输入本店价格'
 	},
 	shop_price:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入本店价格'
 		},
 		message:'请输入本店价格'
 	},
 	market_price:{
 		rule:{
 			required:true
 		},
 		error:{
 			required:'请输入市场价格'
 		},
 		message:'请输入市场价格'
 	}


 })





})