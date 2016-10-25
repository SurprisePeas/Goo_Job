<?php namespace Admin\Controller;
use \Hdphp\Controller\Controller;

//后台登录控制器
class LoginController extends Controller{

	//默认显示登录界面-------------------------
	public function index(){
		if(IS_POST){
			//1.判断验证码是否正确
			$code = Q('post.code',NULL,'strtoupper');
			if($code != $_SESSION['code']) View::error('验证码错误');
			//2.验证用户名是否存在
			$aname = Q('post.aname');
			//查询数据库
			$data = Db::table('rbac_admin_user')->where("aname='{$aname}'")->first();
			if(!$data) View::error('用户与密码不匹配');
			//3.验证密码是否正确
			$password = Q('post.password','','md5');
			if($password != $data['password']) View::error('密码不匹配');

			//将信息存入session
			$_SESSION['aid'] = $data['aid'];
			$_SESSION['aname'] = $data['aname'];

			View::success('欢迎回来',U('Index/index'));
		}//if P
	    View::make();
	}//index

	public function out(){
		session_unset();
		session_destroy();
		go(U('index'));
	}//out

	//设置验证码-------------------------------
	public function code(){
	    Code::num(C('webSet.CODE_LEN'))->fontColor(C('webSet.CODE_COLOR'))->height(40)->width(130)->make();
	}//code

}//CLASS
?>