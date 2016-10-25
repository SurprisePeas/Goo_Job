<?php namespace Admin\Model;
use \Hdphp\Model\Model;

//=========='后台'[节点表(权限)]==========
class Node extends Model
{
	protected $table = 'rbac_admin_node';

	protected $validate = [
		['name','required','权限标识为空!',3,3],
		['title','required','权限名称为空!',3,3],
	];
	
	//----数据[树状结构]----
	public function getAllTree(){
		$nodeData = $this->get();
		$nodeData = Data::tree($nodeData,'title','id','pid');
		$nodeData = $nodeData?$nodeData:[];
		return	$nodeData;
	}//getAllTree---
	
	//----[目录列表]----
	public function layer(){
		$nodeData = Data::channelLevel($this->get(), $pid = 0, $html = "&nbsp;", $fieldPri = 'id', $fieldPid = 'pid');
		$nodeData = $nodeData?$nodeData:[];
		return	$nodeData;
	}//layer---
	
	//----[添加]----
	public function store(){
		if(!$this->create()){return false;}
		//获取post的pid,进行分配level级别
		$pid = Q('post.pid',0,'intval');
		if($pid==0){
			$this->data['level'] = 1;
		}else {
			$this->data['level'] = $this->where("id={$pid}")->pluck('level')+1;
		}
		$this->add();
		return true;
	}//store---
	
}//CLASS
?>