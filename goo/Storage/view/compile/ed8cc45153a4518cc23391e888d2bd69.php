<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <link href="./Public/admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <link href="./Public/admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/admin/Flat/img/favicon.ico">
	    <script src="./Public/home/js/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">cid</th>
			  <th>分类名称</th>
			  <th>排序</th>
			  <th width="300">操作</th>
			</tr>
			<?php foreach ($data as $d){?>
			<!--自定义属性pid和cid  将数据里的值循环放入  		判断如果pid不等于0  就隐藏-->
			<tr data-pid="<?php echo $d['pid']?>" data-cid="<?php echo $d['cid']?>" class="cont" <?php if($d['pid'] != 0){?>
                 style="display: none;background:#dff0d8 ;"
               <?php }?>>
				<td><?php echo $d['cid']?></td>
				<td><?php echo $d['_name']?></td>
				<td><?php echo $d['sort']?></td>
				<td>
					<a href="<?php echo U('Category/addSon',array('cid'=>$d['cid']))?>" class="btn btn-sm btn-primary">添加子类</a>
					<a href="<?php echo U('Category/edit',array('cid'=>$d['cid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<!--传参cid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='<?php echo U('Category/del',array('cid'=>$d['cid']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		<style type="text/css">
			#page li{
				background: #0055AA;
				margin-left: 5px;
			}
			.cont{
				cursor: pointer;	
			}
		</style>
		<script type="text/javascript">
			$(".cont").click(function(){
				//获得父级cid
				var cid = $(this).attr('data-cid');
				//判断 是可见显示状态的tr 使其隐藏
				if($("tr[data-pid=" +cid+ "]").is(":visible")){
					$("tr[data-pid=" +cid+ "]").fadeOut();
				}else{
					$("tr[data-pid=" +cid+ "]").fadeIn();
				}
			})
		</script>
	</body>
</html>