<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
use Common\Model\Category;
use Common\Model\Job;
use Common\Model\Company;
use Common\Model\District;
/*
 * @param  $this->headhunt() 头部搜索
 *
 * @param  $this->headhunt($page_num) 分页展示数量
 */

//默认 控制器
class IndexController extends Controller{

    //--------------------------------首页页面-----------------------------------
    public function index(){
    	//实例化模型
    	$jobModel = new Job;//职位模型
    	$cateModel = new Category;//分类模型
		//调用[cate模型]获得分级分类并分配数据到页面
		$jishuData = $cateModel->jishuSon();//['技术1']
		View::with('jishuData',$jishuData);
		$chanpinData = $cateModel->chanpinSon();//['产品2']
		View::with('chanpinData',$chanpinData);
		$shejiData = $cateModel->shejiSon();//['设计3']
		View::with('shejiData',$shejiData);
		$yunyingData = $cateModel->yunyingSon();//['运营4']
		View::with('yunyingData',$yunyingData);
		$shichangData = $cateModel->shichangSon();//['市场与销售5']
		View::with('shichangData',$shichangData);
		$zhinengData = $cateModel->zhinengSon();//['职能6']
		View::with('zhinengData',$zhinengData);

		//获得全部职位数据//降序 最新添加
		$data = $jobModel
				 ->join('company','company_cpid','=','cpid')
				 ->join("district",'city','=','plid')
				 ->where("recycle='1'")
				 ->orderBy('pubdate','DESC')
				 ->get();

		$hotData =  $jobModel
				 ->join('company','company_cpid','=','cpid')
				 ->join("district",'city','=','plid')
				 ->where("recycle='1'")
				 ->orderBy('hot_click','DESC')
				 ->get();

		View::with('hotData',$hotData);//最热职位
		View::with('data',$data);//最新职位
    	View::make();
    }//index

    //---------------------------------搜索结果列表页-------------------------------------
    public function huntlist(){
    	//调用最近浏览记录(ＳＥＳＳＩＯＮ)
		$this->recently();

    	$jobModel = new Job;
		//获得地区表信息---------------
		$DisModel = new District;

		//获得[市区]二级
		$allDis = $DisModel->SonSQ();//调用  [获得省市下的时区] 方法
		$hotCity = array_splice($allDis,0,10);//[前十热门]城市截取数组

		View::with('hotCity',$hotCity);
		View::with('allDis',$allDis);

		//提取GET/keyword搜索关键字参数-----------------
    	$keyword = Q('get.keyword');
    	$keyword = addslashes($keyword);
		$keyword ? $keyword : '_';
		//关键字sql语句
		$keywordSql  = " AND (jname LIKE '%$keyword%' OR cpshortName LIKE '%$keyword%' OR cpaddress LIKE '%$keyword%' OR place LIKE '%$keyword%' OR district_name LIKE '%$keyword%')";
		//获得GET地址栏上的param参数------------
		$params = Q('get.param');
		//筛选效果/地址栏效果0_0_0__0_0__0_0_
		$param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, 9, '0');
		//获取地址栏上的搜索参数
		$kwH = $keyword;//关键字
		$cityH = $param[0];//城市
		$areaH = $param[1];//地区
		$exH = $param[2];//工作经验
		$eduH = $param[3];//学历
		$rzH = $param[4];//融资阶段
		$hyH = $param[5];//行业领域
		$myH = $param[7];//工资薪酬
		$wkH = $param[8];//工作性质

