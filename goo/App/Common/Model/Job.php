<?php namespace Common\Model;
use Hdphp\Model\Model;
use Common\Model\JobData;
use Common\Model\Category;
use Common\Model\Action;
use Common\Model\District;
use Common\Model\Company;
/*
 * ********************************Job职位表********************************
 */
class Job extends Model
{
	//---------------指定表名(公司表)--------------------
	protected $table = 'job';
	
	//-----------------自动验证-------------------------
	protected $validate = array(
		array('jname','required','未选择职位',3,3),
		array('nature','required','工作性质不能为空',3,3),
		array('place','required','请填写详细地址',3,3),
		array('money_a','required','未填写薪酬',3,3),
		array('money_b','required','未填写薪酬',3,3),
		array('experience','required','请选择工作经验要求',3,3),
		array('education','required','请选择学历要求',3,3),
		array('tempt','required','请填写职位诱惑',3,3),
		array('describe','required','请详细描述职位信息',3,3)
	);
	
	//-------------------自动完成----------------------
	protected $auto =array(
		array('pubdate','time','function',3,3),
	);
	
	//-------------------添加数据----------------------
	public function store(){
		if(!$this->create()) return false;
		
		//获得city城市名
		$city = Q('post.city')[2];
		//查询输入的城市名获得当前城市的plid
		$disModel = new District;
		$plid = $disModel->where("district_name='{$city}'")->pluck('plid');
		//如果没有,提示没有开通
		if(!$plid){View::error('当前城市没有开通招聘服务');}
		
		$cname = Q('post.cname');//获得post过来cname(职位分类名称)
		$CategoryModel = new Category;
		$cate_cid = $CategoryModel->where("cname='{$cname}'")->pluck("cid");//查询为cname的cid
		//将jname 的cid 添加进POST里
		$this->data['category_cid'] = $cate_cid;//将POST数据下的category_cid添加为cid
		
		//将cpid存入到data数据数组里,用于自动存入job表(职位表)
		$cpid = $_SESSION['info']['cpid'];//获得cpid
		$this->data['company_cpid'] = $cpid;//压入data数组里
		
		//添加职位后,让公司的职位数量加1
		$comModel = new Company;
		$comModel->where("cpid={$cpid}")->increment('job_count',1);
		
		//调用change处理money字段
		$this->changeMoney();
		//调用change处理money字段将数组转为字符串 存入数据库
		$this->changeCity();
		//添加数据 并获得job表id
		$job_jid = $this->add();
		
		//将job_jid添加到job_data表里
		$JobDataModel = new JobData;//实例化job_data表
		$JobDataModel->create();//验证,data获得数据
		$JobDataModel->data['job_jid'] = $job_jid;//添加进job_data表里的job_jid字段
		$JobDataModel->add();//将对应的字段 name名 添加数据
		
		return true;
	}//store
	
	//-------------------修改数据----------------------
	public function edit(){
		//城市联动BUG,判断如果city键名0号位上的值为0的时候,说明BUG出现,没有默认选中,这时候将页面分配来的原数据替换为city数组数据
		if(Q('post.')['city'][2] == '上海'){
			$_POST['city'] = [
				0=>$_POST['city'][3],
				1=>$_POST['city'][4],
				2=>$_POST['city'][5],
			];
		}
		
    	$CategoryModel = new Category;//职位分类表
		//获得职位分类名称
		$cname = Q('post.cname');//获得post过来cname
		$cate_cid = $CategoryModel->where("cname='{$cname}'")->pluck("cid");//查询(职位分类表里为cname)的 cid
		//将jname 的cid 添加进POST里
		$_POST['category_cid'] = $cate_cid;//将分类cid添加进POST数组下的category_cid
		
		//如果没有经过验证
		if(!$this->create())return false;
		
		//调用change处理city获取地区id
		$this->changeCity();
		//调用change处理money字段将数组转为字符串 存入数据库
		$this->changeMoney();
		
		//获得cpid(公司id)
		$cpid = $_SESSION['info']['cpid'];
		//将cpid存入到data数据数组里,用于自动存入$JobData详细介绍表
		$this->data['company_cpid'] = $cpid;
		
		$this->save();//修改数据
		
		//将job_jid添加到job_data表里	[职位详情信息表job_data]
		$JobDataModel = new JobData;//实例化job_data表
		$JobDataModel->create();//验证,data获得数据
		$jid = Q('get.jid');//获得get参数jid
		//将jid的数据修改为post过来的数据
		$JobDataModel->where("job_jid={$jid}")->save();//将对应的字段 name名 添加数据
		
		return true;
	}//edit
	
	
	//-------------------处理$this->data数据----------------------
	public function changeMoney(){
		//将money数组转为字符串
		$money = $this->data['money'];
		//将接受来的money字段数组转为字符串
		$this->data['money'] = implode('k-', $money);
		
		return $this->data['money'] ;
	}//changeMoney
	
