<?php namespace Admin\Controller;
use Common\Model\Link;

//-----------------------友情链接控制器------------------------
class LinkController extends CommonController{

	private $db;
	
	public function __auto(){
		$this->db = new Link;
	}//#
	
	//===[展示页面]===
	public function index(){
		$data = $this->db->get();
		View::with('data',$data);
		View::make();
	}//#
	
	//===[添加页面]===
	public function add(){
		View::make();
	}//#
	
	//===[修改页面]===
	public function edit(){
		View::make();
	}//#
	
	//===[删除]===
	public function del(){
		$this->db->delData();
	}//#
	
}
?>