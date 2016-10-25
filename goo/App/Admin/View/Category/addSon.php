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
				<p>分类</p>
				<textarea name="cname" rows="5" cols=""  class="form-control" placeholder="请输入分类按照|分开,可一次添加多个分类">|</textarea>
				<br />
				<div class="form-group">
					<p>所属分类</p>
					<select name="pid" class="form-control">
						<option value="{{$cate['cid']}}">{{$cate['cname']}}</option>
					</select>
				</div>
				<br />
				<p>排序</p>
				<input type="text" name="sort" class="form-control" value="{{$cate['sort']-10}}" />
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>