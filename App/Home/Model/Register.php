<?php namespace Home\Model;
use Hdphp\Model\Model;
use Common\Model\Resume;

class Register extends Model
{
	//指定表名-----------------------------------
	protected $table = 'lg_user';
	
	//自动验证-----------------------------------
	protected $validate = array(
		//	array(字段名,验证方法,提示错误信息,验证条件,验证时间)
		array('account','user:5,20','用户名不符合规则',3,3),
        array('account','/^[A-Za-z0-9]{5,20}$/','用户名必须以字母开头,5-20位',3,3),
		array('password','required','密码不能为空',3,3),
		array('passworded','required','请确认密码',3,3),
		array('code','required','请输入验证码',3,3),
		array('distinguish','required','请选择账号用途',3,3)
	);
	
	//自动完成-----------------------------------
	protected $auto = [
		//**加密的第一种方法:
		array('password','md5','function',3,3)
	];
	
	//添加---------------------------------------
	public function store(){
		//判断如果通过create验证通过,执行添加步骤
		if($this->create()){
			//**加密的第二种方法:
//			获得加密的data里的密码
//			$data = md5($this->data['password']);
			//赋值给$this->data['password']
//			$this->data['password'] = $data;

			//将distinguish存入变量中,用于判断
			$distinguish = $this->data['distinguish'];
			//将data值添加进数据库
			$uid = $this->add();
			if($distinguish == 1 ){
				//判断如果是distinguish为1的话,是求职者.在简历表里加入一条默认数据
				$resumeModel = new Resume;
				//自动验证,获得data数据
				$resumeModel->create();
				//将uid压入到data数组里的lg_user_uid
				$resumeModel->data['lg_user_uid'] = $uid;
				//执行添加
				$resumeModel->add();
			}
			return TRUE;
		}
		return FALSE;
	}//store
	
	
}//class
?>