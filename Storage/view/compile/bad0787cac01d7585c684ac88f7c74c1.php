<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>用户组管理</title>
    <hdjs />
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.base.css"/>
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.index.css"/>
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.article.css"/>
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.login.css"/>
    <link rel="stylesheet" type="text/css" href="./Public/admin/cms/css/mod.templates.css"/>
    <script src="./Public/admin/cms/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/admin/cms/js/mod.ad.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/admin/cms/js/mod.login.js" type="text/javascript" charset="utf-8"></script>
    
    <script src="./Public/admin/cms/js/mod.base.js" type="text/javascript" charset="utf-8"></script>
    <script src="./Public/admin/cms/js/mod.model.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div class="hd-menu-list">
        <ul>
            <li class="active">
                <a href="javascript:;">用户组列表</a>
            </li>
            <li>
                <a href="{:U('AuthGroup/add')}">添加用户组</a>
            </li>
            
        </ul>
    </div>
    <div class="content">
        <table class="hd-table hd-table-list hd-form">
            <thead>
                <tr>
                    <td class="hd-w30"typeid</td>
                    <td>用户组名称</td>
                    <td>状态</td>
                    <td class="hd-w150">操作</td>
                </tr>
            </thead>
            <tbody>
            	<if condition='$data'>
                <foreach name='data' item='v'>
                <tr>
                    <td>{$v.id}</td>
                    <td>{$v.title}</td>
                    <td><if condition='$v["status"] eq 1'>启用<else />禁用</if></td>
                    <td>
                        <a href="">分配权限</a>
                        |
                        <a href="">修改</a>
                        |
                        <a href="javascript:;" onclick="del_modal('')">删除</a>
                    </td>
                </tr>
                </foreach>
                <else />
                <tr>
                	<td colspan="3">没有找到符合条件的记录</td>
                </tr>
            </if>
            </tbody>
        </table>
    </div>
    

</body>
</html>