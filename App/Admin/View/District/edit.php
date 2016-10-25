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
		<div class="alert alert-success">修改地区名</div>
		<form action="" method="post">
			<div class="form-group">
				<p>地区名</p>
				<input type="text" name="cname" id="cname" class="form-control" value="{{$oldDistrictData['district_name']}}" />
				<br />
				<div class="form-group">
					<p>所属省市</p>
					<select name="pid" class="form-control">
						<option value="0">省市</option>
						{{foreach from="$DistrictData" value="$c"}}
						<option value="{{$c['plid']}}" {{if value="$oldDistrictData['pid'] == $c['plid']"}}selected{{endif}}>{{$c['_name']}}</option>
						{{endforeach}}
					</select>
				</div>
				<br />
				<p>排序</p>
				<input type="text" name="sort" class="form-control" value="{{$oldDistrictData['sort']}}" />
			</div>
			<input type="hidden" name="plid" value="{{$_GET['plid']}}" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>