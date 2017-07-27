<?php
// +----------------------------------------------------------------------
/*
	产品展示：
	author:kz
*/
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController;

class ProductController extends HomebaseController {
	protected $productCat_model;

	function _initialize() {
		parent::_initialize();
		$this->productCat_model = D("Portal/ProductCat");
	}

	public function index(){
		$this->productList();
	}
	public function productList(){
		$term_id=I('get.term_id',0,'intval');
		$term_ids=sp_get_all_child_productCat($term_id);
		$term=sp_get_productCat($term_id);
		if(empty($term)){
		    header('HTTP/1.1 404 Not Found');
		    header('Status:404 Not Found');
		    if(sp_template_file_exists(MODULE_NAME."/404")){
		        $this->display(":404");
		    }
		    return;
		}
	
		$arrproductCat=Array(); // 索引数组
		$arrproductCat[]=$this->getList($term_id);
		foreach ($term_ids as $value) {
			$arrproductCat[]=$this->getList($value['term_id']);
		}
		// dump($arrproductCat);
		
		$productCatNav = $this->productCat_model->where(array("parent"=>0))->order(array("listorder"=>"asc"))->select();
		$productCatItem = $this->productCat_model->where(array("term_id"=>$term_id))->order(array("listorder"=>"asc"))->select();

		$this->assign("productCatNav",$productCatNav);  //产品以及分类导航
		$this->assign("productCatItem",$productCatItem[0]);  //当前产品分类信息
		$this->assign("arrproductCat",$arrproductCat);  //当前产品分类信息
		$this->display();
	}
	public function detail(){
		$this->display();
	}

	public function getList($cid){
		$content=array();
		$productCat=M('product_cat')->where(array('term_id' =>$cid))->select();
		$content['cat']=$productCat;
		$productIds=M('product_relationships')->where(array('term_id' =>$cid))->order(array("listorder"=>"asc"))->field('object_id')->select();
		// dump($productIds);
		$arrObjectIds=Array();
		foreach ($productIds as $key => $value) {
			$arrObjectIds[]=$value["object_id"];
		}
		$ObjectIds=implode(",",$arrObjectIds);
		$productList=M('product')->where(array('id' => array('in',$ObjectIds)))->order('post_date DESC')->select();

		$content['product']=$productList;
		return $content;


	}
}
	 

