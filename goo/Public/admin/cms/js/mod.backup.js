
function optimize()
{
	// 没有选择任何记录
    if($('tr > td:first-child input:checkbox:checked:gt(0)').length==0)
    {
        show_tips('没有选择任何记录');
        return false;
    }

	$.ajax({
		url:optimizeUrl,
		data:$('form').serialize(),
		type:'post',
		dataType:'json',
		success:function(res){
			
			show_tips(res.info);
		}
	})

}
function repair()
{
	// 没有选择任何记录
    if($('tr > td:first-child input:checkbox:checked:gt(0)').length==0)
    {
        show_tips('没有选择任何记录');
        return false;
    }

	$.ajax({
		url:repairUrl,
		data:$('form').serialize(),
		type:'post',
		dataType:'json',
		success:function(res){
			
			show_tips(res.info);
		}
	})

}