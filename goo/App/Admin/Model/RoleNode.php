<?php namespace Admin\Model;
use \Hdphp\Model\Model;

//=========='后台'[权限表]==========
class RoleNode extends Model
{
	protected $table = 'rbac_admin_role_node';

	//----[添加]----
	public function store($id){
		$this->create();
		//删除旧数据
		$findData = $this->where("role_id={$id}")->find();
		if($findData){
			$this->where("role_id={$id}")->delete();
		}
		//添加新数据
		foreach (Q('post.nodeid') as $k => $v) {
			$this->add(['role_id'=>$id,'node_id'=>$v]);
		}
		return true;
	}//store---
	
	
	
}
?>