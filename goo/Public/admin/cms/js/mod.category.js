/**
 * 栏目js
 */

$(function(){


	var show =[];
  //展开栏目
  $(".explodeCategory").click(function () {
      var action = parseInt($(this).attr("action"));
      var tr = $(this).parents('tr').eq(0);
      var cid = tr.attr("cid");
      show[cid] = {'cid':cid,'action':action};
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
      setCookie('categoryShow',JSON.stringify(show));
  })

  // 初始化菜单
  explodeCategory();
  function explodeCategory()
  {
    var cookieshow = getCookie('categoryShow');
    cookieshow = $.parseJSON(cookieshow);
    $(".explodeCategory").each(function () 
    {
        var action = parseInt($(this).attr("action"));
        var tr = $(this).parents('tr').eq(0);
        var cid = tr.attr("cid");
        if(cookieshow)
        {
            $.each(cookieshow,function(k,v){
              if(JSON.stringify(v) != 'null')
              {
                  if(v.cid==cid)
                  {
                    action = v.action;
                    return ;
                  }
              }
          })
        }
        
        show[cid] = {'cid':cid,'action':action};
        switch (action) 
        {
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
        setCookie('categoryShow',JSON.stringify(show));
    })

  }


  $('[name=form]').validate({

    cname:{
      rule:{
        required:true
      },
      error:{
        required:'分类名称必须填写'
      },
      message:'请输入分类名称',
      success:'分类名称输入正确'

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
    page:{
       rule:{
        required:true,
        regexp:/^\d+$/i
      },
      error:{
        required:'每页记录数必须填写',
        regexp :'每页记录数只能是数字'
      },
      message:'请输入每页记录数',
      success:'排序值输入正确'
    },
    default_tpl:{
       rule:{
        required:true 
      },
      error:{
        required:'封面模板必须填写'
      },
      message:'请输入封面模板',
      success:'封面模板输入正确'
    },
    list_tpl:{
       rule:{
        required:true 
      },
      error:{
        required:'列表模板必须填写'
      },
      message:'请输入列表模板',
      success:'列表模板输入正确'
    },
    view_tpl:{
       rule:{
        required:true 
      },
      error:{
        required:'详细模板必须填写'
      },
      message:'请输入详细模板',
      success:'详细模板输入正确'
    },
    remark:{
       rule:{
        required:true 
      },
      error:{
        required:'控制器必须填写'
      },
      message:'请输入控制器',
      success:'控制器输入正确'

    },


  })



})


/**
 * [ajax_del_attachment 删除附件]
 * @param  {[type]} obj   [description]
 * @param  {[type]} cid   [description]
 * @param  {[type]} field [description]
 * @return {[type]}       [description]
 */
function ajax_del_attachment(obj,cid,field)
{
	 hd_modal({
        width: 400,//宽度
        height: 200,//高度
        title: '提示',//标题
        content: '确定删除吗',//提示信息
        button: true,//显示按钮
        button_success: "确定",//确定按钮文字
        button_cancel: "关闭",//关闭按钮文字
        timeout: 0,//自动关闭时间 0：不自动关闭
        shade: true,//背景遮罩
        shadeOpacity: 0.1,//背景透明度
        success: function () {//点击确定后的事件
           $.ajax({
           	url:ajaxDelAttachmentUrl,
           	type:'get',
           	data:{cid:cid,field:field},
           	dataType:'json',
           	success:function(res){
           		if(res.status==0)
           		{
           			show_tips(res.info)
           			return false;
           		}
           		else
           		{
           			show_tips(res.info)
           			$(obj).siblings('img').remove();
           			$(obj).remove();
           		}
           	}
           })
        },
        cancel: function () {//点击关闭后的事件

        }
    });
}
