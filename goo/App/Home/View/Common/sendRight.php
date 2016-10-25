<?php
	
	$jobHunterModel = new \Common\Model\Resume;
	
	$guessData = $jobHunterModel
			   ->join('company','company_cpid','=','cpid')
			   ->join('district','city','=','plid')
			   ->orderBy("rand()")
			   ->limit(5)
			   ->get();
			   
	$disModel = new District;
	foreach ($guessData as $key => $value) {
		$guessData[$key]['allDis'] = $disModel->where("plid={$value['pid']}")->pluck('district_name');
	}
	View::with('guessData',$guessData);
		
?>	
<div class="similar_content">
<ul class="guess_like">
		<!--数据-->
		{{foreach from="$guessData" value="$guess"}}
		<li class="guess_like_list_item">
			<a href="{{U('Job/content',['jid'=>$guess['jid']])}}" target="_blank">
				<div class="guess_like_list_item_logo fl">
					<img src="{{$guess['cplogo']}}" alt="{{$guess['cpshortName']}}" />
				</div>
				<div class="guess_like_list_item_pos fl">
					<h2>{{$guess['jname']}}</h2>
					<p>
						{{$guess['money']}}k
					</p>
					<p class="company_name">
						<span class="company_name_span">{{$guess['cpshortName']}}</span>
						<span class="company_position_span">[{{$guess['allDis']}} · {{$guess['district_name']}}]</span>
					</p>
				</div>
			</a>
		</li>
		{{endforeach}}
		<!--/#数据-->
	</ul>
	</div>