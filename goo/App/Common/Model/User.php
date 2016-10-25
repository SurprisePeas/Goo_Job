<?php namespace Common\Model;
use \Hdphp\Model\Model;
use \Common\Model\Resume;

//--------------------[登录|注册]---------------------------
class User extends Model
{
	//---------------指定表名(用户表)--------------------
	protected $table = 'lg_user';

	protected $validate = [
		['code','required','请输入验证码',3,3],
		['account','required','未填写用户名',3,3],
		['password','required','未填写密码',3,3],
		['passworded','required','请重新确认密码',3,3],
		['code','_code','验证码不正确',3,3],
		['account','minlen:6','用户名长度不得少于6位',3,3],
		['account','maxlen:20','用户名长度不得大于20位',3,3],
		['distinguish','required','请选择账号使用目的',3,3],
		['account','_username',"用户名必须符合(大于8位并由字母开头与数字._混合的组合类型)",3,3],
		['password','minlen:6','密码不得少于6位',3,3],
		['password','maxlen:16','密码不得大于16位',3,3],
		['passworded','regexp:/^(?!\d+$)(?![a-z]+$).+$/i','密码必须符合数字与字母混合类型',3,3],
		['password','confirm:passworded','两次密码不一致',3,3],
		['account','unique','用户名已存在',3,3],
	];
	protected $auto = [
		['password','md5','function',3,3]
	];
	//[自动验证]方法
	public function _code(){
		$code = Q('post.code');
		if(strtolower($code) != strtolower($_SESSION['code'])) return false;
		return true;
	}//_code
	//[自动验证]方法验证用户名是否符合要求
	public function _username(){
		$account = Q('post.account');
		$strlen = strlen($account);
		if (!preg_match("/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){8,16}$/",
		$account))
		{
		return false;
		} elseif (20 < $strlen || $strlen < 8)
		{
		return false;
		}
		return true;
	}//_username

	//------------------------验证,注册账号------------------------
	public function store(){
		if(!$this->create()) return false;
		$uid = $this->add();
		$resModel = new Resume;
		$resModel->data['lg_user_uid'] = $uid;
		$resModel->add();
		return true;
	}//store
	//------------------------模态框登录------------------------
	public function modal(){
		//1.验证是否有此用户
		$account = Q('post.account');//接收POST[用户名]
		$data = $this->where("account='{$account}'")->find();
		if(!$data){
			return false;
		}
		//2.密码是否正确
		$password = Q('post.password','','md5');
		if($password != $data['password']){
			return false;
		}//密码与数据库数据匹配,提示不正确
		//3.通过验证
		$_SESSION['info'] = [
			'uid' => $data['uid'],//存入uid
			'account' => $account,//存入账号
			'username' => $data['username'],//用户名
			'distinguish' => $data['distinguish'],//存入用户的状态['个人','企业']
			'verifying' => $data['verifying'] //存入企业审核状态
		];
		return true;
	}//modal

	//==================用户个人信息修改------------------------------
	public function persona($uid){
		$uname = Q('post.username');
		$sex = Q('post.sex');
		$this->where("uid={$uid}")->update(['username'=>$uname,'sex'=>$sex]);
		return true;
	}//persona

	//------------------------修改密码------------------------
	public function editPassword($uid){

	}//editPassword






}
?>