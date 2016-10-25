<?php namespace Home\Controller;
//规定空间
use Hdphp\Controller\Controller;
use \Common\Model\User;

//----------------用户表---------------------
class LoginController extends Controller
{
	//定义私有model
	private $model;

//	实例化Model类----------------------------
	public function __init(){
		$this->model = new User;
	}//__init


	//--------------登录页面---------------
	public function index(){
		//判断如果有POST提交
		if(IS_POST){
			//1.判断验证码是否正确
			$code = Q('post.code',NULL,'strtoupper');
			if(isset($_SESSION['code'])){
				if($code != $_SESSION['code']) View::error('验证码不正确');
			}

			//2.验证用户名是否已经存在数据库
			$account = Q('post.account');//接收POST提交的account
			$data = Db::table('lg_user')->where("account='{$account}'")->first();//查询同为account的数据******
			if(!$data) View::error('没有匹配的账号信息');//如果没有这条数据提示错误

			//3.判断密码是否正确
			$password = Q('post.password','','md5');
			if($password != $data['password']) View::error('密码不正确');//密码与数据库数据匹配,提示不正确
			p($data);
			//4.上面全部通过,将值存入session中
			$_SESSION['info'] = [
				'uid' => $data['uid'],//存入uid
				'account' => $account,//存入账号
				'username' => $data['username'],//账号名称
				'distinguish' => $data['distinguish'],//存入判断用户的状态
				'verifying' => $data['verifying'] //存入企业审核状态
			];
			//更新上次登录时间
			Db::table('lg_user')->where("account='{$account}'")->update(['lastLoginTime'=>time()]);
			//提示信息
			go(U('Index/index'));
		}//if P
	    View::make();
	}//index

	public function modalAjax(){
		//判断如果有POST提交
		if(IS_AJAX){
			if($this->model->modal()){
				echo 1;die;
			}else {
				echo 0;
			}
		}//if P
	}//index

//	注册页面-------------------------------------
	public function register(){
		//判断如果有POST提交
		if(IS_AJAX){
			if(!$this->model->store()){//错误信息提示
				$this->ajax(['status'=>false,'message'=>$this->model->getError()]);
			}else {
				$this->ajax(['status'=>true,'message'=>'\(^o^)/~注册成功']);
			}
		}

	    View::make();
	}//register


//	显示验证码----------------------------------
	public function code(){
		//num(读取配置项文件WebSet的数据) fontColor(读取配置项webSet文件数据)
		Code::num(C('webSet.CODE_LEN'))->fontColor(C('webSet.CODE_COLOR'))->height(40)->make();
	}//code


//	退出登录------------------------------------
	public function out(){
		session_unset();
		session_destroy();
		View::success('退出成功');
	}//out


}//class
?>