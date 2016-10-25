<?php namespace Home\Controller; 
use \Common\Model\User;
use \Common\Model\Resume;
//企业 控制器
class ResumeController extends CommonController{
	
	private $model;
	private $uid;
	
	public function __auto(){
		$this->model = new Resume;
		$this->uid = $_SESSION['info']['uid'];
		$this->verification();
	}//__auto
	
    //--------------默认简历页面---------------------
    public function index(){
    	if(IS_POST){
    		if(!$this->model->store()) View::error($this->model->getError());
			View::success('简历更新成功');
    	}
		
		//获得旧数据 页面显示默认信息
		$userModel = new User;
		//获得当前用户的用户表里的数据 
		$userData = $userModel->where("uid={$this->uid}")->first();
		//获得当前用户的简历信息数据
		$resumeData = $this->model->where("lg_user_uid={$this->uid}")->first();
		//将简历表里的地区转为数组
		$resumeData['area'] = explode(',', $resumeData['area']);
		View::with('userData',$userData);
		View::with('resumeData',$resumeData);//分配 用户信息表
		View::make();
	}//index
	
	
	//---------------------------上传(删除)图片ajax处理------------------------
	public function ajaxF(){
		echo data;
	}//ajaxF
	//---------------------------用户名ajax处理------------------------
	public function ajaxName(){
		$uid = $_SESSION['info']['uid'];
		$username = Q('post.username');
		$userModel = new User;
		$userModel->where("uid={$uid}")->update(array('username'=>$username));
		$username = $userModel->where("uid={$uid}")->pluck("username");
		echo json_encode($username);
		exit;
	}//ajaxName
	
	
}//CLASS
?>