		//城市地区名称sql语句
		$CtPlSql = " AND $areaH ";
		//获得当前(选中)GET的数据
		$thisData = $DisModel->where("plid=$cityH")->pluck('district_name');
		//判断如果选了值 执行以下筛选
		if($thisData){
			//查找当前plid下的子集地区
			$aera = $DisModel->where("pid={$param[0]}")->get();
			$allData['ctname'] = $thisData; //将城市名称压入allData数组
			$allData['son'] = $aera;//将地区名称压入到allData['son']数组里

			//获得职位的所有信息(职位/公司/地址)
			$finalData = $jobModel
					 ->join('company','company_cpid','=','cpid')
					 ->join("district",'city','=','plid')
					 ->get();
			$areaPid = $DisModel->where("plid={$areaH}")->pluck('pid');//地区id

			$cityName = $DisModel->pluck("district_name");//城市名称
			//将城市名称循环压入到数组里分配到页面
			foreach ($finalData as $key => $v) {
				$finalData[$key]['cityname'] = $cityName;
			}
			View::with('allData',$allData);//所有城市地区数据(城市名,地区名)
		}else {
			View::with('allData',[]);
		}
		//--------------查询----------
		$paramSql = '';
		if($cityH !='0' ) $paramSql .= "pid = $cityH AND ";
		if($areaH !='0' ) $paramSql .= "city LIKE '%$areaH%' AND ";
		if($exH !='0' ) $paramSql .= "experience LIKE '%$exH%' AND ";
		if($eduH !='0' ) $paramSql .= "education LIKE '%$eduH%' AND ";
		if($rzH !='0' ) $paramSql .= "financing LIKE '%$rzH%' AND ";
		if($hyH !='0') $paramSql .= "industry LIKE '%$hyH%' AND ";
		if($wkH != '0') $paramSql .= "nature LIKE '%$wkH%' AND ";
		//薪酬排序
		$moneyS = explode('-', str_replace('k', '', $myH));
		//switch查询判断
		if($myH != '0'){
			switch ($myH) {
				case '2k以下':
					$paramSql .= "money_a <= 2 AND ";
					break;
				case '50k以上':
					$paramSql .= "money_a >= 50 AND ";
					break;
				default:
					$paramSql .= "money BETWEEN $moneyS[0] AND $moneyS[1] AND ";
					break;
			}
		}

		//默认,最新排序状态SQL
		$sortSql = '';
		if($param[6] !='0'){
			$sortSql = "DESC";
		}else {
			$sortSql = "ASC";
		}

		//获得筛选后的(在线)职位的职位总数
		$countVal =  $jobModel->countVal($paramSql, $keywordSql, $sortSql);
		View::with('countVal',$countVal);//[搜索左下角]的搜索出的总数提示

    	//获得所有(在线)职位
		$jobData = $jobModel->jobData($paramSql,$keywordSql,$sortSql);

		//获得点击量最高的['热门职位']
		$hotJob = $jobModel->hotJob();

		View::with('jobData',$jobData);//职位信息
		View::with('param',$param);//GETparam参数
		View::with('hotJob',$hotJob);//热门职位
        View::make();
    }//huntlist


    //---------------------------------公司列表页-------------------------------------
    public function companylist(){
    	$ComModel = new Company;
		$DisModl = new District;

		//获得[市区]
		$SQdata = $DisModl->SonSQ();

		//获得GET地址栏上的param参数------------
		$params = Q('get.param');
		//筛选效果/地址栏效果0_0_0__0_0__0_0_
		$param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, 4, '0');

		//查询{市区名称}
		$SQname = $DisModl->where("plid={$param[0]}")->pluck("district_name");

		//["筛选数据"]组合sql语句进行数据库查询
		$allcomData = $ComModel->comFiltrate($SQname,$param);


		/*
		 * 查询职位数量
		 */
		/*
		 * 查询职位数量
		 */
		View::with('SQname',$SQname);
		View::with('SQdata',$SQdata);//市区名称
		View::with('param',$param);//地址栏筛选
		View::with('allcomData',$allcomData);//公司表所有数据['所有公司']
        View::make();
    }//companylist

    //-----------------获取session里的最近浏览记录信息-------------------
    public function recently(){
        //将此职位信息压入到session数组中
		if(isset($_SESSION['recently'])){
			$recently = $_SESSION['recently'];
		}else {
			$recently = '';
		}
		View::with('recently',$recently);//session职位信息
    }//recently

}//class
?>