	public function changeCity(){
		//首先先判断如果没有选择城市地区的话,给错误提示
		if($this->data['city'][1]=='0'){
			View::error('请选择城市地区');
			return false;
		}
		//提取city数组第二号位上的值(地区值) *获取/设置地区id *
		$DisModel = new District;
		$cityName = $this->data['city'][2];
		$cityId = $DisModel->where("district_name='{$cityName}'")->pluck("plid");
		$this->data['city'] = $cityId;
		return $this->data['city'];
	}//changeCity
	
    //---------------------------------上线职位界面------------------------------------
	public function jobData($paramSql,$keywordSql,$sortSql){
		$jobData = $this
				 ->join('company','company_cpid','=','cpid')
				 ->join("district",'city','=','plid')
				 ->where("$paramSql recycle='1' $keywordSql ")
				 ->orderBy("pubdate",$sortSql)
				 ->get();
		return $jobData;
	}//jobData
	
	//----------------------------获得筛选后的(在线)职位的职位总数---------------------
	public function countVal($paramSql,$keywordSql,$sortSql){
		$countVal =  $this
				 ->join('company','company_cpid','=','cpid')
				 ->join("district",'city','=','plid')
				 ->where("$paramSql recycle='1' $keywordSql ")
				 ->orderBy("pubdate",$sortSql)
				 ->count();
		if($countVal >10){$countVal='10+';}//如果大于10,提示'10+'
		return $countVal;
	}
	
    //---------------------------------下线职位界面------------------------------------
    public function recycleAction($reId){
		//查询为当前公司ip的数据并且筛选recycle状态
		$cpid = $_SESSION['info']['cpid'];
		$jobData = $this->join('district','city','=','plid')->where("recycle",'=',$reId)->where("company_cpid='{$cpid}'")->orderBy('pubdate','DESC')->get();

		return $jobData;
    }//recycleJob	
	
	//---------------------------[热门职位]-------------------------------
	public function hotJob(){
		$hotJob = $this
				->where("recycle = '1'")
				->orderBy('hot_click','DESC')
				->limit(10)
				->get();
		
		return $hotJob;
	}//hotJob
	
	//随即职位
	public function randJob(){
		$randJobData = $this->orderBy("rand()")->limit(5)->get();
		return $randJobData;
	}//randJob
	
	
	//-------------------------['猜你喜欢'][理论上来说是:'获得用户收藏/点击次数最高的的职位名称,LIKE']  但是时间不够,我只能用rand随机了 [而且!! 由于框架公共页面不能得到控制器分配的数据BUG只能这样拙劣的放在模型里,供多次调用]------------------------
	public function send(){
		$uid = $_SESSION['info']['uid'];
		$actionModel = new Action;//实例化 简历状态表
		$reModel = new District;
		//获得当前用户的简历rid
		$rid = $this->model->where("lg_user_uid={$uid}")->pluck('rid');
		//获得当前用户的所有投递的简历状态(投递给哪个职位-职位信息)
		$actionData = $actionModel
					->join("job",'job_jid','=','jid')
					->join("company",'company_cpid','=','cpid')
					->where("resume_rid={$rid}")
					->orderBy('actioning','ASC')
					->get();
		
		//[猜你喜欢] 右侧推荐 调用方法
		$guessData = $this->guessJob($actionData);
		
		return $guessData;
	}//send
	//处理职位信息 [将地区城市全部压入到数组]
	public function guessJob(){
		$guessData = $this
				   ->join('company','company_cpid','=','cpid')
				   ->join('district','city','=','plid')
				   ->orderBy("rand()")
				   ->limit(5)
				   ->get();
				   
		$disModel = new District;
		foreach ($guessData as $key => $value) {
			$guessData[$key]['allDis'] = $disModel->where("plid={$value['pid']}")->pluck('district_name');
		}
		return $guessData;
	}//guessJob
	
	//	['内容页面']	[相似职位]功能查询
	public function likeJobF($jname,$jid){
		//截取前两位的字符
		$jname = mb_substr($jname,0,2,'utf-8');
		//连表[公司表] LIKE查询,并NOT IN [去除此id]
		$likeJob = $this
				 ->join('company','company_cpid','=','cpid')
				 ->where("jname LIKE '%$jname%' AND jid NOT IN($jid)")
				 ->limit(5)
				 ->get();
				 
		//调用地区表查询
		$disModel = new District;
		//循环将地区城市添加进数据里
		foreach ($likeJob as $key => $like) {
			$likeJob[$key]['dis_name'] = $disModel->FacityName($like['city']);//['LIKE' 查询同名的职位名称]
			$likeJob[$key]['city_name'] = $disModel->where("plid='{$like['city']}'")->pluck('district_name');//查询父级的地区名称
		}
		
		return $likeJob;
	}//likeJobF
	
	
	
	
}//class
?>