$(function(){
	//搜索页面，回车事件
	$("#keyword").keydown(function(e){
		//判断keyCode是否为13（回车）
		if(e.keyCode==13){
		   $("#submit").click(); //处理事件
		}
	})
	
	//搜索页面,点击搜索按钮时触发事件----------------
	$("#submit").click(function(){
		//获得input的值
		var keyword = $("input:text").val();
		
		//获得url值
		var url = 'index.php?m=Home&c=Index&a=huntlist';
		//组合 加参数跳转
		location.href = url+'&keyword='+keyword;
	})
	$("#keyword").keydown(function(e){
		//判断keyCode是否为13（回车）
		if(e.keyCode==13){
		   $("#submitCom").click(); //处理事件
		}
	})
	//公司搜索页面,点击搜索按钮时触发事件----------------
	$("#submitCom").click(function(){
		//获得input的值
		var keyword = $("input:text").val();
		
		//获得url值
		var url = 'index.php?m=Home&c=Index&a=companylist';
		//组合 加参数跳转
		location.href = url+'&keyword='+keyword;
	})

	//搜索框---[更多]hover事件
	$("#more-btn").hover(function(){
		$(".more").show();
		$("#more-btn i").addClass('rote');
	})
	$(".more-positions").mouseleave(function(){
		$(".more").fadeOut();
		$("#more-btn i").removeClass('rote');
	})
	
	
	
	
	
	
})