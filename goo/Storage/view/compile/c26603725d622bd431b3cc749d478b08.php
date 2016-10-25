<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="200">lid</th>
			  <th>链接名称</th>
			  <th>企业Logo</th>
			  <th>排序</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['lid']?></td>
				<td><a href="javascript:;" target="_blank"><?php echo $v['lname']?></a></td>
				<td><img src="<?php echo $v['logo']?>" width="30" height="30" /></td>
				<td><?php echo $v['sort']?></td>
				<td>
					<a href="<?php echo U('edit',array('lid'=>$v['lid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除?')) location.href='<?php echo U('del',array('lid'=>$v['lid']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		<style type="text/css">
			.pagination li{
				background: #0055AA;
				margin-left: 5px;
			}
		</style>
		<center id="pagination">
			<ul class="pagination">
				<?php echo $page?>
			</ul>	
		</center>
	</body>
</html>
