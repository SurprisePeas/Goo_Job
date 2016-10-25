<?php namespace Home\Controller;
use \Common\Model\Company;
use \Common\Model\Job;
use \Common\Model\District;
//企业 控制器
class CompanyController extends CommonController{

	private $model;

	public function __auto(){
		$this->model = new Company;
	}//__auto

    //--------------默认公司页面---------------------
    public function index(){
		$this->authDistinguish();

    	//判断用户身份状态
    	$this->verification();

		if(IS_POST){
			//判断是否修改成功
			if(!$this->model->edit()) View::error($this->model->getError());
			go(U('Company/index'));
			return true;
		}//if P

		///////获取数据库数据,显示页面信息///////
		$uid = $_SESSION['info']['uid'];
		$userData = Db::table('lg_user')->where("uid={$uid}")->first();
		//调用获得当前公司的数据
		$this->oldData();
		//获得发布职位的数量
		$cpid = $_SESSION['info']['cpid'];
		$jobModel = new Job;
		$jobData = $jobModel
				 ->where("company_cpid={$cpid}")
			 	 ->where("recycle='1'")
				 ->get();
		$num = count($jobData);

		//分配变量到页面
		View::with('userData',$userData);//分配登录用户数据
		View::with('num',$num);
    	View::make('index');die;
	}//index

    //------------------招聘职位页面----------------------
	public function jobs(){
		$this->authDistinguish();

    	$this->verification();
		if(IS_POST){
			//判断是否修改成功
			if(!$this->model->edit()) View::error($this->model->getError());
			View::success("修改成功");
		}//if P

		$uid = $_SESSION['info']['uid'];
		$userData = Db::table('lg_user')->where("uid={$uid}")->first();
		$this->oldData();
		//用户表 => 公司表 连表数据

		$cpid = $_SESSION['info']['cpid'];
		$jobModel = new Job;
		$jobData = $jobModel
				 ->join("district",'city','=','plid')
				 ->where("company_cpid={$cpid} AND recycle='1' ")
				 ->get();
		$num = count($jobData);
		//获得城市名称[压入到data数据里]
		$disModel = new District;
		foreach ($jobData as $key => $value) {
			$jobData[$key]['city_name'] = $disModel->where("plid={$value['pid']}")->find();
		}

		View::with('jobData',$jobData);
		View::with('userData',$userData);
		View::with('num',$num);
	    View::make('jobs');
	}//jobs

	//-------------------获得原数据方法(公共调用)------------------
	public function oldData(){
		//获得当前用户的uid
		$uid = $_SESSION['info']['uid'];
		//获得公司表信息
		$oldData = $this->model->where("lg_user_uid={$uid}")->first();
		//获得登录账号信息
		$userData = Db::table('lg_user')->where("uid={$uid}")->first();

		//用户表 => 公司表 连表数据
 		$oldData = Db::table('lg_user')
			->join('company','uid','=','lg_user_uid')
			->join('company_data','company_cpid','=','cpid')
			->where("uid={$uid}")
			->first();

		//将公司cpid存入session
		$_SESSION['info']['cpid'] = $oldData['cpid'];
		return View::with('oldData',$oldData);

	}//oldData

    //------------------招聘职位页面（只能查看）----------------------
    public function indexShow(){
    	///////获取数据库数据,显示页面信息///////
    	$cpid = Q('get.cpid');
		$comData = Db::table('company')
				 ->join('lg_user','lg_user_uid','=','uid')
				 ->join('company_data','cpid','=','company_cpid')
				 ->where("cpid={$cpid}")
				 ->first();

		$num = Db::table('job')
			 ->where('company_cpid','=',$cpid)
			 ->where("recycle='1'")
			 ->count('jid');
//		p($comData);
		View::with('num',$num);
		View::with('comData',$comData);//公司基本信息
    	View::make();die;
    }//indexShow
    //------------------公司主页页面（只能查看）----------------------
    public function jobsShow(){
    	///////获取数据库数据,显示页面信息///////
    	$cpid = Q('get.cpid');
		$comData = Db::table('company')
				 ->join('lg_user','lg_user_uid','=','uid')
				 ->join('company_data','cpid','=','company_cpid')
				 ->where("cpid={$cpid}")
				 ->first();
		//职位信息
		$jobData = Db::table('job')
				 ->join("district",'city','=','plid')
				 ->where("company_cpid={$cpid} AND recycle='1' ")
				 ->get();

		//获得城市名称[压入到data数据里]
		$disModel = new District;
		foreach ($jobData as $key => $value) {
			$jobData[$key]['city_name'] = $disModel->where("plid={$value['pid']}")->find();
		}

		//职位统计
		$num = Db::table('job')
			 ->where('company_cpid','=',$cpid)
			 ->where("recycle='1'")
			 ->count('jid');

		View::with('num',$num);
		View::with('comData',$comData);//公司基本信息
		View::with('jobData',$jobData);
    	View::make();die;
    }//jobsShow


    //---------------------上传(删除)图片ajax处理----------------------
	public function ajaxF(){
	  	$file = Upload::path('Upload/Content/Logo/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {//不为空的情况
	    	//获得ＳＥＳＳＩＯＮ里的cpｉｄ
	    	$cpid = $_SESSION['info']['cpid'];
			//获得当前用户的头像的数据(路径信息)
			$pic = Db::table('company')->where("cpid={$cpid}")->pluck('cplogo');
	    	if(isset($pic)){
	    		//删除pic路径下的图片
	    		unlink($pic);
	    	}
			//将当前用户的头像数据(cplogo)字段数据更新为插件传来的$file的路径
	    	Db::table('company')->where("cpid={$cpid}")->update(['cplogo'=>$file[0]['path']]);
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


	//--------------------------------验证状态----------------------------------------
	public function verification(){
		$this->authDistinguish();

		//判断是distinguish的话为 个人求职者 跳转到审核验证页面
		switch ($_SESSION['info']['distinguish']) {
			case 1:
				//distinguish为1的情况,是个人用户,跳转到企业审核界面进行审核
				go(U("Company/verify")); //跳转到企业认证审核页面
				break;

			default:
				if($_SESSION['info']['verifying'] ==1){go(U("Company/verify"));}//verifying=1(没有进行审核验证),跳转到审核页面
				if($_SESSION['info']['verifying'] ==2){go(U("Company/going"));}//verifying=2(正在审核中),给予提示信息
				if($_SESSION['info']['verifying'] ==3){go(U("Company/nopass"));}//verifying=3(没有通过审核),提示重新进行审核验证
				break;
    	}//switch
    	//*显示信息
    	return true;
	}//verification


    //------------------审核页面----------------------
    public function verify(){
		$this->authDistinguish();

    	if(IS_POST){
    		if($this->model->store()) {
				$uid = $_SESSION['info']['uid'];
    			//将SESSION\数据库     ['verifying']改成状态2
    			$_SESSION['info']['verifying'] = 2;
				Db::table('lg_user')->where("uid='{$uid}'")->update(['verifying'=>2]);
				//跳转到正在审核界面
				go(U('going'));
			}
    		View::error($this->model->getError());
    	}//if P
        View::make();die;
    }//verify

    //--------------等待审核页面---------------------
    public function going(){
		$this->authDistinguish();

        View::make();die;
    }//going

    //------------没有通过审核--------------------
    public function nopass(){
		$this->authDistinguish();

    	//将SESSION状态改成1
		$_SESSION['info']['verifying'] = 1;
        View::make();die;
    }//nopass


}//CLASS
?>