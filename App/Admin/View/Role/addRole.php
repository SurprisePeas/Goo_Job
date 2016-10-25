<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>添加用户组</title>
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
</head>
<body>
    <form action="" method="post" class="hd-form" name="form" >
        <div class="hd-menu-list">
            <ul>
                <li >
                    <a href="{{U('index')}}">用户组列表</a>
                </li>
                <li class="active">
                    <a href="javascript:;">添加用户组</a>
                </li>
            </ul>
        </div>
        
        <div class="hd-title-header">添加用户组</div>
        <div class="right_content">
            <table class="hd-table hd-table-form">
                <tbody>
                    <tr>
                        <th class="hd-w100">
                            用户组名称
                            <span class="star">*</span>
                        </th>
                        <td>
                            <input type="text" name="rname" class="hd-w200"></td>
                    </tr>
                     <!--<tr>
                        <th class="hd-w100">
                            状态
                            <span class="star">*</span>
                        </th>
                        <td><label> 
                        	<input type="radio" name="status" value="1" checked="checked"> 启用  
                        	</label>
                        	<label> 
                        	<input type="radio" name="status" value="0"> 禁用  
                        	</label>
                        </td>
                    </tr>-->
                </tbody>
            </table>
        </div>
        <input type="submit" value="添加" class="hd-btn hd-btn-sm">
        <input type="button" value="返回" class="hd-btn hd-btn-sm" onclick="location.href='{{U('index')}}'">
        </form>
</body>
</html>