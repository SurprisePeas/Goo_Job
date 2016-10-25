<?php namespace Home\Controller;
//规定空间
use Hdphp\Controller\Controller;

class CommonController extends Controller{
	//自动执行----------------------------------------------------
	public function __init(){
		//验证用户是否登录状态方法
//		$this->authDistinguish();
		//创建自动执行方法
		if(method_exists($this, '__auto')){//判断如果有__auto,就自动调用__auto 
			$this->__auto();
		}
	}//__init
	
	//验证是否登录--------------------------------------------------
	public function authDistinguish(){
		//判断是否登录,没有的话跳转到登录
		if(!isset($_SESSION['info'])) {go(U('Login/index'));}
	}//authDistinguish
	
}//CLASS
?>