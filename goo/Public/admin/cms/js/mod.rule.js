/* 
* @Author: chenli
* @Date:   2015-02-23 19:44:23
* @Last Modified by:   chenli
* @Last Modified time: 2015-02-23 19:48:58
*/

$(function()
{
	//展开栏目
	$(".explodeCategory").click(function () {
	    var action = parseInt($(this).attr("action"));
	    var tr = $(this).parents('tr').eq(0);
	    switch (action) {
	        case 1://展示
	            $(tr).nextUntil('.top').show();
	            $(this).attr('action', 2);
	            $(this).attr('src', PUBLIC+"/images/contract.gif");
	            break;
	        case 2://收缩
	            $(tr).nextUntil('.top').hide();
	            $(this).attr('action', 1);
	            $(this).attr('src', PUBLIC+"/images/explode.gif");
	            break;
	    }
	})
	//关闭栏目子栏目（隐藏子栏目）
	//$(".explodeCategory").trigger('click');
	//全部收起子栏目
	function explodeCategory() {
	    $(".explodeCategory").each(function (i) {
	        $(this).trigger('click');
	    })
	}
})