<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>角色组管理</title>
   <link rel="stylesheet" href="./Public/hdjs/hdjs.css">
	<script src="./Public/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/hdjs/hdjs.min.js"></script>
	<script type='text/javascript' src='./Public/hdjs/org/cal/lhgcalendar.min.js'></script>
	<script type='text/javascript'>
		MODULE='/php/Think-stu/upload/tpcms1.0/index.php/Admin'; //当前模块
		CONTROLLER='/php/Think-stu/upload/tpcms1.0/index.php/Admin/AuthRule'; //当前控制器)
		ACTION='/php/Think-stu/upload/tpcms1.0/index.php/Admin/AuthRule/index';//当前方法(方法)
		ROOT='/php/Think-stu/upload/tpcms1.0'; //当前项目根路径
		PUBLIC= '/php/Think-stu/upload/tpcms1.0/Core/Tpcms/Admin/View/Public';//当前定义的Public目录
	</script>
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.base.css"/>
	<script src="./Public/admin/cms/js/mod.base.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/admin/cms/js/mod.rule.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div class="hd-menu-list">
        <ul>
            <li class="active">
                <a href="javascript:;">角色组列表</a>
            </li>
            <li>
                <a href="{{U('addRole')}}">添加角色组</a>
            </li>
            
        </ul>
    </div>
    <div class="content">
        <table class="hd-table hd-table-list hd-form">
            <thead>
                <tr>
                    <td class="hd-w30">rid</td>
                    <td>角色组名称</td>
                    <!--<td>状态</td>-->
                    <td class="hd-w150">操作</td>
                </tr>
            </thead>
            <tbody>
            	{{if value="!empty($roleData)"}}
                	{{foreach from='$roleData' value='$r'}}
                <tr>
                    <td>{{$r['rid']}}</td>
                    <td>{{$r['rname']}}</td>
                    <!--<td><if condition='$v["status"] eq 1'>启用<else />禁用</if></td>-->
                    <td>
                        <a href="{{U('givePower',array('rid'=>$r['rid']))}}">分配权限</a>
                        |
                        <a href="{{U('editRole',array('rid'=>$r['rid']))}}">修改</a>
                        |
                        <a href="javascript:;" onclick="del_modal('{{U('delRole',array('rid'=>$r['rid']))}}')">删除</a>
                    </td>
                </tr>
               {{endforeach}}
            {{else}}
                <tr>
                	<td colspan="3">没有找到符合条件的记录</td>
                </tr>
            {{endif}}
            </tbody>
        </table>
    </div>
    

</body>
</html>