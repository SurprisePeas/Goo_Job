<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <!--<link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">-->
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	</head>
	<body>
		<div class="alert alert-success">编辑分类</div>
		<form action="" method="post">
			<div class="form-group">
				<p>分类</p>
				<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $oldCate['cname']?>" />
				<br />
				<div class="form-group">
					<p>所属分类</p>
					<select name="pid" class="form-control">
						<option value="0">顶级分类</option>
						<?php foreach ($cateData as $c){?>
						<option value="<?php echo $c['cid']?>" <?php if($oldCate['pid'] == $c['cid']){?>
                selected
               <?php }?>><?php echo $c['_name']?></option>
						<?php }?>
					</select>
				</div>
				<br />
				<p>排序</p>
				<input type="text" name="sort" class="form-control" value="<?php echo $oldCate['sort']?>" />
			</div>
			<input type="hidden" name="cid" value="<?php echo $_GET['cid']?>" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>