<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>权限列表</title>
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
	<form action="{:U('AuthRule/beachdelete')}" method="post" class='hd-form' name="operationForm">
		<div class="hd-menu-list">
			<ul>
				<li class='active'>
					<a href="javascript:;" >权限列表</a>
				</li>
				<li>
					<a href="{{U('addPower')}}">添加权限</a>
				</li>
				<li>
					<a href="{{U('update_cache')}}">更新权限缓存</a>
				</li>
			</ul>
		</div>
		<table class="hd-table hd-table-list hd-form">
			<thead>
				<tr>
					<td class="hd-w30">
						<input type="checkbox" />
					</td>
					<td class="hd-w60">排序</td>
					<td class="hd-w30">id</td>
					<td class="hd-w180">权限标识</td>
					<td>权限名称</td>
					<!--<td class="hd-w60">状态</td>-->
					<!-- <td class="hd-w60">导航</td> -->
					<!-- <td class="hd-w80">条件</td> -->
					<td class="hd-w80">操作</td>
				</tr>
			</thead>
			{{if value='!empty($data)'}}
				{{foreach from='$data' value='$d'}}
					<tr {{if value="$d['pid'] eq 0"}}class="top"{{endif}}>
						<td>
							<input type="checkbox" name="id[{{$d['nid']}}]" value="{{$d['nid']}}"/>
						</td>
						<td>
							<input type="text" class="hd-w30" value="{{$d['sort']}}" name="sort[{{$d['nid']}}]"/>
						</td>
						<td>{{$d['nid']}}</td>
						<td>{{$d['name']}}</td>
						<td>
							{{if value="$d['pid'] eq 0"}} <strong>{{$d['_name']}}</strong>
							{{elseif value="$d['level'] eq 2"}}<span style="color: red;">{{$d['_name']}}</span>
							{{else}}{{$d['_name']}}
							{{endif}}
						</td>
						<!-- <td>{$v.isnavshow_name}</td> -->
						<!-- 	<td>{$v.condition}</td> -->
					
						<td>
	
							<a href="{{U('editPower',array('nid'=>$d['nid']))}}">修改</a>
							<span class="line">|</span>
							<a href="javascript:;" onclick="del_modal('{{U('delPower',array('nid'=>$d['nid']))}}')">
										删除
							</a>
						</td>
					</tr>
				{{endforeach}}
	{{else}}
		<tr>
			<td colspan="7">没有找到符合的记录</td>
		</tr>
	{{endif}}
</table>

<input type="button" class="hd-btn hd-btn-sm select_all" value="全选">
<input type="button" class="hd-btn hd-btn-sm operation" value="排序" name="update_sort" >
</form>
<script type='tex/javascript'> 
var PUBLIC = '__PUBLIC__';
</script>
</body>
</html>