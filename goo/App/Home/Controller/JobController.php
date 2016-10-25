<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
use Common\Model\Job;
use Common\Model\Category;
use Common\Model\JobData;
use Common\Model\District;
use Common\Model\Action;
use Common\Model\Resume;
use Common\Model\Company;
//***************职位 控制器*******************
class JobController extends Controller{

	private $model;//job表
	private $comModel;
	private $cpid;//

	//--------------------------------自动执行-----------------------------------------
	public function __init(){
		$this->model = new Job;
		$this->comModel = new Company;
	}//__auto

    //------------------------------有效职位显示页面-------------------------------------
    public function index(){
    	$this->verification();
		//查询为当前公司ip的数据并且recycle状态1(上线的状态)
		$this->cpid = $_SESSION['info']['cpid'];
		$jobData = $this->model->join('district','city','=','plid')->where("recycle",'=','1')->where("company_cpid='{$this->cpid}'")->orderBy('pubdate','DESC')->get();
		//简历总数
		$countJobs = $this->model->where("recycle",'=','1')->where("company_cpid='{$this->cpid}'")->count();

		//分配变量到模板
		View::with('jobData',$jobData);
		View::with('countJobs',$countJobs);
		View::make();
	}//index

    //---------------------------------发布职位界面-------------------------------------
    public function createJob(){
		$this->cpid = $_SESSION['info']['cpid'];
    	$this->verification();
		//获得category表数据
		//判断如果有提交
    	if(IS_POST){
			//判断是否通过验证添加
			if(!$this->model->store()) View::error($this->model->getError());
			View::success('职位已发布成功','Job/index');
    	}//if P

    	//调用cateSon方法获得分类
    	$CategoryModel = new Category;
		$TopCategoryData = $CategoryModel->cateSon();

        //查找城市
        $DisModel = new District;
        $disData = $DisModel->where("pid=0")->get();


		//顶级分类
        View::with('disData',$disData);
        View::with('cpid',$this->cpid);//公司cpid
		View::with('TopCategoryData',$TopCategoryData);
        View::make();
    }//createJob

    //---------------------------------修改编辑职位界面-------------------------------------
    public function editJob(){
    	$this->verification();//调取判断用户状态方法

    	//如果post提交了数据,处理数据进行数据库修改
    	if(IS_POST){
			if(!$this->model->edit()) View::error($this->model->getError());
			View::success('职位信息修改成功','Job/index');
    	}//if P

    	//------------------查询旧数据------------------
    	$CategoryModel = new Category;//职位分类表
    	$JobDataModel = new JobData;//职位 详细信息表
    	$DistrictModel = new District;//地区表信息
    	//获得GET的jid参数
    	$jid = Q('get.jid',0,'intval');
		//获得为jid的数据
		$oldJobData = $this->model->where("jid={$jid}")->find();
		//获得$oldJobData里的money数组数据
		$money = $oldJobData['money'];
		//进行替换,拆分成数组再压回money数组里
		$oldJobData['money'] = explode('-', str_replace('k', '', $money));

		//查询分类表获得职位分类名称
		$cateData = $CategoryModel->where("cid={$oldJobData['category_cid']}")->pluck('cname');
		//调用模型里cateSon方法获得分类
		$TopCategoryData = $CategoryModel->cateSon();

		//查询[地区-城市]名称
		$cityId = $oldJobData['city'];//获得数据里的地区[city]ID
		$allData = $DistrictModel->get();//获得所有数据
		$districtData = $DistrictModel->FatherCity($allData,$cityId);//执行地区模型里FatherCity方法获得所属城市
		$oldJobData['districtData'] = $districtData;

		//查询职位信息表获得 职位详细介绍
		$oldJob_Data_S = $JobDataModel->where("job_jid={$jid}")->find();
		View::with('cateData',$cateData);//职位分类表
		View::with('oldJobData',$oldJobData);//将jid的数据分配到页面,做旧数据默认值
		View::with('TopCategoryData',$TopCategoryData);
		View::with('oldJob_Data_S',$oldJob_Data_S);//职位 详细信息表数据
        View::make();
    }//editJob

    //---------------------------------下线职位界面------------------------------------
    public function recycleJob(){
		$cpid = $_SESSION['info']['cpid'];
    	$this->verification();//验证状态
    	$jobData = $this->model->recycleAction('2');
		//简历总数
		$countJobs = $this->model->where("recycle",'=','2')->where("company_cpid='{$cpid}'")->count();
		$countJobsUp = $this->model->where("recycle",'=','1')->where("company_cpid='{$cpid}'")->count();

		View::with('jobData',$jobData);
		View::with('countJobs',$countJobs);
		View::with('countJobsUp',$countJobsUp);
		View::make();
    }//recycleJob


