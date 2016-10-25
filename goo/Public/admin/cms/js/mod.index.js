/**
 * 页面加载完后点击顶部第一个菜单
 */
var menu_cache = {parent: {}, iframe: {}, link: {}};
$(function () {
    $(".t-l-menu a:eq(0)").trigger('click');
    $(".leftMenuBlock:visible").find('a').eq(0).trigger('click');
})
/**
 * 显示左侧菜单块
 * @param nid 一级菜单id
 */
function topMenu(obj,nid) {
    //改变样式
    $('.t-l-menu a').removeClass('active');
    $(obj).addClass('active');
    //隐藏左侧菜单块
    $(".leftMenuBlock").hide();
    //显示当前nid的菜单块
    $("#" + nid).show().find('a').eq(0).trigger("click");
}
/**
 * 调用动作
 * @param obj a对象
 * @param url 链接
 * @returns {boolean}
 */
function runAction(obj, url, nid) {
    /**
     * 移除所有链接标签点击后的样式属性
     */
    $(".leftMenuBlock").find('a').removeClass('active');
    //为当前链接加上active类更改背景颜色
    $(obj).addClass('active');
    //设置iframe标签src属性，显示链接内容
    historyMenu(obj, url,nid)
    $("iframe[nid='" + nid + "']").attr('src', url);

    /**
     * 添加到历史导航
     */
    if ($("#historyMenuList a[nid='" + nid + "']").length) {
        /**
         * 已经存在菜单
         */
        $("#historyMenuList a[nid='" + nid + "']").trigger('click');
    } else {
        /**
         * 不存在菜单时添加菜单
         */
        $("#historyMenuList a").removeClass('active');
        var a = "<li><a href='javascript:;' onclick=\"historyMenu(this,'" + url + "'," + nid + ")\" class='active' nid='" + nid + "'>"
            + $(obj).html() + "</a><span class='close' onclick='closeHistoryMenu(this,"+ nid +")'>x</span></li>";
        $("#historyMenuList ul").prepend(a);
        $("#historyMenuList").offset({left: 161});
        var w =$("#historyMenuList li").length*161;
        $("#historyMenuList").css({width:w});
    }

    return true;
}
//-------------------------------------------------历史导航----------------------------------------------------
$(function () {
    //历史导航向左滚动
    $("#leftBtn").click(function () {
        //第一个li宽度
        var _li = $("div#historyMenuList li a.active").parent().prev();
        //前面没有了
        if (_li.length == 0)return;
        $("div#historyMenuList li a.active").removeClass("active");
        _li.find('a').addClass("active");
        _li.find('a').click();
  
    })
    //历史导航向右滚动
    $("#rightBtn").click(function () {
        //第一个li宽度
        var _li = $("div#historyMenuList li a.active").parent().next();
      
        //前面没有了
        if (_li.length == 0)return;
        $("div#historyMenuList li a").removeClass("active");
        _li.find('a').addClass("active");
        _li.find('a').click();

    })

})
/**
 * 关闭历史导航
 */
function closeHistoryMenu(obj,nid) {
    if($(obj).parent().prev('li').length)
        $(obj).parent().prev('li').find('a').click();
    else
        $(obj).parent().next('li').find('a').click();
    $(obj).parent().remove();
    $("iframe[nid='" + nid + "']").remove();
    menu_cache.iframe[nid] = false;
    return false;
}


//常用菜单缓存
menu_cache.parent[0] = true;
menu_cache.iframe[0] = true;
/**
 * 历史导航菜单点击
 */
function historyMenu(obj, url,nid) {

    //隐藏所有iframe
    $("div.show iframe").hide();
    if (menu_cache.iframe[nid]) {
        var frm = $("iframe[nid='" + nid + "']");
        frm.show();
        $('#leftMenu a').removeClass('active');
        $('#leftMenu a#menu'+nid).addClass('active');
    } else {
        
        var html = '<iframe nid="' + nid + '" src="' + url + "?_=" + Math.random() + '" scrolling="auto" frameborder="0" style="height: 100%;width: 100%;"></iframe>';
        $("div.show").append(html);
        //压入缓存
        menu_cache.iframe[nid] = true;
    }

    $("#historyMenuList a").removeClass('active');
    $(obj).addClass('active');

}



//双击关闭历史标签
$(function () {
    $("div#historyMenuList ul a").live("dblclick", function () {
        if($(this).parent().next().length)
            $(this).parent().next().find('a').click();
        else if($(this).parent().prev().length)
            $(this).parent().prev().find('a').click();
        var nid = $(this).attr('nid');
        $(this).parent().remove();
        $("iframe[nid='" + nid + "']").remove();
        menu_cache.iframe[nid] = false;
        // $("iframe[nid='" + nid + "']").hdie();
        // $(this).trigger("click");
    })



    //刷新
    $('#J_refresh').click(function (e) {

        e.preventDefault();
        e.stopPropagation();
        var nid = $("div#historyMenuList ul  a.active").attr('nid');
        var iframe = $("iframe[nid='" + nid + "']");
  
        if(iframe.contents().find('iframe[name="content"]').length)
        {
            iframe = iframe.contents().find('iframe[name="content"]');
        }
      
        if (iframe[0].contentWindow) {
        
            reloadPage(iframe[0].contentWindow);
         }
        

    });



    //全屏/非全屏
    $('#J_fullScreen').toggle(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(document.body).addClass('fullScreen');
        $('.show').css({top:0,left:0});
    }, function () {
        $(document.body).removeClass('fullScreen');
        $('.show').css({top:70+'px',left:141+'px'});
    });


})























