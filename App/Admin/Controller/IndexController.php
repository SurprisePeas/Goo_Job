<?php namespace Admin\Controller;

class IndexController extends CommonController{
	
	//默认显示页面--------------------------------------------------------------------
	public function index(){
	    View::make();
	}//index
	
	//欢迎界面-------------------------------------------------------------------------
	public function welcome(){
	    View::make();
	}//welcome
	
	//修改密码-------------------------------------------------------------------------
	public function changePassword(){
		if(IS_POST){
			//-----------验证程序----------------
			//1.获得新密码和确认密码
			$newPassword = Q('post.newPassword');
			$confirmPassword = Q('post.confirmPassword');
			//2.判断新密码是否少于4位长度
			if(strlen($newPassword) < 4 ) View::error('密码不得少于4位');
			//3.判断两次密码是否一致
			if($newPassword != $confirmPassword) View::error('两次密码不一致');
			//4.读取aid用户的数据
			$aid = $_SESSION['Admininfo']['aid'];
			$data = Db::table('admin_user')->where("aid='{$aid}'")->get();
			//5.比对原密码是否正确(将页面上的原密码加密为MD5格式进行比对验证)
			$oldPassword = Q('post.oldPassword','','md5');
			if($oldPassword != $data[0]['password']) View::error('原密码不正确');
			
			//-----------修改程序------------------
			Db::table('admin_user')->where("aid='{$aid}'")->update(["password"=>md5($newPassword)]);
			
			//清除session,重新登录
			session_unset();
			session_destroy();
			echo '<script>parent.location.href="'.U('Login/index').'"</script>';			
			exit;
		}//if P
		
	    View::make();
	}//changePassword
	
	
}//CLASS
?>