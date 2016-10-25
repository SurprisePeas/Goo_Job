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
		<?php foreach ($guessData as $guess){?>
		<li class="guess_like_list_item">
			<a href="<?php echo U('Job/content',['jid'=>$guess['jid']])?>" target="_blank">
				<div class="guess_like_list_item_logo fl">
					<img src="<?php echo $guess['cplogo']?>" alt="<?php echo $guess['cpshortName']?>" />
				</div>
				<div class="guess_like_list_item_pos fl">
					<h2><?php echo $guess['jname']?></h2>
					<p>
						<?php echo $guess['money']?>k
					</p>
					<p class="company_name">
						<span class="company_name_span"><?php echo $guess['cpshortName']?></span>
						<span class="company_position_span">[<?php echo $guess['allDis']?> · <?php echo $guess['district_name']?>]</span>
					</p>
				</div>
			</a>
		</li>
		<?php }?>
		<!--/#数据-->
	</ul>
	</div>