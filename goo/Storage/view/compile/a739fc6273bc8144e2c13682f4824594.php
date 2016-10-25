	<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <link href="./Public/admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <link href="./Public/admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/admin/Flat/img/favicon.ico">
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="20">用户id</th>
			  <th width="100">企业名称(营业执照)</th>
			  <th width="30">行业领域</th>
			  <th width="30">融资阶段</th>
			  <th width="30">公司规模</th>
			  <th width="10">官网</th>
			</tr>
			
			<?php foreach ($data as $d){?>
			<tr>
				<td><?php echo $d['lg_user_uid']?></td>
				<td><a href="<?php echo $d['license']?>" target="_blank"><?php echo $d['cpname']?></a></td>
				<td><?php echo $d['industry']?></td>
				<td><?php echo $d['financing']?></td>
				<td><?php echo $d['cpscale']?></td>
				<td><a href="<?php echo $d['url']?>" target="_blank"><?php echo $d['url']?></a></td>
			</tr>
			<?php }?>
		</table>
		
		<style type="text/css">
			#page li{
				background: #0055AA;
				margin-left: 5px;
			}
		</style>
		<center id="page">
			<ul class="pagination">
			</ul>
		</center>
	</body>
</html>