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
		<div class="alert alert-success">添加分类</div>
		<form action="" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">分类</label>
				<textarea name="cname" rows="5" cols=""  class="form-control" placeholder="请输入分类按照|分开,可一次添加多个分类"></textarea>
				<input type="hidden" name="pid"  value="0" />
				<input type="hidden" name="sort" value="100" />
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
