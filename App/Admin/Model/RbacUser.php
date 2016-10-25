<?php namespace Admin\Model;
use \Hdphp\Model\Model;
use \Admin\Model\UserRole;//用户-角色  [中间表]

//=========='后台'[用户表]==========
class RbacUser extends Model
{
	//---------------ready(后台用户表)--------------------
	protected $table = 'rbac_admin_user';

	protected $validate = [
		['user','required','用户名为空!',3,3],
		['user','unique','用户名重复!',3,3],
		['password','required','用户密码为空!',3,3]
	];
	
	protected $auto = [
		['aname','post_user','method',3,3],
		['password','md5','function',3,3],
	];
//-------------------------------------------------------------
	public function post_user(){//用户名'POST'
		return Q('post.user');
	}//post_user---
	public function getAllNadmin(){//获得所有(除了admin用户)
		return $this->where(" user != 'admin' ")->get();
	}//getAll
	
	//用户[添加]
	public function store(){
		if(!$this->create()) return false;
		p(Q('post.'));
		$aid = $this->add();
		$URModel = new UserRole;//用户-角色
		$URModel->store($aid,Q('post.roleid'));
		return true;
	}//store---
	
	
}
?>