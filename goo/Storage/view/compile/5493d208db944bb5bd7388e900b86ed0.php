<form action="" method="post">
								<ul class="my_delivery">
									<!--数据-->
									<?php foreach ($actionData as $act){?>
									<li>
										<div class="d_item">
											<!--职位名称 薪资-->
											<h2>
												<a href="<?php echo U('Job/content',array('jid'=>$act['jid']))?>" target="_blank">
													<em><?php echo $act['jname']?></em>
													<span>（<?php echo $act['money']?>k）</span>
												</a>
											</h2>
											<!--/#职位名称 薪资-->

											<!--公司信息-->
											<a href="" class="d_jobname">
												<?php echo $act['cpname']?> <span>[<?php echo $act['city']?>]</span>
											</a>
											<!--/#公司信息-->
											<a href="javascript:;" class="btn_showprogress"><span><?php if($act['actioning']==1){?>
                投递成功<?php }else if($act['actioning']==2){?>已被查看<?php }else if($act['actioning']==3){?>邀请面试<?php }else if($act['actioning']==4){?>不合适
               <?php }?></span><i class="btn_closeprogress_jiantou"></i></a>
											<span class="d_time"><?php echo date('Y-m-d H:i:s',$act['act_time'])?></span>
											
										</div>
										<!--隐藏的简历进度信息-->
										<div class="progress_status">
											<!--图标 颜色-->
											<?php if($act['actioning']==1){?>
                
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==2){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>3</span></li>
												<li class="status_line status_line_grey"><span></span></li>
												<li class="status_grey"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==3){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											<?php }else if($act['actioning']==4){?>
											<ul class="status_steps">
												<li class="status_done status_1">1</li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>2</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>3</span></li>
												<li class="status_line status_line_grey"><span class="green_line"></span></li>
												<li class="status_grey bg_bottom"><span>4</span></li>
											</ul>
											
               <?php }?>
											<style type="text/css">
												.green_line{
													background: #019875 !important;
												}
												.status_grey.bg_bottom{
													background-position: left top !important;
												}
											</style>
											
											
											<!--文字描述-->
											<ul class="status_text">
												<li class="">投递成功</li>
												<li class="status_text_2">简历被查看</li>
												<li class="status_text_3">待沟通</li>
											<?php if($act['actioning']==4){?>
                
												<li class="status_text_4">不合适</li>
											<?php }else if($act['actioning']!=4){?>
												<li class="status_text_4">面试</li>
											
               <?php }?>
											</ul>

											<!--时间,企业查看了简历-->
											<div class="status_list">
												<!--时间-->
												<div class="list_time">
													<em></em>
													<?php echo date('Y-m-d H:i:s',$act['act_time'])?>
												</div>
												<!--已成功-->
												<div class="list_body">
													<h3 class="contact_title"><?php echo $act['cpshortName']?> 
														<?php if($act['actioning']==1){?>
                
														已成功接收你的简历
														<?php }else if($act['actioning']==2){?>
														查看你的简历
														<?php }else if($act['actioning']==3){?>
														邀请你面试
														<?php }else if($act['actioning']==4){?>
														简历被标记为不合适
														
               <?php }?>
													</h3>
												</div>
												<a href="javascript:;" class="btn_closeprogress"></a>
											</div>
										</div>
										<!--/#隐藏的简历进度信息-->
									</li>
									<?php }?>
									<!--/#数据-->
								</ul>
							</form>