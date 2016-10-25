<?php namespace Home\Controller;
use \Common\Model\User;
use \Common\Model\Resume;
use \Common\Model\Action;
use \Common\Model\Job;
//求职者 控制器
class JobhunterController extends CommonController{

	private $model;
	private $uid;

	public function __auto(){
		$this->model = new Resume;
		if(isset($_SESSION['info'])){
			$this->uid = $_SESSION['info']['uid'];
		}else{
			go(U('Index/index'));
		}
	}//__auto

    //----------------------------------------默认简历页面-------------------------------------------
    public function index(){
    	if(IS_POST){
			$this->model->store();
			View::success('个人信息更新成功');
    	}
		//获得旧数据 页面显示默认信息
		$userModel = new User;
		//获得当前用户的用户表里的数据
		$userData = $userModel->where("uid={$this->uid}")->first();
		//获得当前用户的简历信息数据
		$resumeData = $this->model->where("lg_user_uid={$this->uid}")->find();
		//判断如果有简历信息的话,显示数据库信息
		if($resumeData){
			//将简历表里的地区转为数组
			if(!empty($resumeData['area'])){
				$resumeData['area'] = explode(',', $resumeData['area']);
			}else{
				$resumeData['area'][0] = '北京市';
				$resumeData['area'][1] = '北京';
				$resumeData['area'][2] = '朝阳区';
			}
			View::with('resumeData',$resumeData);//分配 用户信息表
		}else {
			View::with('resumeData',0);//分配 用户信息表
		}
		View::with('userData',$userData);

		View::make();
	}//index

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
			$pic = Db::table('lg_user')->where("uid={$uid}")->pluck('header_pic');
	    	if(isset($pic)){
	    		//删除pic路径下的图片
	    		unlink($pic);
				//将当前用户的头像数据(header_pic)字段数据更新为插件传来的$file的路径
	    	}
	    	Db::table('lg_user')->where("uid={$uid}")->update(['header_pic'=>$file[0]['path']]);
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

	//----------------------用户名ajax处理---------------------
	public function ajaxName(){
		//获得当前用户uid
		$uid = $_SESSION['info']['uid'];
		//获得POST过来的username
		$username = Q('post.username');

		$userModel = new User;
		//将User数据库为uid的 username字段数据更新为POST过来的数据
		$userModel->where("uid={$uid}")->update(array('username'=>$username));
		//获得更新后的数据库username
		$username = $userModel->where("uid={$uid}")->pluck("username");
		//返回JSON格式的username
		echo json_encode($username);
		exit;
	}//ajaxName

