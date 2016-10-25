// 删除
function del_modal(url) 
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
           window.location.href=url
        },
        cancel: function () {//点击关闭后的事件

        }
    });
}

/**
 * [show_tips 气泡显示信息]
 * @param  {[type]} message [description]
 * @return {[type]}         [description]
 */
function show_tips(message)
{
    hd_alert({message:message,timeout:3});
}



$(function(){
   
    // 点击第一排第一个复选框全选
    $('table thead input:checkbox').on('click' , function(){
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
        });
            
    });

    // 按钮全选
    $('.select_all').click(function() {
        $('tr input:checkbox').each(function(){
            if($(this).attr('checked'))
                $(this).removeAttr('checked');
            else
                $(this).attr('checked','checked');
        })
    });




    // 批量操作确认框
    $('.operation').click(function() {




        var name = $(this).attr('name');
        var msg,html;

        // 没有选择任何记录
        if($('tr > td:first-child input:checkbox:checked:gt(0)').length==0)
        {
            show_tips('没有选择任何记录');
            return false;
        }


        switch(name)
        {
            case 'update_sort': 
                msg ='确定执行排序么';
                html='<input type="hidden" name="update_sort" value="true"/>';break;

            case 'update_del': 
                 msg ='确定执行删除么';
                 html='<input type="hidden" name="update_del" value="true"/>';break;
            case 'update_cancle_state': 
                 msg ='确定取消审核么';
                 html='<input type="hidden" name="update_cancle_state" value="true"/>';break;
            case 'update_check_state': 
                 msg ='确定审核通过么';
                 html='<input type="hidden" name="update_check_state" value="true"/>';break;
            case 'update_cancle_operation': 
                 if($('[name=opa]').val() ==0)
                 {
                    show_tips('请选择要执行的动作');
                    return false;
                 }
                 msg ='确定执行取消设置文档属性'+$('[name=opa]').val();
                 html='<input type="hidden" name="update_cancle_operation" value="true"/>';break;
            case 'update_check_operation':
                if($('[name=opa]').val() ==0) 
                 {
                    show_tips('请选择要执行的动作');
                    return false;
                 }
                 msg ='确定执行设置文档属性'+$('[name=opa]').val();
                 html='<input type="hidden" name="update_check_operation" value="true"/>';break;    
            case 'update_check_lock': 
                 msg ='确定锁定么';
                 html='<input type="hidden" name="update_check_lock" value="true"/>';break;
            case 'update_cancle_lock': 
                 msg ='确定取消锁定么';
                 html='<input type="hidden" name="update_cancle_lock" value="true"/>';break;
        }

        hd_modal({
            width: 400,//宽度
            height: 200,//高度
            title: '提示',//标题
            content: msg,//提示信息
            button: true,//显示按钮
            button_success: "确定",//确定按钮文字
            button_cancel: "关闭",//关闭按钮文字
            timeout: 0,//自动关闭时间 0：不自动关闭
            shade: true,//背景遮罩
            shadeOpacity: 0.1,//背景透明度
            success: function () {//点击确定后的事件
               $('form[name=operationForm]').append(html);
               $('form[name=operationForm]').submit();
            },
            cancel: function () {//点击关闭后的事件

            }
        });




 
     
    });




})


// 设置cookies
function setCookie(name,value) 
{ 
    var Days = 30; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 

//读取cookies 
function getCookie(name) 
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 

//删除cookies 
function delCookie(name) 
{ 
    var exp = new Date(); 
    exp.setTime(exp.getTime() - 1); 
    var cval=getCookie(name); 
    if(cval!=null) 
        document.cookie= name + "="+cval+";expires="+exp.toGMTString(); 
} 


//重新刷新页面，使用location.reload()有可能导致重新提交
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}
