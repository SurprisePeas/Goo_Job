$(function(){
	//工作地点加鼠标移入事件
	$(".btn_more").mouseenter(function(){
		$(".more_hidden").addClass('unfolded');
	})
	$(".more_hidden").mouseleave(function(){
		$(".more_hidden").removeClass('unfolded');
	})
	
	//行业领域加鼠标移入事件
	$(".btn_more_work").mouseenter(function(){
		$(".more_hidden_hy").addClass('unfolded');
	})
	$("body").click(function(){
		$(".more_hidden_hy").removeClass('unfolded');
	})
	
	//筛选折叠
	var collapse=1;
	$(".btn_collapse").click(function(){
		if(collapse==1){
			collapse=2;
			$(".details").fadeOut();
			$(".li_taller").fadeIn();
		}else{
			collapse=1;
			$(".details").fadeIn();
			$(".li_taller").fadeOut();
		}
		
	})
	
	//排序
	var sel=1;
	$(".select1").click(function(){
		if(sel==1){
			sel=2;
			$(this).find('i').css('transform','rotate(180deg)');
			$(".select1 ul").show();
		}else{
			sel=1;
			$(this).find('i').css('transform','rotate(0deg)');
			$(".select1 ul").hide();
		}
	})
	
	var sel2=1;
	$(".select2").click(function(){
		if(sel==1){
			sel=2;
			$(this).find('i').css('transform','rotate(180deg)');
			$(".select2 ul").show();
		}else{
			sel=1;
			$(this).find('i').css('transform','rotate(0deg)');
			$(".select2 ul").hide();
		}
	})
	
	
	
})
