<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>分配权限</title>
   <link rel="stylesheet" href="Public/Admin/hdjs/hdjs.css">
	<script src="Public/Admin/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="Public/Admin/hdjs/hdjs.min.js"></script>
	<script type='text/javascript' src='Public/Admin/hdjs/org/cal/lhgcalendar.min.js'></script>
	<script type='text/javascript'>
		MODULE='/php/Think-stu/upload/tpcms1.0/index.php/Admin'; //当前模块
		CONTROLLER='/php/Think-stu/upload/tpcms1.0/index.php/Admin/AuthRule'; //当前控制器)
		ACTION='/php/Think-stu/upload/tpcms1.0/index.php/Admin/AuthRule/index';//当前方法(方法)
		ROOT='/php/Think-stu/upload/tpcms1.0'; //当前项目根路径
		PUBLIC= '/php/Think-stu/upload/tpcms1.0/Core/Tpcms/Admin/View/Public';//当前定义的Public目录
	</script>
    <link rel="stylesheet" type="text/css" href="Public/Admin/css/mod.base.css"/>
	<script src="Public/Admin/js/mod.base.js" type="text/javascript" charset="utf-8"></script>
	<script src="Public/Admin/js/mod.rule.js" type="text/javascript" charset="utf-8"></script>
    <style>
	fieldset{
		border: 1px dotted #ccc;
		padding:10px 10px;
		margin: 20px 0;
	}
	h2{
		padding: 0 10px;
	}
	fieldset label{
		margin-right:10px;
	}
    </style>
    <script type="text/javascript">
  
$(function(){


  $('[type=checkbox]').click(function() {
 
      var value = $(this).val();
      if(value == 0)
        return ;

      if($(this).attr('checked')=='checked')
      { 
        $('[pid='+value+']').attr('checked',true);
        $('.'+value).attr('checked',true);
      }
      else
      {
         $('[pid='+value+']').attr('checked',false);
         $('.'+value).attr('checked',false);
      }


     
      // 子级别选中一个父级就要被选中
      var cid =  $(this).attr('class'); 
      $('.'+cid+':checked').length?$('#node'+cid).attr('checked',true):$('#node'+cid).attr('checked',false);

      var id  =  $(this).attr('pid');
      $('[pid='+id+']:checked').length?$('#node'+id).attr('checked',true):$('#node'+id).attr('checked',false);

  });


})

</script>
</head>
<body>
    <form action="" method="post" class="hd-form" name="form" >
        <div class="hd-menu-list">
            <ul>
                <li >
                    <a href="{{U('index')}}">用角色列表</a>
                </li>
                <li class="active">
                    <a href="javascript:;">设置权限</a>
                </li>
            </ul>
        </div>
        
        <div class="hd-title-header">设置权限</div>
        <div class="right_content">
            <table class="hd-table hd-table-form">
                <tbody>
                	{{foreach from="$data" value='$d'}}	
	                    <tr>
	                        <td>
	                            <h2>
	                            	<label>
	                            		<input pid='0'  type="checkbox" value="{{$d['nid']}}" id='node{{$d["nid"]}}' name="rules[]" {{if value="in_array($d['nid'],$powerHave)"}}checked="checked"{{endif}} /> {{$d['title']}}
	                            	</label>
	                            </h2>
	                            	{{foreach from="$d['next']" value='$n'}}
			                        	<fieldset>
				                           <legend>
				                            	<label><input pid='{{$d["nid"]}}' type="checkbox" value="{{$n['nid']}}"  id='node{{$n["nid"]}}' name="rules[]" {{if value="in_array($n['nid'],$powerHave)"}}checked="checked"{{endif}}/> {{$n['title']}}</label>
				                            </legend>
				                         	
				                            	{{foreach from='$n["last"]' value="$l"}}	
						                            <label>
						                            	<input pid='{{$d["nid"]}}' type="checkbox" value="{{$l['nid']}}" class='{{$n["nid"]}}' name="rules[]" {{if value="in_array($l['nid'],$powerHave)"}}checked="checked"{{endif}}/> {{$l['title']}}
						                            </label>
				                				{{endforeach}}
				                			
			                         </fieldset>
	                				{{endforeach}}
	                        </td>
	                    </tr>
                	{{endforeach}}
                </tbody>
            </table>
        </div>
        <input type="hidden" name="rid" value="{{$_GET['rid']}}" />
        <input type="submit" value="分配权限" class="hd-btn hd-btn-sm">
        <input type="button" value="返回" class="hd-btn hd-btn-sm" onclick="location.href='{{U('index')}}'">
    </form>
</body>
</html>