<?php namespace Common\Model;
use \Hdphp\Model\Model;
use Home\Model\ComData;
use Common\Model\Job;

class Company extends Model
{
	//---------------指定表名(公司表)--------------------
	protected $table = 'company';
	
	//------------------自动验证------------------------
	protected $validate = array(
		array('cpname','required','企业名称不能为空',3,3),
		array('cpaddress','required','企业地址不能为空',3,3),
		array('industry','required','企业类型不能为空',3,3),
		array('cpscale','required','企业规模不能为空',3,3),
	);
	
	//--------------------自动完成-----------------------
	protected $auto = array(
		//审核提交时间
		array('verifyTime','time','function',3,3),
		//获得uid
		array('lg_user_uid','getUid','method',3,3),
		//营业执照图片信息
		array('license','getLicense','method',3,3),
	);
	
	//------------------获得当前用户uid-------------------
	public function getUid(){
		return $_SESSION['info']['uid'];
	}//getUid
	
	//----------------------验证----------------------- ( ⊙ o ⊙ )! 貌似没用上
	public function check(){
		//creata自动验证错误
		if(!$this->create()) return false;
		//错误信息,证明上传失败
		if($this->error) return false;
		//实例化company_data表,验证
		$comDataModel = new ComData;
		if(!$comDataModel->create()){
			//将错误压入到$this->error中
			$this->error = $comDataModel->getError();
			return false;
		}
		return true;
	}//check
	
	//--------------------处理营业执照图片------------------
	public function getLicense(){
		//如果有上传文件
		if($_FILES){
			//获得POST的
			$files = Upload::type('jpg,jpeg,png')->make();
			return $files[0]['path'];
		}//FILES
		return true;
	}//getLicense
	
	//--------------------添加数据------------------------
	public function store(){
		if ($this->create()) {
			//获得添加的cpid
			$cpid = $this->add();
			//实例化公司信息表
			$ComDataModel = new ComData;
			//create公司信息表
			$ComDataModel->create();
			//将公司cpid赋值给信息表里的data['company_cpid']
			$ComDataModel->data['company_cpid'] = $cpid;
			//添加数据
			$ComDataModel->add();
			
			return true;
        } else {
            //获取错误信息
            return $this->getError();
        }
	}//store
	
	//--------------------编辑修改----------------------
	public function edit(){
		//执行添加
		$this->create();
		//修改company表公司数据信息
		$this->save();
		
		//修改company_data内容表
		$cpid = Q('post.cpid');
		//实例化公司信息表
		$comDataModel = new ComData;
		//执行添加
		$comDataModel->create();
		//修改company_data表数据
		$comDataModel->where("company_cpid={$cpid}")->save();
		return true;
	}//edit
	
	
	//--------------公司列表页sql筛选---------------
	public function comFiltrate($SQname,$param){
		/*
		 * $SQname	市区名称
		 */ 
		$sqlStore = '';//用于拼接字符串 [数据库查询]
		if($SQname != '0') $sqlStore .= "cpaddress LIKE '%$SQname%' ";//城市
		if($param[1] != '0') $sqlStore .= "AND financing='{$param[1]}'";//融资阶段
		if($param[2] != '0') $sqlStore .= "AND industry='{$param[2]}'";//公司类型
		
		
		$orderBySql = '';//[排序]
		if($param[3] != '0'){
			$orderBySql = "DESC";
		}else {
			$orderBySql = "ASC";
		}
		
		//[执行查询]
		$finalData = $this->where("$sqlStore")->orderBy('job_count',$orderBySql)->get();
		
		return $finalData;
	}//comFiltrate
	
	
	//----------------推荐公司[随机获取]-------------------
	public function randData(){
		$data = $this->orderBy('rand()')->limit(5)->get();
		return $data;
	}//randData
	
	//-------------[减1职位数量]---------------
	public function cutCount($jid,$ints=1){
		$jobModel = new Job;
		$cpid = $jobModel->where("jid={$jid}")->pluck("company_cpid");
		$this->where("cpid={$cpid}")->increment('job_count',$ints);
		return true;
	}//cutCount
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}//class
//企业Logo上传-----------有uploaddify就不用你了~~~~------------------------------
/*
public function getLogo(){
	//获得POST提交的图片name信息
	$cplogo = Q('post.cplogo');
	//判断如果没有上传图片,将原图片信息返回
	if($_FILES['cplogo']['error'] == 4) return $cplogo;
	
	//获得上传信息
	$files = Upload::type('jpg','jpeg','png')->make();
	//判断如果上传成功
	if($files){
		//判断如果有旧图片信息说明是编辑修改
		if($cplogo){
			//删除原图
			unlink($cplogo);
		}//
			//将提交的图片转为进行格式化
		$cplogo = Image::thumb($files[0]['path'],$cplogo,170,170,6);
		return $cplogo;
	}//if($files)
	//将上传错误信息压入到当前模型的错误信息里,外面控制器就可以使用getError获得错误信息
	$this->error = Upload::getError();
}//getLogo
*/
?>