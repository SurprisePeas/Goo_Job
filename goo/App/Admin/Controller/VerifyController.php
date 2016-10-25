<?php namespace Admin\Controller;

//|--------------------------审核页面----------------------------|
class VerifyController extends CommonController{
	protected $model;

	//实例化公司模型-------------------------------------
	public function __auto(){
		$this->model = new \Common\Model\Company;
	}//auto

	//默认显示页面---------------------------------------
	public function index(){
		$data = Db::table('company')
			  ->join('lg_user','lg_user_uid','=','uid')
			  ->where("verifying='2'")
			  ->orderBy('verifyTime','desc')
			  ->get();
		//分配--显示------------------------------------
		View::with('data',$data);
	    View::make();
	}//index

	//通过审核------------------------------------------
	public function pass(){
		//获得GET传递过来的uid
		$uid = Q('get.uid',0,'intval');
		Db::table('lg_user')->where("uid='{$uid}'")->update(["verifying"=>'4','distinguish'=>'2']);
		View::success('处理成功');
	}//pass

	//拒绝通过审核---------------------------------------
	public function noPass(){
		$uid = Q('get.uid',0,'intval');
		Db::table('lg_user')->where("uid='{$uid}'")->update(["verifying"=>'3']);
		View::success('处理成功');
	}//noPass

	//通过审核页面---------------------------------------
	public function passView(){
		$data = Db::table('company')
			  ->join('lg_user','lg_user_uid','=','uid')
			  ->where("verifying='4'")
			  ->orderBy('verifyTime','desc')
			  ->get();
		View::with('data',$data);
	    View::make();
	}//passView

	//审核失败页面---------------------------------------
	public function notPassView(){
		$data = Db::table('company')
		  ->join('lg_user','lg_user_uid','=','uid')
		  ->where("verifying='3'")
		  ->orderBy('verifyTime','desc')
		  ->get();
		View::with('data',$data);
	    View::make();
	}//notPassView

}//CLASS
?>