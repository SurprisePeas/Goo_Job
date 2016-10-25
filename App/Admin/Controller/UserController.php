<?php namespace Admin\Controller;
use Admin\Model\RbacUser;//用户表
use Admin\Model\Node;//节点表
use Admin\Model\Role;//角色表
use Admin\Model\RoleNode;//权限表

class UserController extends CommonController{
	private $userModel;//模型:[用户表]
	private $nodeModel;//模型:[权限表]
	private $roleModel;//模型:[角色表]
	
	public function __auto(){
		$this->userModel = new RbacUser;
		$this->nodeModel = new Node;
		$this->roleModel = new Role;
	}//__auto---
	
	//-----[用户"展示"]-----
	public function index(){
		$userData = $this->userModel->getAllNadmin();
		View::with('userData',$userData);
	    View::make();
	}//index---
	
	//-----[添加"用户"]-----
	public function addUser(){
		if(IS_POST){
			if(!$this->userModel->store()) {View::error($this->userModel->getError());}
			View::success('添加成功',U('index'));
		}
		//分配[角色]
		$roleModel = new Role;
		$roleData = $roleModel->getAll();
		View::with('roleData',$roleData);
	    View::make();
	}//addUser---

	//----[角色"展示"]-----
	public function role(){
		$roleData = $this->roleModel->getAll();
		View::with('roleData',$roleData);
	    View::make();
	}//role---
	
	//----[角色"添加"]-----
	public function roleAdd(){
	    View::make();
	}//roleAdd---
	
	//----[角色"权限分配"]----
	public function roleallot(){
		$role_id = Q('get.id',0,'intval');
		$RoleNodeModel = new RoleNode;//权限表
		if(IS_POST){
			if($RoleNodeModel->store($role_id)){View::success('权限添加成功','role');}
		}
		$nodeData = $this->nodeModel->layer();//节点数据
		$old_node_id = $RoleNodeModel->where("role_id={$role_id}")->lists('node_id');//查询之前旧数据node_id
		$old_node_id = $old_node_id ? $old_node_id : [];
		View::with('old_node_id',$old_node_id);
		View::with('nodeData',$nodeData);//节点
		View::make();
	}//roleallot---
	
	//----[节点"展示"]----
	public function node(){
		$nodeData = $this->nodeModel->getAllTree();
		View::with('nodeData',$nodeData);
		View::make();
	}//node---
	
	//----[节点"添加"]----
	public function nodeAdd(){
		if(IS_POST){
			if(!$this->nodeModel->store()){$this->error($this->nodeModel->getError());}
			View::success('成功添加','node');
		}
		$nodeData = $this->nodeModel->getAllTree();
		View::with('nodeData',$nodeData);
		View::make();
	}//nodeAdd---
	
}//CLASS
?>	