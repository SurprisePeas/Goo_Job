/* 
* @Author: 976123967@qq.com
* @Date:   2015-01-16 13:33:22
* @Last Modified by:   Administrator
* @Last Modified time: 2015-06-08 13:59:33
*/

//显示左侧栏目列表TREE
function get_category_tree() {
    $.post(ajaxCategoryUrl + '?_'+Math.random(), function (data) {
        $("#category_tree").hide();
        var setting = {
            data: {
                simpleData: {
                    enable: true
                }
            }
        };
        var zNodes = data;
        $(document).ready(function () {
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
        });
        $("#category_tree").slideDown(200);
    }, 'json');

}

//======================点击move标签DIV时改变div布局===============
$(function(){
    $("div#move").toggle(function(){
        $("div#category_tree").stop().animate({
            left:'-200px'
        },500);
        $(this).find('span').attr('class','right').end().stop().animate({
            left:'0px'
        },500);
        $('div#content').stop().animate({
            left:'20px'
        },500);
    },function(){
        $("div#category_tree").stop().animate({
            left:'0px'
        },500);
        $(this).find('span').attr('class','left').end().stop().animate({
            left:'191px'
        },500);
        $('div#content').stop().animate({
            left:'197px'
        },500);
    })


   // 设置属性图片
   $('[pic=1] td label ').click(function(){
     
        var value = $(this).find('input[type=checkbox]').attr('rel');
        var ischecked = $(this).find('input[type=checkbox]').is(':checked');
        var attrvalueid  =$(this).find('input[type=checkbox]').attr('attr_value_id');
    

       

        // 选中生成 对应的html
        if(ischecked)
        {

            $('#pic .no_pic').hide();
            $('#pic .has_pic').show();
            if($('#pic .hd-tab-menu li[lab='+value+']').length)
                return false;
            var active = '';
            var tab = 'class="hd-tab-area"';
            if(!$('#pic .hd-tab-menu li').length)
            {
                active = 'class="active"';
                tab = 'class="hd-table-area"';
            }
            var li = '<li lab="'+value+'" '+active+'>\
                      <a href="#">'+value+'</a>\
                 </li>';
     

            var html = '<div lab="'+value+'" '+tab+'>\
                            <table class="hd-table hd-table-form hd-form">\
                                <tbody>\
                                    <tr>\
                                        <th class="hd-w100"><span class="hand" onclick="add_pic(this)">[+]</span></th>\
                                        <td ><input type="file" name="'+attrvalueid+'[]" class="input noborder"></td>\
                                    </tr>\
                                </tbody>\
                            </table>\
                        </div>';

            $('#pic .hd-tab-menu').append(li);
            $('#pic .hd-tab-content').append(html);
            $('#isattr').val(1);

        
        }
        else//取消选中发送异步删除图片
        {


           $.ajax({

            url:ajaxDelAttrPicUrl,
            data:{attrvalueid:attrvalueid,aid:aid},
            dataType:'json',
            type:'get',
            success:function(res){
                if(res.status==1)
                    show_tips(res.info);
            }

           })
           $('#pic .hd-tab-menu li[lab='+value+']').remove();
           $('#pic .hd-tab-content div[lab='+value+']').remove();
        }

       // 没有一个是选中的
       if(!$('[pic=1] td label input[type=checkbox]:checked').length)
       {
            $('#pic .no_pic').show();
            $('#pic .has_pic').hide();
            $('#pic .hd-tab-menu li').remove();
            $('#pic .hd-tab-content div').remove();
            $('#isattr').val(0);
        }
        
       

       



   })

   $('[pic=1] td label input[type=checkbox]:checked').each(function(k,v){

        var value = $(this).attr('rel');
        var ischecked = $(this).attr('checked');
        var attrvalueid  =$(this).attr('attr_value_id');

        // 选中生成 对应的html
        if(ischecked)
        {


            $('#pic .no_pic').hide();
            $('#pic .has_pic').show();
            if($('#pic .hd-tab-menu li[lab='+value+']').length)
                return true;
            var active = '';
            var tab = 'class="hd-tab-area"';
            if(!$('#pic .hd-tab-menu li').length)
            {
                active = 'class="active"';
                tab = 'class="hd-table-area"';
            }
            var li = '<li lab="'+value+'" '+active+'>\
                      <a href="#">'+value+'</a>\
                 </li>';
     

            var html = '<div lab="'+value+'" '+tab+'>\
                            <table class="hd-table hd-table-form hd-form">\
                                <tbody>\
                                    <tr>\
                                        <th class="hd-w100"><span class="hand" onclick="add_pic(this)">[+]</span></th>\
                                        <td ><input type="file" name="'+attrvalueid+'[]" class="input noborder"></td>\
                                    </tr>\
                                </tbody>\
                            </table>\
                        </div>';

            $('#pic .hd-tab-menu').append(li);
            $('#pic .hd-tab-content').append(html);
            $('#isattr').val(1);

        
        }
     
   })






})

// 添加上传
function add_pic(obj)
{
    var html = $(obj).parents('tr').eq(0).clone();
    html.find('th').eq(0).find('span').html('[-]').attr('onclick','del_pic(this)');
    $(obj).parents('table').eq(0).append(html);
}
// 删除上传
function del_pic(obj)
{
    $(obj).parents('tr').eq(0).remove();
}


// ajax删除图片
function del_img(obj)
{
    var id  = $(obj).attr('id');
    var aid = $(obj).attr('aid');
    $.ajax({
        url:ajaxDelPicUrl,
        data:{id:id,aid:aid},
        dataType:'JSON',
        type:'get',
        success:function(res){
            show_tips(res.info);
            if(res.status==0)
            {
                return false;
            }
            else
            {

                $(obj).parent().remove();
            }
          
        }   
    })
}

/**
 * [ajax_del_attachment 删除附件]
 * @param  {[type]} obj   [description]
 * @param  {[type]} aid   [description]
 * @param  {[type]} field [description]
 * @return {[type]}       [description]
 */
function ajax_del_attachment(obj,aid,field)
{
    $.ajax({
        url:ajaxDelAttachmentUrl,
        data:{field:field,aid:aid},
        dataType:'JSON',
        type:'get',
        success:function(res){
            show_tips(res.info);
            if(res.status==0)
            {
                return false;
            }
            else
            {

                $(obj).siblings('a').remove();
                $(obj).siblings('img').remove();
                $(obj).remove();
            }
          
        }   
    })
}