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
			  <th width="50">企业名称</th>
			  <th width="30">行业领域</th>
			  <th width="30">融资阶段</th>
			  <th width="30">公司规模</th>
			  <th width="30">营业执照</th>
			</tr>
			
			{{foreach from="$data" value="$d" }}
			<tr>
				<td>{{$d['lg_user_uid']}}</td>
				<td>{{$d['cpname']}}</td>
				<td>{{$d['industry']}}</td>
				<td>{{$d['financing']}}</td>
				<td>{{$d['cpscale']}}</td>
				<td>{{$d['license']}}</td>
			</tr>
			{{endforeach}}
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