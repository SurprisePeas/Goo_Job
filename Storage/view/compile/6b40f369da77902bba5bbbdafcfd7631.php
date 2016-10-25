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
				<input type="text" name="cname" id="cname" class="form-control" value="<?php echo $oldDistrictData['district_name']?>" />
				<br />
				<div class="form-group">
					<p>所属省市</p>
					<select name="pid" class="form-control">
						<option value="0">省市</option>
						<?php foreach ($DistrictData as $c){?>
						<option value="<?php echo $c['plid']?>" <?php if($oldDistrictData['pid'] == $c['plid']){?>
                selected
               <?php }?>><?php echo $c['_name']?></option>
						<?php }?>
					</select>
				</div>
				<br />
				<p>排序</p>
				<input type="text" name="sort" class="form-control" value="<?php echo $oldDistrictData['sort']?>" />
			</div>
			<input type="hidden" name="plid" value="<?php echo $_GET['plid']?>" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>