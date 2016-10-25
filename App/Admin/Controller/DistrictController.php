<?php namespace Admin\Controller;
use \Common\Model\District;
use \Common\Model\Category;
class DistrictController extends CommonController{
	
	private $model;
	
	public function __auto(){
		$this->model = new District;
	}//__auto
	
	//默认显示页面-------------------------------------
	public function index(){
		//获得Category数据(升序)
		$data = $this->model->orderBy('plid','ASC')->orderBy('sort','DESC')->get();
		//判断如果没有分类 跳转到添加页面
		if(!$data) View::error('还没有添加地区名','District/add');
		//如果有数据,按照树状结构显示,将变量分配到页面
		$data = Data::tree($data,'district_name','plid','pid');
		View::with('data',$data);
	    View::make();
	}//index
	
	//添加分类---------------------------------------
	public function add(){
		if(IS_POST){
			if($this->model->store()){
				View::success('添加成功','index');
			}//if
			View::error($this->model->getError());
		}//if P
	    View::make();
	}//add
	
	//-----------------添加子类----------------------
	public function addSon(){
		if(IS_POST){
			if($this->model->store()) View::success('添加成功',U('index'));
			View::error($this->model->getError());
		}//if P
		//获得添加分类的plid
		$plid = Q('get.plid',0,'intval');
		//查找plid数据
		$District = $this->model->where("plid={$plid}")->find();	
		View::with('District',$District);
	    View::make();
	}//addSon
	
	//-------------------修改编辑--------------------
	public function edit(){
		if(IS_POST){
			if(!$this->model->edit()) View::error('添加失败');
			View::success('添加成功');
		}//if P
		//获得GET参数plid
		$plid = Q('get.plid',0,'intval');
		//查找数据库里的plid数据
		$oldDistrictData = $this->model->where("plid={$plid}")->find();
		//树状显示分类下拉列表
		$DistrictData = Data::tree($this->model->getNoMy($plid),'district_name','plid','pid');
		
		//分配变量到页面--显示模板
		View::with('oldDistrictData',$oldDistrictData);
		View::with('DistrictData',$DistrictData);		
	    View::make();
	}//edit
	
	//-------------------删除-----------------------
	public function del(){
		//获得get参数的plid
		$plid = Q('get.plid');
		//获得plid对应的pid
		$pid = $this->model->where("plid={$plid}")->pluck('pid');
		//判断如果是顶级分类的话,提示不能删除
		if($pid == 0) View::error('这是一个顶级分类,不能删除!');
		//执行sql语句 将当前分类下的子集pid改为被删除分类的pid
		$this->model->where("pid={$plid}")->update(['pid'=>$pid]);
		//执行sql语句 删除数据
		$this->model->where("plid={$plid}")->delete();
		//提示信息
		View::success('删除成功');
	}//del
	
}//CLASS
?>