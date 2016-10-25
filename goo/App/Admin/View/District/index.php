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
			  <th width="100">地区ID</th>
			  <th>地区名称</th>
			  <th>排序</th>
			  <th width="300">操作</th>
			</tr>
			{{foreach from="$data" value="$d"}}
			<!--自定义属性pid和plid  将数据里的值循环放入  		判断如果pid不等于0  就隐藏-->
			<tr data-pid="{{$d['pid']}}" data-plid="{{$d['plid']}}" class="cont" {{if value="$d['pid'] != 0"}} style="display: none;background:#dff0d8 ;"{{endif}}>
				<td>{{$d['plid']}}</td>
				<td>{{$d['_name']}}</td>
				<td>{{$d['sort']}}</td>
				<td>
					<a href="{{U('District/addSon',array('plid'=>$d['plid']))}}" class="btn btn-sm btn-primary">添加地区</a>
					<a href="{{U('District/edit',array('plid'=>$d['plid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<!--传参plid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('District/del',array('plid'=>$d['plid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
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
				//获得父级plid
				var plid = $(this).attr('data-plid');
				//判断 是可见显示状态的tr 使其隐藏
				if($("tr[data-pid=" +plid+ "]").is(":visible")){
					$("tr[data-pid=" +plid+ "]").fadeOut();
				}else{
					$("tr[data-pid=" +plid+ "]").fadeIn();
				}
			})
		</script>
	</body>
</html>