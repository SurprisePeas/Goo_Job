<?php namespace Common\Model;
use Hdphp\Model\Model;
/*
 * 				[地区表]
 */
class District extends Model
{
	//指定表名(地区表)-----------------------------------
	protected $table = 'district';
	
	protected $validate = array(
		array('district_name','required','地区名不能为空',3,3)
	);
	
	//-------------------添加分类----------------------
	public function store(){
		if($this->create()){
			//将字符串拆封成数组
			$Arr = explode('|', Q('post.district_name'));
			foreach ($Arr as $v) {
				$this->data['district_name'] = $v;
				$this->add($this->data);
			}
			return TRUE;
		}
		return FALSE;
	}//store
	
	//-------------------编辑更新---------------------
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->save();
		return true;
	}//edit
	
	//----------------获得[省市下的"市区"]数据-----------
	public function SonSQ(){
		$allData = $this->where("pid=0")->lists('plid');
		$allData = implode(',', $allData );
		$allData = $this->where("pid IN ($allData)")->orderBy('sort','DESC')->get();
		return $allData;
	}//SonSQ
	
	//---------------获得所属地区的父级城市名称----------------
	public function FacityName($areaId){
		$data = $this->where("plid={$areaId}")->find();
		$pid = $data['pid'];
		$cityName = $this->where("plid={$pid}")->pluck('district_name');
		return $cityName; 
	}//FacityName
	
	//---------------[地区表]组成对应数组----------------
	public function FatherCity($allData,$cityId){
		//获得当前city的pid
		$data = $this->where("plid={$cityId}")->find();
		$pid = $data['pid'];
		//获得pid的城市名称
		//创建数组,用于压入自己子集
		$temp = array();
		//查找地区名称
		$temp['area'] = $data['district_name'];
		//循环数据,将[市区名称]添加进数组
		foreach ($allData as $v) {
			if($v['plid'] == $pid){
				$temp['shiqu'] = $v;
			}//if
		}//foreach
		//循环数据,将[城市名称]添加进数组
		foreach ($allData as $value) {
			if($value['plid'] == $temp['shiqu']['pid']){
				$temp['city'] = $value;
			}
		}
		return $temp;
	}//FatherCity
	
	
	
	//-----------------ajax查询地区是否存在于'地区表里'---------------
	public function ajaxAreaM($area_val){
		$data = $this->where("district_name='{$area_val}'")->first();
		if(!$data) return false;
		return true;
	}//ajaxAreaM
	
	//获得除了自己自己的分类数据	['后台分类编辑']			不知道哪里是否用过.........先屏蔽如果有错 再调试
//	public function getNoMy($plid){
//		//获得表里的所有数据
//		$data = $this->get();
//		//调用子集方法,获得这个pid的子类
//		$plids = $this->getSon($data,$plid);
//		//将自己cid压入到cids数组里
//		$plids[] = $plid;
//		//执行sql语句,筛选除了自己和子集的数据
//		$where = "pid NOT IN(" .implode(',', $plids). ")";//将cids数组拆分
//		return $this->where($where)->get();
//	}//getNoMy
//	//获得子集
//	public function getSon($data,$plid){
//		//创建数组,用于压入自己子集
//		$temp = array();
//		//循环数据,添加进数组
//		foreach ($data as $v) {
//			if($v['pid'] == $plid){
//				$temp [] = $v['plid'];
//				//使用递归,继续查找下面的分类
//				$temp = array_merge($temp,$this->getSon($data, $v['plid']));
//			}//if
//		}//foreach
//		return $temp;
//	}//getSon
	
}//class
?>