<?php namespace Home\Controller; 
use \Common\Model\User;
use \Common\Model\Resume;
use \Common\Model\Action;
//求职者 控制器
class PersonaController extends CommonController{
	
	private $model;
	private $uid;
	
	public function __auto(){
		$this->model = new User;
		$this->uid = $_SESSION['info']['uid'];
		if(!$_SESSION['info']) go(U('Index/index'));
//		$this->verification();
	}//__auto
	
    //----------------------------------------个人中心-------------------------------------------
    public function index(){
    	$uid = $_SESSION['info']['uid'];
    	if(IS_POST){
			$this->model->persona($uid);
			View::success('修改成功');
    	}
		//获取用户原信息
		$userData = $this->model->where("uid={$uid}")->first();
		View::with('userData',$userData);
		View::make();
	}//index
    //----------------------------------------个人中心['修改密码']-------------------------------------------
	public function editpassword(){
    	$uid = $_SESSION['info']['uid'];
		if(IS_POST){
			$newPassword = Q('post.newPassword');
			$confirmPassword = Q('post.confirmPassword');
        	//一,判断新密码是否少于6位
        	if(strlen($newPassword) < 6 ) View::error('密码少于6位');
        	if(strlen($newPassword) >16) View::error('密码不能大于16位');
			if(!preg_match("/^(?!\d+$)(?![a-z]+$).+$/i", $newPassword)) View::error("请输入6-16位以字母开头密码,字母区分大小写");
			//二,两次密码不一致
        	if($confirmPassword != $newPassword) View::error('两次密码不一致');
        	
        	//三,判断原密码是否正确
        		//1.获取session['info']的uid,用于查询数据库
			$uid = $_SESSION['info']['uid'];
        		//2.查询数据库,获得数据
        	$data = $this->model->where("uid={$uid}")->get();
        	//获得post过来的加密的旧密码
        	$oldPassword = Q('post.oldPassword','','md5');
        	//判断旧密码如果和数据库里查询的数据不同,则返回错误信息
        	if($oldPassword != $data[0]['password']) View::error('原密码错误~');
        	
        	//四,修改密码,修改数据库里的数据并跳转成到登录页面	
        	$this->model->where("uid={$uid}")->update(['password'=>md5($newPassword)]);
			//返回信息
			//清除session
			session_unset();
			session_destroy();
			View::success('密码修改成功','Index/index');
		}
		$userData = $this->model->where("uid={$uid}")->first();
		View::with('userData',$userData);
	    View::make();
	}//editpassword
	
	//---------------------上传(删除)图片ajax处理----------------------
	public function ajaxF(){
		
	  	$file = Upload::path('Upload/Content/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {//不为空的情况
	    	//获得ＳＥＳＳＩＯＮ里的ｕｉｄ
	    	$uid = $_SESSION['info']['uid'];
			//获得当前用户的头像的数据(路径信息)
			$pic = Db::table('lg_user')->where("uid={$uid}")->pluck('shequ_pic');
	    	if(isset($pic)){
	    		//删除pic路径下的图片
	    		unlink($pic);
				//将当前用户的头像数据(header_pic)字段数据更新为插件传来的$file的路径
	    	}
	    	Db::table('lg_user')->where("uid={$uid}")->update(['shequ_pic'=>$file[0]['path']]);
	        /** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
		                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
		                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
		                'image' => 1
	            ),
	        );**/
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $data = $file[0];
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}//ajaxF
	
	
}//CLASS
?>