<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>规则列表</title>
	<hdjs />
	<link rel="stylesheet" type="text/css" href="Public/Admin/css/mod.base.css"/>
	<script src="Public/Admin/js/mod.base.js" type="text/javascript" charset="utf-8"></script>
	<script src="Public/Admin/js/mod.rule.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<form action="{:U('AuthRule/beachdelete')}" method="post" class='hd-form' name="operationForm">
		<div class="hd-menu-list">
			<ul>
				<li class='active'>
					<a href="javascript:;" >规则列表</a>
				</li>
				<li>
					<a href="{:U('AuthRule/add')}">添加规则</a>
				</li>
				<li>
					<a href="{:U('AuthRule/update_cache')}">更新规则缓存</a>
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
					<td class="hd-w180">规则标识</td>
					<td>规则名称</td>
					<td class="hd-w60">状态</td>
					<!-- <td class="hd-w60">导航</td> -->
					<!-- <td class="hd-w80">条件</td> -->
					<td class="hd-w80">操作</td>
				</tr>
			</thead>
			<if condition='$rules'>
				<foreach name='rules' item='v'>
					<tr <if condition="$v['pid'] eq 0">class="top"</if>
					>
					<td>
						<input type="checkbox" name="id[{$v.id}]" value="{$v.id}"/>
					</td>
					<td>
						<input type="text" class="hd-w30" value="{$v.sort}" name="sort[{$v.id}]"/>
					</td>
					<td>{$v.id}</td>
					<td>{$v.name}</td>
					<td>
						<if condition="$v['pid'] eq 0 && Third\Data::hasChild(S('authrule'),$v['id'])">
							<img src="__PUBLIC__/images/contract.gif" action="2" class="explodeCategory hand"/>
						</if>
						<if condition="$v['pid'] eq 0"> <strong>{$v._name}</strong>
							<else/>
							{$v._name}
						</if>
					</td>
					<td>{$v.status_name}</td>
					<!-- <td>{$v.isnavshow_name}</td> -->
				<!-- 	<td>{$v.condition}</td> -->
					
					<td>

					<a href="{:U('AuthRule/edit',array('id'=>
						$v['id']))}">
								修改
					</a>
					<span class="line">|</span>
					<a href="javascript:;" onclick="del_modal('{:U('AuthRule/del',array('id'=>
						$v['id']))}')">
								删除
					</a>
				</td>
			</tr>
		</foreach>
		<else/>
		<tr>
			<td colspan="7">没有找到符合的记录</td>
		</tr>
	</if>
</table>

<input type="button" class="hd-btn hd-btn-sm select_all" value="全选">
<input type="button" class="hd-btn hd-btn-sm operation" value="排序" name="update_sort" >
</form>
<script type='tex/javascript'> 
var PUBLIC = '__PUBLIC__';
</script>
</body>
</html>