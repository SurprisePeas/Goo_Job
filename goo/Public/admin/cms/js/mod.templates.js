/* 
* @Author: 976123967@qq.com
* @Date:   2015-06-02 16:09:18
* @Last Modified by:   Administrator
* @Last Modified time: 2015-06-02 18:24:49
*/

$(function(){
	//改变li样式
    $(".tpl-list li").mouseover(function () {
        $(this).addClass("active");
    }).mouseout(function () {
        $(this).removeClass("active");
    })

    $(".tpl-list li").click(function(){
        var filename = $(this).attr('rel');

        var obj = $(this);
    	$.ajax({
    		url:setTemplatesUrl,
    		data:{filename:filename},
    		type:'post',
    		dataType:'json',
    		success:function(res){
    			if(res.status==1)
    		    {
                    show_tips(res.info);
                    obj.removeClass('active');
                    obj.addClass('current');
                    obj.find('.link strong').html('使用中...');
                    obj.siblings('li').removeClass('current');
                    obj.siblings('li').find('.link strong').html('未使用...');
                }
    		}
    	})


    })
})