	//----------------------上传简历文件---------------------
	public function updalodResume(){
		$file = Upload::path('Upload/File/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {//不为空的情况
	    	//获得ＳＥＳＳＩＯＮ里的ｕｉｄ
	    	$uid = $_SESSION['info']['uid'];
			//获得当前用户的简历的数据(路径信息)
			$f = Db::table('resume')->where("lg_user_uid={$uid}")->pluck('file');
			p($f);
	    	if(isset($f)){
	    		//删除pic路径下的简历
	    		unlink($f);
	    	}
			//将当前用户的简历数据(header_pic)字段数据更新为插件传来的$file的路径
	    	Db::table('resume')->where("lg_user_uid={$uid}")->update(['file'=>$file[0]['path']]);
	    	Db::table('resume')->where("lg_user_uid={$uid}")->update(['upload_time'=>time()]);
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
	}//updalodResume

    //----------------------------------------收藏页面-------------------------------------------
	public function collect(){
		/*
		 * 思路不对  重写
		 */
		$jobModel = new Job;
		$randJobData = $jobModel->randJob();
//		p($randJobData);
		View::with('randJobData',$randJobData );
		View::make();
	}//collect

    //----------------------------------------简历投递箱状态页面-------------------------------------------
	public function send(){
		if(!$_SESSION['info']){go(U('Login/index'));}
		$uid = $this->uid;
		$actionModel = new Action;//实例化 简历状态表
		//获得当前用户的简历rid
		$rid = $this->model->where("lg_user_uid={$uid}")->pluck('rid');
		if(!$rid){//如果没有简历
			View::with('actionData',[]);
			View::with('guessData',0);
		}else {
			//获得当前用户的所有投递的简历状态(投递给哪个职位-职位信息)
			$actionData = $actionModel
						->join("job",'job_jid','=','jid')
						->join("company",'company_cpid','=','cpid')
						->where("resume_rid={$rid}")
						->orderBy('actioning','ASC')
						->get();

			//[猜你喜欢] 右侧推荐
			$jobModel = new Job;
			$guessData = $jobModel->guessJob($actionData);
			View::with('guessData',$guessData);//猜你喜欢
			View::with('actionData',$actionData);//状态数据
		}
	    View::make();
	}//send

	//验证用户是否有简历
	public function checkRid(){
		$uid = $this->uid;
		$rid = $this->model->where("lg_user_uid={$uid}")->pluck('rid');
		return $rid;
	}

    //----------------------------------------简历投递箱状态页面(1投递成功)-------------------------------------------
	public function suc(){
		$check = $this->checkRid();
		if($check){
			$actionData = $this->actionData(1);
			$jobModel = new Job;
			$guessData = $jobModel->guessJob($actionData);

			/*
			 * $guessData
			 * $actionData
			 * 分不清谁是谁....
			 * 重新查数据
			 */
			View::with('guessData',$guessData);
			View::with('actionData',$actionData);
		}else {
			View::with('guessData',[]);
			View::with('actionData',[]);
		}
	    View::make();
	}//success
	//----------------------------------------简历投递箱状态页面(2被查看)-------------------------------------------
	public function see(){
		$check = $this->checkRid();
		if($check){
			$actionData = $this->actionData(2);
			$jobModel = new Job;
			$guessData = $jobModel->guessJob($actionData);

			/*
			 * $guessData
			 * $actionData
			 * 分不清谁是谁....
			 * 重新查数据
			 */
			View::with('guessData',$guessData);
			View::with('actionData',$actionData);
		}else {
			View::with('guessData',[]);
			View::with('actionData',[]);
		}
	    View::make();
	}//see
    //----------------------------------------简历投递箱状态页面(3邀请面试)-------------------------------------------
	public function infoFace(){
		$check = $this->checkRid();

		if($check){
			$actionData = $this->actionData(3);
			$jobModel = new Job;
			$guessData = $jobModel->guessJob($actionData);

			/*
			 * $guessData
			 * $actionData
			 * 分不清谁是谁....
			 * 重新查数据
			 */
			View::with('guessData',$guessData);
			View::with('actionData',$actionData);
		}else {
			View::with('guessData',[]);
			View::with('actionData',[]);
		}
	    View::make();
	}//infoFace
    //----------------------------------------简历投递箱状态页面(4不合适)-------------------------------------------
	public function pass(){
		$check = $this->checkRid();

		if($check){
			$actionData = $this->actionData(4);
			$jobModel = new Job;
			$guessData = $jobModel->guessJob($actionData);

			/*
			 * $guessData
			 * $actionData
			 * 分不清谁是谁....
			 * 重新查数据
			 */
			View::with('guessData',$guessData);
			View::with('actionData',$actionData);
		}else {
			View::with('guessData',[]);
			View::with('actionData',[]);
		}
	    View::make();
	}//pass

	//------------------------------------自定义公共的查询简历状态的函数------------------------------------
	public function actionData($where){
		$uid = $this->uid;
		$actionModel = new Action;//实例化 简历状态表
		//获得当前用户的简历rid
		$rid = $this->model->where("lg_user_uid={$uid}")->pluck('rid');
		//组合接收来的where值,因为数据库字段是enum需要存字符串, 所以进行拼接成字符串格式进行查询
		$where = "'".$where."'";
		//获得当前用户的所有投递的简历状态(投递给哪个职位-职位信息)
		$actionData = $actionModel
			->join("job",'job_jid','=','jid')
			->join("company",'company_cpid','=','cpid')
			->where("resume_rid={$rid} AND actioning=$where ")
			->orderBy('actioning','ASC')
			->get();
		return $actionData;
	}//actionData



}//CLASS
?>