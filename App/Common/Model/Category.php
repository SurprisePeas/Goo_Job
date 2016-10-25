<?php namespace Common\Model;
use Hdphp\Model\Model;

class Category extends Model
{
	//指定表名(分类表)-----------------------------------
	protected $table = 'category';
	
	protected $validate = array(
		array('cname','required','分类名不能为空',3,3),
	);
	
	//添加分类-----------------------------------------
	public function store(){
		if($this->create()){
			//将字符串拆封成数组
			$Arr = explode('|', Q('post.cname'));
			foreach ($Arr as $v) {
				$this->data['cname'] = $v;
				$this->add($this->data);
			}
			return TRUE;
		}
		return FALSE;
	}//store
	
	//编辑更新----------------------------------------
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->save();
		return true;
	}//edit
	
	//技术分类(1)
	public function jishuSon(){
		//调取一级技术分类数据
		$jishuData = $this->where("pid=1")->get();
		//将技术分类里的cid存入数据
		foreach ($jishuData as $key => $value) {
			$tempCid = $value['cid'];
			$jishuSonData = $this->where('pid',$tempCid)->get();
			$jishuData[$key]['son'] = $jishuSonData;
		}
		return $jishuData;
	}//jishuSon
	//产品(2)
	public function chanpinSon(){
		//调取一级技术分类数据
		$chanpinData = $this->where("pid=2")->get();
		//将技术分类里的cid存入数据
		foreach ($chanpinData as $key => $value) {
			$tempCid = $value['cid'];
			$chanpinSonData = $this->where('pid',$tempCid)->get();
			$chanpinData[$key]['son'] = $chanpinSonData;
		}
		return $chanpinData;
	}//chanpin	
	//设计(3)
	public function shejiSon(){
		//调取一级技术分类数据
		$shejiData = $this->where("pid=3")->get();
		//将技术分类里的cid存入数据
		foreach ($shejiData as $key => $value) {
			$tempCid = $value['cid'];
			$shejiSonData = $this->where('pid',$tempCid)->get();
			$shejiData[$key]['son'] = $shejiSonData;
		}
		return $shejiData;
	}//chanpin		
	//运营(4)
	public function yunyingSon(){
		//调取一级技术分类数据
		$yunyingData = $this->where("pid=4")->get();
		//将技术分类里的cid存入数据
		foreach ($yunyingData as $key => $value) {
			$tempCid = $value['cid'];
			$yunyingSonData = $this->where('pid',$tempCid)->get();
			$yunyingData[$key]['son'] = $yunyingSonData;
		}
		return $yunyingData;
	}//yunying		
	//市场与销售(5)
	public function shichangSon(){
		//调取一级技术分类数据
		$shichangData = $this->where("pid=5")->get();
		//将技术分类里的cid存入数据
		foreach ($shichangData as $key => $value) {
			$tempCid = $value['cid'];
			$shichangSonData = $this->where('pid',$tempCid)->get();
			$shichangData[$key]['son'] = $shichangSonData;
		}
		return $shichangData;
	}//市场与销售		
	//职能(6)
	public function zhinengSon(){
		//调取一级技术分类数据
		$zhinengData = $this->where("pid=6")->get();
		//将技术分类里的cid存入数据
		foreach ($zhinengData as $key => $value) {
			$tempCid = $value['cid'];
			$zhinengSonData = $this->where('pid',$tempCid)->get();
			$zhinengData[$key]['son'] = $zhinengSonData;
		}
		return $zhinengData;
	}//职能		
	
	
	
	
    //--------------------------------[获得三重分类]处理-------------------------------------
    public function cateSon(){
    	//获得顶级分类的数据
		$TopCategoryData = $this->where("pid=0")->get();
		//循环顶级分类
		foreach ($TopCategoryData as $key => $value) {
			//顶级分类下的子集
			$TopCategoryData[$key]['son']=$this->where("pid={$value['cid']}")->get();
			//循环son的数据
			foreach ($TopCategoryData[$key]['son'] as $k => $v) {
				//在son下再压入一个son数组
				$TopCategoryData[$key]['son'][$k]['son']=$this->where("pid={$v['cid']}")->get();
			}
		}
		return $TopCategoryData;
    }//cateSon
	
	//获得除了自己自己的分类数据	['后台分类编辑']
	public function getNoMy($cid){
		//获得表里的所有数据
		$data = $this->get();
		//调用子集方法,获得这个cid的子类
		$cids = $this->getSon($data,$cid);
		//将自己cid压入到cids数组里
		$cids[] = $cid;
		//执行sql语句,筛选除了自己和子集的数据
		$where = "cid NOT IN(" .implode(',', $cids). ")";//将cids数组拆分
		return $this->where($where)->get();
	}//getNoMy
	//获得子集
	public function getSon($data,$cid){
		//创建数组,用于压入自己子集
		$temp = array();
		//循环数据,添加进数组
		foreach ($data as $v) {
			if($v['pid'] == $cid){
				$temp [] = $v['cid'];
				//使用递归,继续查找下面的分类
				$temp = array_merge($temp,$this->getSon($data, $v['cid']));
			}//if
		}//foreach
		return $temp;	
	}//getSon
}//class
?>