   //------------------------------职位内容显示页面-------------------------------------
    public function content(){
    	//获得GET传参的jid，
    	$jid = Q('get.jid',0,'intval');
		//执行一次content让'热度'(点击量)字段加1
		$this->model->where("jid={$jid}")->increment('hot_click',1);

		//查询jid的 职位-公司 数据 (哪个公司发表的哪个职位)
		$data = Db::table('job')
			 ->join('job_data','jid','=','job_jid')
	    	 ->join("company",'company_cpid','=','cpid')
			 ->join('lg_user','lg_user_uid','=','uid')
	    	 ->where("jid={$jid} AND recycle='1'")
	    	 ->first();
		//获得城市名称[压入到data数据里]
		$disModel = new District;
		$data['cityName']= $disModel->FacityName($data['city']);

		//判断如果有session登录的话,获得简历信息
		if(isset($_SESSION['info'])){
			if($_SESSION['info']['distinguish'] == 2 ){//如果是企业
				$data['qiye'] = '0';

				View::with('hunterData',0);
			}//企业
			if($_SESSION['info']['distinguish'] == 1 ){//如果是个人
				$data['noSession'] = '1';
				$data['qiye'] = '1';//页面 判断是企业还是个人的状态字段
				//查询用户是否投递过简历
				$actionModel = new Action;
				$actData = $actionModel->check($data);
				//判断如果查到数据,给data数据里加一个键名['验证是否投递过简历']
				if($actData){
					$data['action'] = '1';
				}
				//获得当前用户简历的rid
			  	$uid = $_SESSION['info']['uid'];
			  	$rid = Db::table('resume')
						->where("lg_user_uid={$uid}")
						->pluck('rid');
				if($rid){
					//-简历表 查询当前'用户的简历数据'
					$hunterData = Db::table('resume')
								->join('lg_user','lg_user_uid','=','uid')
								->where("lg_user_uid={$uid}")
								->first();
					//拆分成数组并拿去第4号键位上的值
					if(!empty($hunterData['file'])){
						$file = explode('/', $hunterData['file'])[4];
						//判断如果有用户名就用用户名没有就用账号名['拼接字符串']  XXX的简历
						$hunterData['fileName'] = $hunterData['username']?$hunterData['username'].'的简历'.'/'.$file:$hunterData['account'].'的简历'.'/'.$file;
					}

					View::with('hunterData',$hunterData);//当前'用户简历个人信息'分配到页面
				}else{
					View::with('hunterData',0);
				}

			}//个人
		}else {//如果没有session['没登录']
			View::with('hunterData',0);
		}

		//随即获得公司的信息 ,作为[推荐公司]数据
		$comModel = new Company;
		$recommendCompany = $comModel->randData();

		//[相似职位]查询
		$likeJob = $this->model->likeJobF($data['jname'],$data['jid']);

		//将查看的职位存入session里['最近浏览']
		$_SESSION['recently'] = $data;

		View::with('data',$data);//职位所有内容数据
		View::with('recommendCompany',$recommendCompany);//推荐公司
		View::with('likeJob',$likeJob);//相似职位推荐
        View::make();
    }//content



   //------------------------------职位内容显示页面(发布职位时ajax处理 '查找地区名'是否存在表里 )-------------------------------------
    public function ajaxArea(){
        $area_val = Q('post.val');
        //将ajax发送来的值传给District模型里进行执行查询动作
		$disModel = new District;
		if(!$disModel->ajaxAreaM($area_val)){
			View::ajax(0,$type='JSON');
		}
		View::ajax(1,$type='JSON');

    }//ajaxArea

   //------------------------------职位内容显示页面(投递简历ajax处理)-------------------------------------
    public function ajaxSend(){
    	//获得GET的job职位jid
    	$jid = Q('post.jid',0,'intval');
    	//获得当前用户简历的rid
    	$uid = $_SESSION['info']['uid'];
    	$rid = Db::table('resume')
			->where("lg_user_uid={$uid}")
			->pluck('rid');
    	//将jid和rid存入简历状态表里 action
    	$actionModel = new Action;//实例化Action简历状态表

		//将数组对应字段数据对应匹配
		$actionData['actioning'] = 1;//状态1  投递成功
		$actionData['job_jid'] = $jid;//获得当前职位的jid
		$actionData['resume_rid'] = $rid;//获得当前用户的简历id
		$actionData['act_time'] = time();//获得当前用户的简历id

		//将actionData数组数据添加进表里
		$actionModel->add($actionData);
		echo 1;
		die;
    }//ajaxSend

    //---------------------------------已下线职位执行更改状态(*下线职位*)------------------------------------
    public function out(){
    	//获得要下线的职位jid
    	$jid = Q('post.jid',0,'intval');
		//将jid数据的recycle状态改为2
		Db::table('job')->where("jid={$jid}")->update(array('recycle'=>2));
		$this->comModel->cutCount($jid,-1);//减1个职位[数量]
		echo 1;
		die;
    }//out

    //---------------------------------下线职位界面(*重新发布*)------------------------------------
    public function renew(){
    	//GET 参数
    	$jid = Q('post.jid',0,'intval');
		//更改jid数据
		//将jid数据的recycle字段转为1
		Db::table('job')->where("jid={$jid}")->update(array('recycle'=>1));
		$this->comModel->cutCount($jid,1);//加1个职位[数量]
    	echo 1;
		die;
    }//renew

    //---------------------------------删除已发布的职位------------------------------------
    public function del(){
    	//获得GET的jid参数
    	$jid = Q('post.jid',0,'intval');
		//删除为jid的数据
		Db::table('job')->where("jid={$jid}")->delete();
		Db::table('job_data')->where("job_jid={$jid}")->delete();
		View::success('已成功删除职位');
		echo 1;
		die;
    }//del

	//--------------------------------验证状态----------------------------------------
	public function verification(){
		if(!isset($_SESSION['info'])) {go(U('Login/index'));}
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
    	return true;
	}//verification

}//CLASS
?>