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
		<div class="alert alert-success">编辑友链</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleInputEmail1">名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text" required="" name="lname" value="{{$oldData['lname']}}">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">logo</label>
				<input id="exampleInputEmail1" class="form-control" type="file" name="logo">
				<img src="{{$oldData['logo']}}"/>
				<input type="hidden" name="logo" value="{{$oldData['logo']}}" />
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">url地址</label>
				<input id="exampleInputEmail1" class="form-control" type="text" required="" name="url" value="{{$oldData['url']}}">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">排序</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序" required="" name="sort" value="{{$oldData['sort']}}">
			</div>
			<input type="hidden" name="lid" id="lid" value="{{$_GET['lid']}}" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
