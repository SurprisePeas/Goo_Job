<?php namespace Common\Model;
use Hdphp\Model\Model;

/*
 * ********************************job_data职位表********************************
 */
class JobData extends Model
{
	//---------------指定表名(公司表)--------------------
	protected $table = 'job_data';
	
	//-----------------自动验证-------------------------
	protected $validate = array(
		array('describe','required','请填写职位详细信息',3,3)
	);
	
	
}//class
?>