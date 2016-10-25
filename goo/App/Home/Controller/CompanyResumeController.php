<?php namespace Home\Controller; 
use \Common\Model\Company;
use \Common\Model\Job;
use \Common\Model\Action;
use \Common\Model\Resume;
//企业简历管理 控制器
class CompanyResumeController extends CommonController{
	
	private $model;
	
	public function __auto(){
		$this->model = new Company;
    	$this->verification();
	}//__auto
	
    //--------------默认简历页面---------------------
    public function index(){
    	//获得当前公司的cpid
		$cpid = $_SESSION['info']['cpid'];
		//查询当前公司发布的职位
		$jobModel = new Job;
		//获得 与职位匹配的简历信息 
		$job_actData = $jobModel
				 ->join('action','jid','=','job_jid')//连表 简历状态表
				 ->join('resume','resume_rid','=','rid')//连表 简历
				 ->join('lg_user','lg_user_uid','=','uid')//连表 用户表
				 ->where("company_cpid={$cpid} AND actioning='1' OR actioning='2'")//当前公司的 并且actioning状态为1（求职者提交过来的简历）和2(查看过，但没处理，给求职者看）的数据
				 ->get();
		//统计数组里有多少数组数据, 计算多少份待处理简历
		$num = count($job_actData);
		
		View::with('num',$num);
    	View::with('job_actData',$job_actData);
		View::make();
	}//index
	
    //--------------已通知面试页面---------------------
	public function infoFace(){
    	//获得当前公司的cpid
		$cpid = $_SESSION['info']['cpid'];
		//查询当前公司发布的职位
		$jobModel = new Job;
		//获得 与职位匹配的简历信息 
		$job_actData = $jobModel
				 ->join('action','jid','=','job_jid')//连表 简历状态表
				 ->join('resume','resume_rid','=','rid')//连表 简历
				 ->join('lg_user','lg_user_uid','=','uid')//连表 用户表
				 ->where("company_cpid={$cpid} AND actioning='3'")//当前公司的 并且actioning状态为1（求职者提交过来的简历）和2(查看过，但没处理，给求职者看）的数据
				 ->get();
		//统计数组里有多少数组数据, 计算多少份待处理简历
		$num = count($job_actData);
		
		View::with('num',$num);
    	View::with('job_actData',$job_actData);
	    View::make();
	}//infoFace
	
	//--------------不合适简历页面---------------------
	public function pass(){
    	//获得当前公司的cpid
		$cpid = $_SESSION['info']['cpid'];
		//查询当前公司发布的职位
		$jobModel = new Job;
		//获得 与职位匹配的简历信息 
		$job_actData = $jobModel
				 ->join('action','jid','=','job_jid')//连表 简历状态表
				 ->join('resume','resume_rid','=','rid')//连表 简历
				 ->join('lg_user','lg_user_uid','=','uid')//连表 用户表
				 ->where("company_cpid={$cpid} AND actioning='4'")//当前公司的 并且actioning状态为1（求职者提交过来的简历）和2(查看过，但没处理，给求职者看）的数据
				 ->get();
		//统计数组里有多少数组数据, 计算多少份待处理简历
		$num = count($job_actData);
		
		View::with('num',$num);
    	View::with('job_actData',$job_actData);
	    View::make();
	}//pass
	
	//--------------全选ajax处理---------------------
	public function ajaxAll(){
		$aid = Q('post.aid');
		//查询当前aid数据修改actioning状态为3(通知面试)
		$actModel = new Action;
		$actModel->where("aid IN ({$aid})")->update(['actioning'=>4]);
		echo 1;
	}//ajaxAll
	
	public function ajaxDel(){
		$aid = Q('post.aid');
		//查询当前aid数据修改actioning状态为3(通知面试)
		$actModel = new Action;
		$actModel->where("aid IN ({$aid})")->delete();
		echo 1;
	}//ajaxDel
	
    //----------------------------按钮*执行*方法-----------------------------------
    //--------------通知面试 方法---------------------
    public function actFace(){
    	//获得点击的参数id
		$aid = Q('get.aid');
		$actModel = new Action;
		//查询当前aid数据修改actioning状态为3(通知面试)
		$actData = $actModel->where("aid={$aid}")->update(['actioning'=>3]);
		go(U('index'));
	}//actFace
    //--------------不合适简历 方法---------------------
    public function passFunc(){
    	//获得点击的参数id
		$aid = Q('get.aid');
		$actModel = new Action;
		//查询当前aid数据修改actioning状态为4(不合适状态)
		$actData = $actModel->where("aid={$aid}")->update(['actioning'=>4]);
		go(U('index'));
	}//passFunc
    //----------------------------按钮*执行*方法-----------------------------------
    
  	//--------------------------------验证状态----------------------------------------
	public function verification(){
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
	
	
}//CLASS
?>