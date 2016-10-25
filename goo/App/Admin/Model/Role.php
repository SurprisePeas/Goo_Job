<?php namespace Admin\Model;
use \Hdphp\Model\Model;

//=========='后台'[角色表]==========
class Role extends Model
{
	//-----------------------ready----------------------------
	protected $table = 'rbac_admin_role';
	protected $validate = [
		['name','required','角色为空!',3,3]
	];
	//---------------------------------------------------------		
		
	public function getAll(){
		$roleData = $this->get();
		$roleData = $roleData?$roleData:[];
		return $roleData; 
	}//getAll---
	
	/*
	 * 添加角色
	 */
	public function store(){
		if(!$this->create()) return false;
		$this->add();return true;
	}//store---


}
?>