<?php namespace Admin\Controller;
//规定空间
use Hdphp\Controller\Controller;

class CommonController extends Controller{
	//自动执行----------------------------------------------------
	public function __init(){
		//验证登录用户状态方法
		if(!Rbac::isLogin()){go(U('Login/index'));}
		//验证权限
		if(!Rbac::verify()){View::error('管理权限不够!');}
		
		//创建自动执行方法
		if(method_exists($this, '__auto')){//判断如果有__auto,就自动调用__auto 
			$this->__auto();
		}
	}//__init
	
}//CLASS
?>