<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>添加规则</title>
    <link rel="stylesheet" href="Public/Admin/hdjs/hdjs.css">
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
</head>
<body>
    <form action="" method="post" class="hd-form" name="form" >
        <div class="hd-menu-list">
            <ul>
                <li >
                    <a href="{{U('index')}}">权限列表</a>
                </li>
                <li class="active">
                    <a href="javascript:;">添加权限</a>
                </li>
            </ul>
        </div>
        <div class="hd-title-header">添加权限</div>
        <div class="right_content">
            <table class="hd-table hd-table-form">
                <tbody>
                	  <tr>
                        <th class="hd-w100">
                          权限标识
                            <span class="star">*</span>
                        </th>
                        <td>
                            <input type="text" name="name" class="hd-w200"></td>
                    </tr>
                    <tr>
                        <th class="hd-w100">
                            权限标题
                            <span class="star">*</span>
                        </th>
                        <td>
                            <input type="text" name="title" class="hd-w200"></td>
                    </tr>
                    <tr>
                        <th class="hd-w100">
                            顶级权限
                            <span class="star">*</span>
                        </th>
                        <td>
                        <select name="pid">
	                        	<option value="0">顶级</option>
	                        		{{foreach from='$data' value='$d'}}
								<option value="{{$d['nid']}}" {{if value="$d['level'] eq 3"}}disabled='disabled'{{endif}}>{{$d['_name']}}</option>
								{{endforeach}}
                        </select>
                         </td>
                    </tr>
                    <tr>
                        <th class="hd-w100">
                            排序
                            <span class="star">*</span>
                        </th>
                        <td>
                            <input type="text" name="sort" class="hd-w200" value="1"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="submit" value="添加" class="hd-btn hd-btn-sm">
        <input type="button" value="返回" class="hd-btn hd-btn-sm" onclick="location.href='{{U('index')}}'">
        </form>
</body>
</html>