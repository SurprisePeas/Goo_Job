<?php namespace Common\Model;
use Hdphp\Model\Model;
use Common\Model\Resume;
/*
 * ********************************Job职位表********************************
 */
class Action extends Model
{
	//---------------指定表名(公司表)--------------------
	protected $table = 'action';
	
	//---验证是否[投递过简历]------
	public function check($data){
		//获取用户uid,和职位的jid
		$uid = $_SESSION['info']['uid'];
		$jid = $data['jid'];
		//查询用户的简历
		$resModel = new Resume;
		$rid = $resModel->where("lg_user_uid={$uid}")->pluck("rid");
		if($rid){
			//查询简历状态表
			$checkData =  $this->where("resume_rid={$rid} AND job_jid={$jid} ")->first();
			return $checkData;
		}
		return false;
	}//check
	
	
	
}//class
?>