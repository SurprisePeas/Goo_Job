<?php namespace Admin\Model;
use \Hdphp\Model\Model;

//=========='后台'[用户-角色表]==========
class UserRole extends Model
{
	protected $table = 'rbac_admin_user_role';

	//---添加----
	public function store($uid,$data){
		if($data){//循环将 多个角色(role_id)添加给 一个用户(admin_id)
			foreach ($data as $k => $v) {
				$this->add(['role_id'=>$v,'user_id'=>$uid]);
			}
		}
	}//store---
}//CLASS
?>