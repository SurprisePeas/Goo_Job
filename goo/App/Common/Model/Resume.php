<?php namespace Common\Model;
use \Hdphp\Model\Model;

class Resume extends Model
{
	//---------------指定表名(简历表)--------------------
	protected $table = 'resume';

	//-----------------自动验证-------------------------
	protected $validate = array(
		//个人信息并不是必填项**
		// array('position','required','请填写身份名称(职业技能)',3,3),
		// array('age','/^\d+$/','年龄必须是数字',3,3),
		// array('education','required','请填写学历',3,3),
		// array('introductions','required','请用一句话介绍自己',3,3),
		// array('cellphone','required','请填写手机号',3,3),
		// array('email','required','请填写邮箱',3,3),
	);

	//-----------------自动完成-------------------------
	protected $auto = array(
		array('LastTime','time','method',3,3)
	);

	//-----------------添加更改数据------------------------
	public function store(){
		// if(!$this->create()) return false;
		$this->create();
		$this->data['age'] = Q('post.age',0,'intval');
		if(empty($this->data['age'])){
			$this->data['age']=0;
		}
		//获得当前session用户的id
		$lg_user_uid = $_SESSION['info']['uid'];
		//将uid压入data数组里
		$this->data['lg_user_uid'] = $lg_user_uid;
		//获得POST来的 地区 数据
		$area = Q('post.area');
		//将数组组合成字符串
		if(!empty($area)){
			$area = implode(',', $area);
			//将地区字符串压入到data数组里的area里
			$this->data['area'] = $area;
		}
		//判断['简历表']是否有uid用户数据
		// $this->where("'lg_user_uid'=>$lg_user_uid")->save();
		$this->save();
		return true;

		// if(empty($this->data['rid'])){
		// 	unset($this->data['rid']);
		//
		// 	return true;
		// }else {
		// 	$this->where("rid={$this->data['rid']}")->save();
		// 	return true;
		// }
	}//store

}//class


?>